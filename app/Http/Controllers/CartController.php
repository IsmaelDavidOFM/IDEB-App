<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Order;


class CartController extends Controller
{
    // Mostrar productos en el carrito
    public function show()
    {
        $cart = session()->get('cart', []);
        $cursos = Curso::all();

        // Calcular el total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity']; // Precio por cantidad
        }

        return view('students.bag', compact('cart', 'total', 'cursos')); // Pa
    }

    // Agregar producto al carrito
    public function add(Request $request, $id)
    {
        $curso = Curso::find($id);
        if (!$curso) {
            return redirect()->back()->with('error', 'El curso no existe.');
        }

        // Obtener el carrito de la sesión
        $cart = session('cart', []);

        // Verificar si ya existe en el carrito
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $curso->id,
                'name' => $curso->NombredelCurso,
                'description' => $curso->DescripciondeCurso,
                'price' => $curso->CostodelCurso,
                'quantity' => 1,
                'modality' => $curso->Virtual ? 'Virtual' : ($curso->Presencial ? 'Presencial' : 'Mixto'),
            ];
        }

        // Guardar carrito en la sesión
        session(['cart' => $cart]);

        return redirect()->route('carrito.show')->with('success', 'Curso agregado al carrito.');
    }

    // Eliminar producto del carrito
    public function remove($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('carrito.show')->with('success', 'Curso eliminado del carrito.');
    }

    public function store(Request $request)

    {
        try {
            // Crear la orden
            $order = Order::create([
                'total' => $request->total,
                'status' => 'paid',
                'paypal_order_id' => $request->orderID,
            ]);

            // Guardar detalles de la orden
            foreach ($request->cart as $item) {
                $order->details()->create([
                    'product_name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'modality' => $item['modality'],
                ]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

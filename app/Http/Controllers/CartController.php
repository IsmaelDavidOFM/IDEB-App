<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    // Mostrar carrito
    public function show()
    {
        if (!Auth::guard('students')->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver el carrito.');
        }

        $studentId = Auth::guard('students')->id(); // Obtiene el ID del estudiante autenticado
        $cart = Cart::where('student_id', $studentId)->first(); // Busca el carrito del estudiante

        $items = $cart ? json_decode($cart->items, true) : [];

        $total = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('students.bag', compact('items', 'total'));
    }

    // Agregar producto al carrito
    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para agregar productos.');
        }

        $curso = Curso::find($id);
        if (!$curso) {
            return redirect()->back()->with('error', 'El curso no existe.');
        }

        // Obtener o crear el carrito del usuario
        $cart = Cart::firstOrCreate(['student_id' => Auth::id()]);

        // Obtener productos actuales
        $items = $cart->items ? json_decode($cart->items, true) : [];

        // Buscar si el curso ya está en el carrito
        $index = array_search($id, array_column($items, 'id'));

        if ($index !== false) {
            $items[$index]['quantity']++;
        } else {
            $items[] = [
                'id' => $curso->id,
                'name' => $curso->NombredelCurso,
                'description' => $curso->DescripciondeCurso,
                'price' => $curso->CostodelCurso,
                'quantity' => 1,
                'modality' => $curso->Virtual ? 'Virtual' : ($curso->Presencial ? 'Presencial' : 'Mixto'),
            ];
        }

        // Guardar en la base de datos
        $cart->items = json_encode($items);
        $cart->save();

        return redirect()->route('carrito.show')->with('success', 'Curso agregado al carrito.');
    }

    // Eliminar producto del carrito
    public function remove($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $cart = Cart::where('student_id', Auth::id())->first();
        if (!$cart) {
            return redirect()->route('carrito.show')->with('error', 'Carrito vacío.');
        }

        $items = json_decode($cart->items, true);
        $items = array_filter($items, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        $cart->items = json_encode(array_values($items));
        $cart->save();

        return redirect()->route('carrito.show')->with('success', 'Curso eliminado del carrito.');
    }

    // Vaciar carrito
    public function vaciar()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $cart = Cart::where('student_id', Auth::id())->first();
        if ($cart) {
            $cart->items = json_encode([]);
            $cart->save();
        }

        return redirect()->route('carrito.show')->with('success', 'Carrito vaciado.');
    }

    // Guardar compra
    public function store(Request $request)
    {
        try {
            if (!Auth::check()) {
                return response()->json(['success' => false, 'message' => 'Usuario no autenticado']);
            }

            $cart = Cart::where('student_id', Auth::id())->first();
            if (!$cart || empty(json_decode($cart->items, true))) {
                return response()->json(['success' => false, 'message' => 'Carrito vacío.']);
            }

            // Crear orden
            $order = Order::create([
                'total' => $request->total,
                'status' => 'paid',
                'paypal_order_id' => $request->orderID,
                'user_id' => Auth::id(),
            ]);

            // Guardar detalles
            foreach (json_decode($cart->items, true) as $item) {
                $order->details()->create([
                    'product_name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'modality' => $item['modality'],
                ]);
            }

            // Vaciar carrito
            $cart->items = json_encode([]);
            $cart->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

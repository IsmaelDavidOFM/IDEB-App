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

        $studentId = Auth::guard('students')->id(); // Obtener el ID del estudiante autenticado
        $cart = Cart::where('student_id', $studentId)->first(); // Buscar el carrito del estudiante

        $items = $cart ? json_decode($cart->items, true) : [];

        $total = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('students.bag', compact('items', 'total'));
    }

    // Agregar producto al carrito
    public function add(Request $request, $id)
    {
        if (!Auth::guard('students')->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para agregar productos.');
        }

        $studentId = Auth::guard('students')->id();
        if (!$studentId) {
            return redirect()->route('login')->with('error', 'Error en la autenticación.');
        }

        $curso = Curso::find($id);
        if (!$curso) {
            return redirect()->back()->with('error', 'El curso no existe.');
        }

        // Obtener o crear el carrito del usuario
        $cart = Cart::firstOrCreate(['student_id' => $studentId], ['items' => json_encode([])]);

        // Obtener productos actuales
        $items = json_decode($cart->items, true) ?? [];

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
        if (!Auth::guard('students')->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $studentId = Auth::guard('students')->id();
        $cart = Cart::where('student_id', $studentId)->first();

        if (!$cart) {
            return redirect()->route('carrito.show')->with('error', 'Carrito vacío.');
        }

        $items = json_decode($cart->items, true) ?? [];
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

            // Obtener los cursos del carrito
            $items = json_decode($cart->items, true);

            foreach ($items as $item) {
                // Crear la orden por cada curso en el carrito
                $order = Order::create([
                    'student_id' => Auth::id(), // Verifica que este valor sea válido
                    'curso_id' => $item['id'],
                    'total_price' => $item['price'],
                    'status' => 'paid',
                ]);
            }

            // Vaciar el carrito
            $cart->items = json_encode([]);
            $cart->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}

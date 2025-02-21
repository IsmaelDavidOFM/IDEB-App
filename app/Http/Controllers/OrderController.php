<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos que vienen del formulario
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'category_id' => 'required|exists:categories,id',
            'fecha_solicitada' => 'required|date',
            'status' => 'required|string',
        ]);

        // Crear la orden en la base de datos
        $order = Order::create($validated);

        // Puedes agregar más lógica aquí, como el envío de correo, redireccionamiento, etc.

        return response()->json([
            'message' => 'Orden guardada exitosamente',
            'order' => $order
        ]);
    }
}

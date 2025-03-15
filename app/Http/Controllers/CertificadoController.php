<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Order;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class CertificadoController extends Controller
{
    // Método para mostrar el certificado
    public function mostrarCertificado()
    {
        // Obtener el estudiante autenticado
        $student = Auth::guard('students')->user();

        // Obtener los cursos completados por el estudiante desde la tabla orders
        // Aquí buscamos las órdenes donde el student_id sea igual al id del estudiante autenticado
        $orders = Order::where('student_id', $student->id)
            ->where('status', 'completado')
            ->get();

        // Pasar la lista de órdenes a la vista
        return view('students.certificado', compact('student', 'orders'));
    }
    public function descargarCertificado($orderId)
    {
        // Obtener el pedido por ID
        $order = Order::findOrFail($orderId);

        // Verificar si el estudiante tiene acceso a esta orden
        $student = Auth::guard('students')->user();
        if ($order->student_id !== $student->id) {
            abort(403, 'No tienes permiso para descargar este certificado');
        }

        // Ruta del archivo del certificado
        $filePath = storage_path('app/public/certificates/' . $order->course->certificate_file);

        // Verificar si el archivo existe
        if (!file_exists($filePath)) {
            abort(404, 'Certificado no encontrado');
        }

        // Descargar el archivo
        return response()->download($filePath);
    }
}

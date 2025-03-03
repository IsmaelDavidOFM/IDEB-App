@extends('template.layout')

@section('title', 'Carrito de Compras')
<script
    src="https://www.paypal.com/sdk/js?client-id=AV2RXkm8vRTQSG_yQkjvsA-WJfXw5WZSyKhjc0Ge-JcQfkhx7WEmSVNpDg2Bm1-dwHGrmjFPwYUNiLHi&currency=MXN">
</script>
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Carrito de Compras</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (empty($items))
            <p class="text-center text-muted">Tu carrito está vacío.</p>
            <div class="text-center mt-4">
                <a href="/cursos_online" class="btn btn-primary">Ver más cursos</a>
            </div>
        @else
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Modalidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['modality'] }}</td>
                            <td>
                                <form action="{{ route('carrito.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h4 class="fw-bold">Total: $<span id="total">{{ number_format($total, 2) }}</span></h4>
                <a href="/cursos_online" class="btn btn-primary">Ver más cursos</a>
            </div>

            <!-- Botón de Comprar -->
            <div id="seccion-pago" class="seccion mt-4">
                <h5>Método de Pago</h5>
                <div id="paypal-button-container"></div>
            </div>
        @endif
    </div>
@endsection
<script>
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: {{ $total }} // Total dinámico del carrito
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Pago completado por ' + details.payer.name.given_name);

                // Enviar datos al backend
                fetch("{{ route('compra.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        total: {{ $total }}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Compra registrada exitosamente.");
                    } else {
                        alert("Hubo un problema al guardar la orden: " + data.message);
                    }
                })
                .catch(error => console.error("Error:", error));
            });
        },
        onCancel: function(data) {
            alert('Pago cancelado');
        }
    }).render('#paypal-button-container');
</script>

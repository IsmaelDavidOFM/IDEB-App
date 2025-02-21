@extends('templates.layout')

@section('title', 'Formulario de compra')

<style>
    .cont {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        margin: 5% auto;
    }

    h4,
    h5 {
        color: #333;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .seccion {
        opacity: 0.5;
        pointer-events: none;
        transition: all 0.3s ease;
        position: relative;
    }

    .seccion.activa {
        opacity: 1;
        pointer-events: all;
    }

    input,
    select,
    button,
    label {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        border-radius: 50px;
        padding: 10px 15px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .detalle-compra {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .detalle-compra p {
        margin: 5px 0;
        font-size: 16px;
        color: #555;
    }

    .mensaje {
        text-align: center;
        font-size: 14px;
        color: #555;
    }

    .seccion input {
        margin-top: 15px;
        margin-bottom: 25px;
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    .paypal-btn {
        background-color: #0070ba;
        /* Azul similar a PayPal */
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 30px;
        /* Hacer el botón en forma de píldora */
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        /* Para que ocupe todo el ancho disponible */
    }

    .paypal-btn:hover {
        background-color: #005f8f;
        /* Azul oscuro al pasar el mouse */
    }

    .paypal-btn:focus {
        outline: none;
        /* Eliminar el borde de enfoque */
    }
</style>

<script
    src="https://www.paypal.com/sdk/js?client-id=AV2RXkm8vRTQSG_yQkjvsA-WJfXw5WZSyKhjc0Ge-JcQfkhx7WEmSVNpDg2Bm1-dwHGrmjFPwYUNiLHi&currency=MXN">
</script>

@section('content')
    <div class="cont">
        <h4>Antes de comprar, rellene el siguiente formulario</h4>

        <!-- Detalles de la compra -->
        <div class="detalle-compra">
            <p><strong>Nombre del Curso:</strong> {{ $curso->NombredelCurso }}</p>
            <strong>Precio</strong>
            <p id="price">${{ $curso->CostodelCurso }}</p>
        </div>

        <div id="formulario-compra">
            <form  method="POST">
                @csrf

                <!-- Sección 1: Registro del usuario -->
                <div id="seccion-registro" class="seccion activa">
                    <h5>Datos de Registro</h5>

                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}"
                        required>
                    @error('nombre')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror

                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos"
                        value="{{ old('apellido') }}" required>
                    @error('apellido')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror

                    <input type="email" name="email" id="email" placeholder="Correo" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror

                    <input type="password" name="password" id="password" placeholder="Clave" value="{{ old('password') }}"
                        required>
                    @error('password')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    <button type="button" onclick="continuarASiguienteSeccion('seccion-pago')" class="paypal-btn">
                        Continuar
                    </button>
                </div>

                <!-- Sección 2: Método de pago con PayPal -->
                <div id="seccion-pago" class="seccion">
                    <h5>Método de Pago</h5>
                    <div id="paypal-button-conteiner"></div>
                </div>

            </form>
        </div>
    </div>
@endsection

<script>
    function continuarASiguienteSeccion(idSeccionSiguiente) {
        const seccionActual = document.querySelector('.seccion.activa');
        const inputs = seccionActual.querySelectorAll('input[required]');

        let camposValidos = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                camposValidos = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });

        if (!camposValidos) {
            alert('Por favor, complete todos los campos obligatorios antes de continuar.');
            return;
        }

        seccionActual.classList.remove('activa');
        const siguienteSeccion = document.getElementById(idSeccionSiguiente);
        siguienteSeccion.classList.add('activa');
        siguienteSeccion.scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>

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
                        value: {{ $curso->CostodelCurso }}
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                const nombre = document.getElementById('nombre').value;
                const apellido = document.getElementById('apellido').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const cursoId = {{ $curso->id }}; // ID del curso desde Blade
                const precio = {{ $curso->CostodelCurso }};

                fetch('{{ route('payment.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            nombre,
                            apellido,
                            email,
                            password,
                            cursoId,
                            precio,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Datos devueltos:', data);
                            alert('Pago completado. Redirigiendo...');
                            window.location.href='/gracias';
                        } else {
                            alert('Hubo un error al procesar la solicitud');
                        }
                    })
                    .catch(error => {
                        alert('Error al procesar la solicitud');
                    });
            });
        },
        onCancel: function(data) {
            alert('Pago cancelado');
        }
    }).render('#paypal-button-conteiner');
</script>

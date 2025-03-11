<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hola,</p>
    <p>Hemos recibido una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Restablecer contraseña</a>
    <p>Si no hiciste esta solicitud, ignora este correo.</p>

</body>
</html>

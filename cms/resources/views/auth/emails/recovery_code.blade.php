<!DOCTYPE html>
<html>

<head>
    <title>Restablecer Contraseña</title>
</head>

<body>
    <h1>Restablecer tu Contraseña</h1>
    <p>Haga clic en el siguiente enlace para restablecer su contraseña:</p>
    <a href="{{ url('password/reset', $token) }}">Restablecer Contraseña</a>
</body>

</html>

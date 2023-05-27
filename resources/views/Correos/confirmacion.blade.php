<!DOCTYPE html>
<html>

<head>
    <title>Confirmación de Evento</title>
</head>

<body>
    <h1>Evento autorizado</h1>
    <p>Estimado/a {{ $cliente->nombre }},</p>
    <p>El gerente {{ $gerente->nombre }} ha confirmado el evento con nombre {{ $evento->nombre_evento }}.</p>
    <p>Gracias por su participación.</p>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Rechazo de Evento</title>
</head>

<body>
    <h1>Evento no autorizado</h1>
    <p>Estimado/a {{ $cliente->nombre }},</p>
    <p>Lamentamos informarle que el gerente {{ $gerente->nombre }} ha rechazado el evento con nombre
        {{ $evento->nombre_evento }}.
    </p>

    <p>Motivo del rechazo: </p>
    <p>{{ $descripcion }}</p>

    <p>Gracias por su comprensión.</p>
    <p>Atentamente el equipo de gerentes de Garden Gate.</p>
</body>

</html>

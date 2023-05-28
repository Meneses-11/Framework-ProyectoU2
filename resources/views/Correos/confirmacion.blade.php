<!DOCTYPE html>
<html>

<head>
    <title>Confirmación de Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        h1 {
            color: #333333;
            font-size: 24px;
        }

        h2 {
            color: #555555;
            font-size: 20px;
        }

        p {
            color: #777777;
            font-size: 16px;
        }

        ul {
            margin-top: 10px;
            padding-left: 20px;
        }

        li {
            color: #777777;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>Evento autorizado</h1>
    <p>Estimado/a {{ $cliente->nombre }},</p>
    <p>Se ha confirmado el evento con nombre: "{{ $evento->descripcion }}".</p>
    <p>Para un total de: {{ $evento->num_personas }} personas.</p>

    @if ($evento->servicios->count()!=0)
    <p>Con los siguientes servicios:</p>
    <ul>
        @foreach ($evento->servicios as $item)
        <li>{{ $item->nombre }}</li>
        @endforeach
    </ul>
    @endif

    <p>Con un costo total de: {{ $evento->precio }}.</p>
    @php
        $horaInicioEvento = new DateTime($evento->hora_inicio);
        $horaFinEvento = new DateTime($evento->hora_fin);
    @endphp
    <p>Dando inicio el día {{ $evento->fecha }} a las {{ $horaInicioEvento->format('H:i:s') }} y finalizando a las {{ $horaFinEvento->format('H:i:s') }}.</p>

    <h2>¡Gracias por su preferencia!</h2>
</body>

</html>


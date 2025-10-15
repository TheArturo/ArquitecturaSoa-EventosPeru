<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento Creado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #F53003 0%, #F61500 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .evento-info {
            background-color: #f9f9f9;
            border-left: 4px solid #F53003;
            padding: 15px;
            margin: 20px 0;
        }
        .evento-info p {
            margin: 10px 0;
            color: #333;
        }
        .evento-info strong {
            color: #F53003;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #F53003;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✨ Eventos Perú</h1>
            <p>Confirmación de Evento</p>
        </div>
        
        <div class="content">
            <h2>¡Hola {{ $evento->cliente->nombre }}!</h2>
            <p>Te confirmamos que tu evento ha sido registrado exitosamente en nuestro sistema.</p>
            
            <div class="evento-info">
                <p><strong>📌 Evento:</strong> {{ $evento->titulo }}</p>
                <p><strong>📅 Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y H:i') }}</p>
                <p><strong>📍 Ubicación:</strong> {{ $evento->ubicacion ?? 'Por definir' }}</p>
                <p><strong>💰 Costo Estimado:</strong> S/ {{ number_format($evento->costo_estimado ?? 0, 2) }}</p>
                <p><strong>📊 Estado:</strong> {{ ucfirst($evento->estado) }}</p>
                @if($evento->descripcion)
                    <p><strong>📝 Descripción:</strong> {{ $evento->descripcion }}</p>
                @endif
            </div>
            
            <p>Estaremos en contacto contigo para coordinar todos los detalles necesarios para que tu evento sea un éxito.</p>
            
            <center>
                <a href="{{ route('eventos.show', $evento->id) }}" class="button">Ver Detalles del Evento</a>
            </center>
        </div>
        
        <div class="footer">
            <p>Este es un correo automático, por favor no respondas a este mensaje.</p>
            <p>&copy; {{ date('Y') }} Eventos Perú - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>

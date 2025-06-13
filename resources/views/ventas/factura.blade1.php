<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $venta->ID_Venta }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Factura de Venta</h2>
        <p><strong>N° Venta:</strong> {{ $venta->ID_Venta }}</p>
        <p><strong>Fecha:</strong> {{ $venta->Fecha }}</p>
        <p><strong>Cliente:</strong> {{ $venta->cliente->Nombre ?? 'Sin cliente' }}</p>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->Descripcion ?? 'Producto eliminado' }}</td>
                    <td>{{ $detalle->Cantidad }}</td>
                    <td>Q{{ number_format($detalle->Precio_Unitario, 2) }}</td>
                    <td>Q{{ number_format($detalle->Cantidad * $detalle->Precio_Unitario, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4 class="text-end">Total: Q{{ number_format($venta->Total, 2) }}</h4>

        <a href="{{ route('ventas.factura.pdf', $venta->ID_Venta) }}" class="btn btn-success mt-3">Descargar PDF</a>
        <button onclick="window.print()" class="btn btn-primary mt-3">Imprimir</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $venta->ID_Venta }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .header { text-align: center; border-bottom: 2px solid #333; margin-bottom: 20px; padding-bottom: 10px; }
        .header h1 { margin: 0; font-size: 2rem; color: #2d3748; }
        .header p { margin: 2px 0; }
        .factura-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .factura-table th, .factura-table td { border: 1px solid #333; padding: 8px; text-align: left; }
        .factura-table th { background: #eee; }
        .text-end { text-align: right; }
        .mb-3 { margin-bottom: 1rem; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Despensa La Bendición</h1>
        <p>3a. Avenida 2-45 Zona 1, Chimaltenango, Guatemala</p>
        <p>Tel: (502) 7840-1234 &nbsp; | &nbsp; Email: labendicion@despensas.gt</p>
        <p>NIT: 1234567-8</p>
    </div>
    <h2>Factura de Venta</h2>
    <div class="mb-3">
        <strong>N° Venta:</strong> {{ $venta->ID_Venta }}<br>
        <strong>Fecha:</strong> {{ $venta->Fecha }}<br>
        <strong>Cliente:</strong> {{ $venta->cliente->Nombre ?? 'Sin cliente' }}
    </div>
    <table class="factura-table">
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

    <div class="no-print" style="margin-top: 20px;">
        <a href="{{ route('ventas.factura.pdf', $venta->ID_Venta) }}" class="btn btn-success">Descargar PDF</a>
        <button onclick="window.print()" class="btn btn-primary">Imprimir</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
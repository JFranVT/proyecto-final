@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ID_Cliente" class="form-label">Cliente:</label>
            <select class="form-select" name="ID_Cliente" required>
                <option value="">Seleccione cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->ID_Cliente }}">{{ $cliente->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control" name="Fecha" value="{{ old('Fecha', date('Y-m-d')) }}" required>
        </div>
        <hr>
        <h5>Productos</h5>
        <table class="table" id="productos-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select class="form-select select-producto" name="productos[0][ID_Producto]" required>
                            <option value="">Seleccione producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->ID_Producto }}">{{ $producto->Descripcion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="productos[0][Cantidad]" min="1" value="1" required>
                    </td>
                    <td>
                        <input type="number" class="form-control precio-unitario" name="productos[0][Precio_Unitario]" min="0" step="0.01" value="0" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-row">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" id="add-producto" class="btn btn-secondary mb-3">Agregar Producto</button>
        <br>
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    // Pasa los productos y precios a JS
    const productos = @json($productos->keyBy('ID_Producto'));

    document.addEventListener('DOMContentLoaded', function() {
        let rowIdx = 1;
        document.getElementById('add-producto').addEventListener('click', function() {
            let table = document.getElementById('productos-table').getElementsByTagName('tbody')[0];
            let newRow = table.rows[0].cloneNode(true);

            // Limpiar los valores del nuevo row
            newRow.querySelectorAll('select, input').forEach(function(input) {
                if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0;
                } else {
                    input.value = input.name.includes('Cantidad') ? 1 : 0;
                }
            });

            // Actualizar los nombres de los inputs
            newRow.querySelectorAll('select, input').forEach(function(input) {
                input.name = input.name.replace(/\d+/, rowIdx);
            });

            table.appendChild(newRow);
            rowIdx++;
        });

        document.getElementById('productos-table').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                let table = e.target.closest('tbody');
                if (table.rows.length > 1) {
                    e.target.closest('tr').remove();
                }
            }
        });

        // Evento para autocompletar el precio al seleccionar producto
        document.getElementById('productos-table').addEventListener('change', function(e) {
            if (e.target.classList.contains('select-producto')) {
                const row = e.target.closest('tr');
                const idProducto = e.target.value;
                const precio = productos[idProducto] ? productos[idProducto].Precio : 0;
                row.querySelector('.precio-unitario').value = precio;
            }
        });
    });
</script>
@endsection
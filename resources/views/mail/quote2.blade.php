<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table{
            width: 100%;
            table-layout: fixed;
        }
        table, th, td{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Cliente:</strong> {{ $data['cliente'] }}</p>
        <p><strong>Email:</strong> {{ $data['correo'] }}</p>
        <p><strong>Fecha:</strong> {{ $data['fecha'] }}</p>
        @if(isset($data['row']))
            <table>
                <head>
                    <tr>
                        <th class="fw-light">Rollos</th>
                        <th class="fw-light">Blister</th>
                        <th class="fw-light">Articulo</th>
                        <th class="fw-light">Color</th>
                        <th class="fw-light">Detalle</th>
                    </tr>
                </head>
                <tbody>
                    @foreach ($data['row'] as $item)
                        @if(isset($item['rollos']) || isset($item['blister']) || isset($item['articulo']) || isset($item['color']) || isset($item['detalle']))
                            <tr>
                                <td>{{ $item['rollos'] }}</td>
                                <td>{{ $item['blister'] }}</td>
                                <td>{{ $item['articulo'] }}</td>
                                <td>{{ $item['color'] }}</td>
                                <td>{{ $item['detalle'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>      
        @endif
    </div>
</body>
</html>
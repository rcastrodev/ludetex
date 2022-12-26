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
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        @if(isset($data['vp']))
            <table>
                <head>
                    <tr>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Color</th>
                        <th>Presentación</th>
                        <th>Cantidad</th>
                    </tr>
                </head>
                <tbody>
                    @foreach ($data['vp'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['category'] }}</td>
                            <td>{{ $item['color'] }}</td>
                            <td>{{ $item['presentation'] }}</td>
                            <td>{{ $item['number'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>      
        @endif
        @if (isset($data['manual']))
            @foreach ($data['manual'] as $categories)
                @if(count($categories))
                    @foreach ($categories as $products)
                        <table style="margin-bottom: 10px;">
                            <head>
                                <tr>
                                    <th>Producto</th>
                                    <th>Pedido</th>
                                </tr>
                            </head>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{ key($product) }} </td>
                                        <td>
                                            @foreach ($product as $colores)
                                                <span> {{ key($colores) }} </span>
                                                @foreach ($colores as $presentacions)
                                                    @foreach ($presentacions as $k => $presentacion)
                                                        <span> - {{ $k }}  </span> 
                                                        @if ($presentacion)
                                                            <strong>{{ $presentacion }}</strong>
                                                        @else
                                                            <small>0</small>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    @endforeach
                @endif
            @endforeach

        @endif
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        @media print {
            .ocultar-al-imprimir {
                display: none;
            }
        }
    </style>
    <title>ticket</title>
</head>

<body>
    <div class="ocultar-al-imprimir m-2">
        <a class="p-2 border-2 rounded-md bg-blue-200 text-blue-700 " href="{{ route('index') }}">Volver</a>
    </div>
    <div class="text-[.9em]">
        <p>NOMBRE NEGOCIO</p>
        <p>CIF</p>
        <p>DIRECCIÓN</p>
        <p>CÓDIGO POSTAL</p>
        <p>{{ Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
        <p>Ticket nº {{ $ticket->id }}</p>
    </div>
    <br>
    <section>
        <hr>
        <table class="text-[.8em]">
            <thead>
                <tr class="text-left">
                    <th>Uds.</th>
                    <th>Producto</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $product['pivot']['quantity'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td class="text-center">
                            {{ Number::format($product['pivot']['price'] * $product['pivot']['quantity'], precision: 2) }}
                            €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <br>
        <h4>Total: <strong>{{ Number::format($ticket->total_ticket, precision: 2) }} €</strong></h4>
    </section>
    <section>
        <p>Forma pago: {{ $ticket->type_pay }}</p>
        <p>iva incluido</p>
    </section>
    <br>
    <p>¡Gracias por venir!</p>
    @livewireScripts
    <script type="module">
        window.print();

        fetch("{{ route('return-from-ticket') }}", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        window.print();
        window.location.href = document.referrer;
    })
    .catch(error => console.error('Error:', error));

        //window.location.href = document.referrer;
    </script>
</body>

</html>

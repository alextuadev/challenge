@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Desafío 1.1:</h2>
                        <div> Precio total de la factura:
                            <ul>
                                @foreach ($invoices as $invoice)
                                    <li>
                                        Factura: {{ $invoice->id }} , Total: @money($invoice->total)
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Desafío 1.2:</h2>
                        <div>Obtener todos id de las facturas que tengan productos con cantidad mayor a 100:
                            <ul>
                                @foreach ($ids as $id)
                                    <li>
                                        Factura: {{ $id }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Desafío 1.3:</h2>
                        <div>Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP:
                            (partiendo de que el valor final es el quantity por el precio del producto)
                            <ul>
                                @foreach ($products as $product)
                                    <li>
                                        {{ $product->name }}: @money( $product->total)
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-5">
            <h2>Desafio 2</h2>
            <x-challenge2 />
        </div>

        <div class="row mb-5">
            <h2>Desafio 4</h2>
            <x-challenge4 />
        </div>



    </div>
@endsection

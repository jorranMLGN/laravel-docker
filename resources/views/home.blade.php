@extends('layout')

@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            @if (count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                {{ $product->name }}
                            </div>
                            <div class="card-body">
                                <p>{{ $product->description }}</p>
                                <p>Price: ${{ $product->price }}</p>
                                <p>Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        No products available
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection

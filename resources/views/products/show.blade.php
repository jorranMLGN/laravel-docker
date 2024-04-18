@extends('layout')

@section('content')
    @if(Auth::check() && Auth::user()->role == 1)

        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $product->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div>
                        <p class="card-text">{{ $product->price }}</p>
                    </div>
                    <div>
                        <p class="card-text">{{ $product->stock }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col">
                    <div class="alert alert-danger" role="alert">
                        You need to be logged in to access this page
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection

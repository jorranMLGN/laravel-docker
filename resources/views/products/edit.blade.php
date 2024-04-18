@extends('layout')

@section('content')

    @if(Auth::check() && Auth::user()->role == 1)

        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>Update Product</h3>
                    <form action="{{ route('products.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Body</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                      required>{{ $product->description }}</textarea>
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   value="{{ $product->price }}" required>
                        </div>
                        <div>
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                   value="{{ $product->stock }}" required>
                        </div>
                        <br>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
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

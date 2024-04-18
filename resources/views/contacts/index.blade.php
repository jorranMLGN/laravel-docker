@extends('layout')
@section('content')
    @if(Auth::check() && Auth::user()->role == 1)
        <div class="container mt-5">
            <div class="row">
                @foreach ($messages as $message)
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $message->name }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $message->email }}</p>
                            </div>
                            <div class="card-body">

                                <p class="card-text">{{ $message->message }}</p>
                            </div>


                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('contacts.show', $message->id) }}" class="btn btn-primary btn-sm">Show</a>
                                    </div>
                                    <div class="col-sm">

                                        <form action="{{ route('contacts.destroy', $message->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

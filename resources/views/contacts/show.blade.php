@extends('layout')

@section('content')
    @if(Auth::check() && Auth::user()->role == 1)
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Message Details</div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $message->name }}</h5>
                            <p class="card-text">{{ $message->email }}</p>
                            <p class="card-text">{{ $message->message }}</p>
                        </div>
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

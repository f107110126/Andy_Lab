@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('/payments') }}">
            @csrf
            <div class="form-group row">
                <button class="btn btn-primary" type="submit">
                    Make Payments
                </button>
            </div>
        </form>
    </div>
@endsection

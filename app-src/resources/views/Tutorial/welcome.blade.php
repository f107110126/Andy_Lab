@extends('Tutorial.layout')
{{-- it is equal to "@extends('Tutorial/layout')" --}}

@section('title', 'Welcome of Tutorial')

@section('full-title', 'Laracasts Tutorial')

@section('content')
    <p>
        Hello dear, there is a welcome message for you.
        <br>
        Hope you enjoy this tutorial.
    </p>
@endsection

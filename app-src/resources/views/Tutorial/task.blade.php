@extends('Tutorial.layout')
{{-- it is equal to "@extends('Tutorial/layout')" --}}

@section('title', 'Task of Tutorial')

@section('full-title', 'Tasks for Tutorial')

@section('content')
    {!! '<script>alert("this is a little script");</script>' !!}
    @if(isset($tasks))
        <ul>
            @foreach($tasks as $task)
                <li style="text-align: left">{{ $task }}</li>
            @endforeach
        </ul>
    @endif
@endsection

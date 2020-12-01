@extends('conversations.layout')

@section('conversations-content')
    @foreach ($conversations as $conversation)
        <h2 class="text-2xl">
            <a href="{{ url('/conversations/' . $conversation->id) }}">{{ $conversation->title }}</a>
        </h2>
        @continue($loop->last)
        <hr class="mb-5">
    @endforeach
@endsection

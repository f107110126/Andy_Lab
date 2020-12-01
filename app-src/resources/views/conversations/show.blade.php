@extends('conversations.layout')

@section('conversations-content')
    <p>
        <a href="{{ url('/conversations') }}">Back</a>
    </p>
    <h1 class="text-4xl">{{ $conversation->title }}</h1>
    <p class="text-muted">Posted by {{ $conversation->user->name }}</p>
    <div>{{ $conversation->body }}</div>
    <hr class="mb-3">
    @include('conversations.replies')
@endsection

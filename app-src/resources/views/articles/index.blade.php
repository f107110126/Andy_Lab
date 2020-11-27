@extends('layout')

@section('head')
    <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @forelse ($articles as $article)
                    <div class="title">
                        <a href="{{ $article->path() }}">
                            <h2>{{ $article->title }}</h2>
                        </a>
                    </div>
                    <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
                    <p>{{ $article->body }}</p>
                @empty
                    <p>No relevent articles yet.</p>
                @endforelse
                <div class="mx-auto" style="width: fit-content">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        {{--
        to make pagination view modify the default code.
        to get default code use command:
        "php artisan vendor:publish --tag=laravel-pagination"
        and use customer view use code:
        {{ $paginator->links('view.name') }}
        --}}
    </div>
@endsection

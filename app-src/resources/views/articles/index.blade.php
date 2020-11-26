@extends('layout')

@section('content')
<div id="header-wrapper">
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
        @foreach($articles as $article)
			<div class="title">
				<a href="{{ url('/articles/' . $article->id) }}"><h2>{{ $article->title }}</h2></a>
            </div>
			<p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
			<p>{{ $article->body }}</p>
        @endforeach
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

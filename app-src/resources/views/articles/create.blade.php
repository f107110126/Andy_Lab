@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="control">
                        {{--
                        <input type="text" name="title" id="title"
                            class="input{{ $errors->has('title') ? ' is-danger' : '' }}">
                        @if ($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                        --}}
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="input @error('title') is-danger @enderror">
                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        {{-- <textarea class="textarea" name="excerpt"
                            id="excerpt"></textarea> --}}
                        <textarea name="excerpt" id="excerpt"
                            class="textarea @error('excerpt') is-danger @enderror">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="body" class="label">Body</label>
                    <div class="control">
                        {{--
                        <textarea class="textarea" name="body" id="body"></textarea>
                        --}}
                        <textarea name="body" id="body"
                            class="textarea @error('body') is-danger @enderror">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

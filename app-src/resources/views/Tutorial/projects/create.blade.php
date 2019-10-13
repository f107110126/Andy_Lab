@extends('Tutorial.projects.layout')

@section('title', 'Create a Project')

@section('full-title', 'Create a Project')

@section('content')
    <form method="post" action="{{ Route('Tutorial.projects.store') }}">
        {{-- Type1 --}}
        @csrf
        {{-- Type2 --}}
        {{ csrf_field() }}
        {{-- Type3 --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input id="title" name="title" type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                       placeholder="Project Title" value="{{ old('title') }}">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea id="description" name="description"
                          class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                          placeholder="Project description.">{{ old('description') }}</textarea>
            </div>
        </div>
        <div>
            <button class="button is-link" type="submit">Create Projects</button>
        </div>
        @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection

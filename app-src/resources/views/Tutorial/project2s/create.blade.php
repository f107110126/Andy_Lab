@extends('Tutorial.project2s.layout')

@section('title', 'Create a Project')

@section('full-title', 'Create a Project')

@section('content')
    <form method="post" action="{{ Route('project2s.store') }}">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input id="title" name="title" placeholder="Project Title" value="{{ old('title') }}" type="text"
                       class="input {{ $errors->has('title') ? 'is-danger' : '' }}">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea id="description" name="description" placeholder="Description of projects."
                          class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="field">
            <button class="button is-link" type="submit">Create Project</button>
        </div>
        @include('Tutorial.project2s.errors')
    </form>
@endsection

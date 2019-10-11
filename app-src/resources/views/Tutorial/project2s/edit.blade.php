@extends('Tutorial.project2s.layout')

@section('title', 'Edit project of Tutorial')

@section('full-title', 'Edit Project')

@section('content')
    <form method="post" action="{{ route('project2s.update', $project2->id) }}">
        @csrf
        @method('patch')
        <div class="field">
            <label for="title" class="label">Title</label>
            <div class="control">
                <input id="title" name="title" value="{{ $project2->title }}" type="text" class="input">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control">
                <textarea id="description" name="description" class="textarea">{{ $project2->description }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Update Project</button>
            </div>
        </div>
    </form>
    <form method="post" action="{{ route('project2s.destroy', $project2->id) }}">
        @csrf
        @method('delete')
        <div class="field">
            <div class="control">
                <button class="button is-danger">Delete Project</button>
            </div>
        </div>
    </form>
@endsection

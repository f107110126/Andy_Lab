@extends('Tutorial.projects.layout')

@section('title','Edit project of Tutorial')

@section('full-title', 'Edit Project')

@section('content')
    <style>
        form {
            text-align: left;
        }
    </style>
    <form method="post" action="{{ Route('Tutorial.projects.update', $project->id) }}">
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input id="title" class="input" type="text" name="title" placeholder="Title"
                       value="{{ $project->title }}">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Description</label>
            <div class="control"><textarea name="description" cols="30" rows="10"
                                           class="textarea">{{ $project->description }}</textarea></div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>
    <form method="post" action="{{ Route('Tutorial.projects.destroy', $project->id) }}">
        {{ method_field('delete') }}
        {{-- @method('delete') --}}
        {{ csrf_field() }}
        {{-- @csrf --}}
        <div class="field">
            <div class="control">
                <button class="button is-danger">Delete Project</button>
            </div>
        </div>
    </form>
@endsection

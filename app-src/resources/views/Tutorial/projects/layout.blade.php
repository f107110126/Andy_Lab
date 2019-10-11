@extends('Tutorial/layout')

@section('style-ext')
    <style>
        .is-complete {
            text-decoration: line-through;
        }

        .project-list {
            width: fit-content;
            text-align: left;
        }

        .project .content {
            text-align: left;
        }
    </style>
@endsection

@section('links-area')
    <div class="links">
        <a href="{{ Route('Tutorial.projects.index') }}">Index</a>
        <a href="{{ Route('Tutorial.projects.create') }}">Create</a>
    </div>
@endsection

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

        form {
            text-align: left;
        }

        .project .content {
            text-align: left;
        }
    </style>
@endsection

@section('links-area')
    <div class="links">
        <a href="{{ Route('project2s.index') }}">Index</a>
        <a href="{{ Route('project2s.create') }}">Create</a>
    </div>
@endsection

@extends('Tutorial.project2s.layout')

@section('title', 'Project2s of Tutorial')

@section('full-title', 'Project2s')

@section('content')
    @if (isset($projects))
        <div class="flex-center">
            <ul class="project-title">
                @foreach($projects as $project)
                    <li>
                        <a href="{{ Route('project2s.show', $project->id) }}">{{ $project->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@extends('Tutorial.projects.layout')
{{-- it is equal to "@extends('Tutorial/layout')" --}}

@section('title', 'Projects of Tutorial')

@section('full-title', 'Projects')

@section('content')
    @if(isset($projects))
        <div class="flex-center">
            <ul class="project-list">
                @foreach($projects as $project)
                    <li>
                        <a href="{{ Route('Tutorial.projects.show', $project->id) }}">{{ $project->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

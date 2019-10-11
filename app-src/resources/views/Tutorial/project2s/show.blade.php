@extends('Tutorial.project2s.layout')

@section('title', 'Show Project of Tutorial')

@section('full-title', 'Show Project')

@section('content')
    <div class="flex-center">
        <div class="project">
            <h1 class="title">{{ $project2->title }}</h1>
            <div class="content">
                {{ $project2->description }}
                <p>
                    <a href="{{ route('project2s.edit', $project2->id) }}" class="button">Edit</a>
                </p>
            </div>
            @if ($project2->task2s->count())
                <div class="content box">
                    @foreach($project2->task2s as $task2)
                        <form method="post" action="{{ route('project2s.task2s.completed', [$project2->id, $task2]) }}">
                            @csrf
                            @if ($task2->completed)
                                @method('delete')
                            @endif
                            <label for="completed{{ $task2->id }}"
                                   class="checkbox {{ $task2->completed ? 'is-complete' : '' }}">
                                <input id="completed{{ $task2->id }}" name="completed" type="checkbox"
                                       onchange="this.form.submit();" {{ $task2->completed ? 'checked' : '' }}>{{ $task2->description }}
                            </label>
                        </form>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ route('project2s.task2s.store', $project2->id) }}" class="box">
                @csrf
                <div class="field">
                    <label for="description" class="label">New Task</label>
                    <div class="control">
                        <input id="description" name="description" type="text" class="input" placeholder="New Task"
                               value="{{ old('description') }}">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Add Task</button>
                    </div>
                </div>
                @include('Tutorial.project2s.errors')
            </form>
        </div>
    </div>
@endsection

@extends('Tutorial.projects.layout')

@section('title','Show project of Tutorial')

@section('full-title', 'Show Project')

@section('content')
    @if(isset($project))
        <div class="flex-center">
            <div class="project">
                <h1>{{ $project->title }}</h1>
                <div class="content">
                    {{ $project->description }}
                    @can('update', $project)
                        <p><a href="javascript:alert('can update.');">Update</a></p>
                    @endcan
                    <p>
                        <a href="{{ Route('Tutorial.projects.edit', $project->id) }}" class="button">Edit</a>
                    </p>
                </div>
                @if ($project->tasks->count())
                    <div class="box content">
                        @foreach($project->tasks as $task)
                            <div>
                                <form method="post"
                                      {{-- action="{{ Route('Tutorial.tasks.update', [$project->id, $task->id]) }}" --}}
                                      action="{{ Route('Tutorial.tasks.completed', [$project->id, $task->id]) }}">
                                    @csrf
                                    {{-- @method('patch') --}}
                                    @if ($task->completed)
                                        @method('delete')
                                    @endif
                                    <label for="completed{{ $task->id }}"
                                           class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                                        <input id="completed{{ $task->id }}" name="completed" type="checkbox"
                                               onchange="this.form.submit();" {{ $task->completed ? 'checked' : '' }}>{{ $task->description }}
                                    </label>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
                <form class="box" method="post" action="{{ Route('Tutorial.tasks.store', $project->id) }}">
                    @csrf
                    <div class="field">
                        <label for="description" class="label">New Task</label>
                        <div class="control">
                            <input id="description" type="text" class="input" name="description" placeholder="New Task"
                                   value="{{ old('description') }}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Add Task</button>
                        </div>
                    </div>
                    @include('Tutorial.projects.errors')
                    {{--
                    @if($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    --}}
                </form>
            </div>
        </div>

    @else
        <h1>No project found</h1>
        <p>no project found.</p>
    @endif
@endsection

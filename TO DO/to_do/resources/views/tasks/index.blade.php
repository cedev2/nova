@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>To-Do List</h1>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($tasks->count() > 0)
                        <ul class="list-group">
                            @foreach($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="{{ $task->completed ? 'text-decoration-line-through' : '' }}">{{ $task->title }}</h5>
                                        <p class="mb-1">{{ $task->description }}</p>
                                        <small class="text-muted">Created: {{ $task->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div>
                                        <form action="{{ route('tasks.update', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="completed" value="{{ $task->completed ? 0 : 1 }}">
                                            <button type="submit" class="btn btn-sm {{ $task->completed ? 'btn-warning' : 'btn-success' }}">
                                                {{ $task->completed ? 'Mark Incomplete' : 'Mark Complete' }}
                                            </button>
                                        </form>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tasks yet. <a href="{{ route('tasks.create') }}">Create one now!</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
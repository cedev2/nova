@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Task Management</h1>
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
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: {{ $task->color }};">
                                    <div>
                                        <h5>{{ $task->title }}</h5>
                                        <p class="mb-1">{{ $task->description }}</p>
                                        <span class="badge rounded-pill bg-dark">{{ ucfirst($task->status) }}</span>
                                        <small class="text-muted">Created: {{ $task->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div>
                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
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
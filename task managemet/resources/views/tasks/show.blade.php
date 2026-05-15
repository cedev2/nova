@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>View Task</h1>
                </div>
                <div class="card-body">
                    <h3>{{ $task->title }}</h3>
                    <p>{{ $task->description }}</p>
                    <p>Status: <span class="badge bg-dark">{{ ucfirst($task->status) }}</span></p>
                    <p>Color: <span style="display:inline-block;width:20px;height:20px;background:{{ $task->color }};border-radius:4px;border:1px solid #ccc;"></span></p>

                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

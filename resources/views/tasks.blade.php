@extends('layouts.app')
@section('content')

    <div class="card-header">{{ __('tasks') }}</div>

    <div class="card-body">
        <table class="table">
            <tr>
                <td>User</td>
                <td>Title</td>
                <td>Task</td>
                <td>Start</td>
                <td>End</td>
                <td>Status</td>
            </tr>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->body }}</td>
                    <td>{{ $task->start }}</td>
                    <td>{{ $task->end }}</td>
                    <td>{{ $task->status ? "Done!" : "Pending" }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No tasks Found!</td>
                </tr>
            @endforelse
        </table>
        {{ $tasks->links() }}
    </div>

@endsection

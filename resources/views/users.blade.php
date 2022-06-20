@extends('layouts.app')
@section('content')

    <div class="card-header">{{ __('Users') }}</div>

    <div class="card-body">
        <table class="table">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Created</td>
                <td>Updated</td>
                <td>Verified</td>
            </tr>
            @forelse($users as $key => $user)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at? $user->created_at->format('d-m-Y h:i a') : '-'}}</td>
                    <td>{{ $user->updated_at? $user->updated_at->format('d-m-Y h:i a') : '-'}}</td>
                    <td>{{ $user->email_verified_at? $user->email_verified_at->format('d-m-Y h:i a') : '-'}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No Users Found!</td>
                </tr>
            @endforelse
        </table>
        {{ $users->links() }}
    </div>

@endsection

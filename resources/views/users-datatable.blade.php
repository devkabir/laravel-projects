@extends('layouts.app')
@section('content')
    <div class="card-header">{{ __('Users Datatable') }}</div>
    <div class="card-body">
        {{$dataTable->table()}}
    </div>

@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>SuperAdmin Dashboard</h2>

        <p class="mt-3 mb-1">
            <strong>Name:</strong> {{ auth()->user()->name }}
        </p>

        <p class="mb-0">
            <strong>Email:</strong> {{ auth()->user()->email }}
        </p>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>Admin Dashboard</h2>

        <p>Welcome, <strong>{{ auth()->user()->name }}</strong></p>

        <ul>
            <li>View short URLs (other companies)</li>
            <li>Invite users (restricted)</li>
        </ul>
    </div>
</div>
@endsection
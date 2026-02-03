@extends('layouts.app')

@section('content')
<h2>Invite Admin / Member</h2>

<form method="POST" action="/admin/invite-user">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="Admin">Admin</option>
            <option value="Member">Member</option>
        </select>
    </div>

    <button class="btn btn-primary">Send Invitation</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h2>Invite Admin (New Company)</h2>

<form method="POST" action="/superadmin/invite-admin">
    @csrf

    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="company_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Admin Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <button class="btn btn-primary">
        Create Company & Send Invite
    </button>
</form>
@endsection

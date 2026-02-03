@extends('layouts.app')

@section('content')
<h2>Create Short URL</h2>

<form method="POST" action="/admin/short-urls">
    @csrf

    <div class="mb-3">
        <label>Original URL</label>
        <input type="url" name="original_url" class="form-control" required>
    </div>

    <button class="btn btn-primary">Create</button>
</form>
@endsection

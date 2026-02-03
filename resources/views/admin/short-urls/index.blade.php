@extends('layouts.app')

@section('content')
<h2>Company Short URLs</h2>

<a href="/admin/short-urls/create" class="btn btn-sm btn-success mb-3">
    Create Short URL
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Short Code</th>
            <th>Original URL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shortUrls as $url)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $url->code }}</td>
                <td>{{ $url->original_url }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

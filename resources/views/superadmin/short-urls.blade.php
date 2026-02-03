@extends('layouts.app')

@section('content')
<h2>All Short URLs (All Companies)</h2>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Short Code</th>
            <th>Original URL</th>
            <th>Company</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shortUrls as $url)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $url->code }}</td>
                <td>{{ $url->original_url }}</td>
                <td>{{ $url->company->name ?? '-' }}</td>
                <td>{{ $url->creator->email ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

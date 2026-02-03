@extends('layouts.app')

@section('content')
<h2>My Short URLs</h2>

<a href="/member/short-urls/create" class="btn btn-sm btn-success mb-3">
    Create Short URL
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>#</th>
            <th>Short URL</th>
            <th>Original URL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shortUrls as $url)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ url($url->code) }}" target="_blank">
                        {{ url($url->code) }}
                    </a>
                </td>
                <td class="text-break">
                    {{ $url->original_url }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

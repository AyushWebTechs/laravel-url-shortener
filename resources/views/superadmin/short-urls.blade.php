@extends('layouts.app')

@section('content')
<h2>All Short URLs (All Companies)</h2>

<table class="table table-bordered mt-3 align-middle">
    <thead>
        <tr>
            <th>#</th>
            <th>Short URL</th>
            <th>Original URL</th>
            <th>Company</th>
            <th>Created By</th>
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
                <td>
                    {{ $url->company->name ?? '-' }}
                </td>
                <td>
                    {{ $url->creator->email ?? '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

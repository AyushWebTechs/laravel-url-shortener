@extends('layouts.app')

@section('content')
<h2>Member Dashboard</h2>

<p><strong>Name:</strong> {{ auth()->user()->name }}</p>
<p><strong>Email:</strong> {{ auth()->user()->email }}</p>
@endsection

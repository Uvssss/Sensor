@extends('wrapper')
@section('content')
@if (session('status'))
    <div class="pt-7 pt-md-8 container">
        {{ session('status') }}
    </div>
    <h2>make a mail server for forgot pass</h2>
@endif
@endsection

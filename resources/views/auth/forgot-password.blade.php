@extends('wrapper')
@section('content')
@if (session('status'))
    <div class="pt-7 pt-md-8 container">
        {{ session('status') }}
    </div>
@endif
@endsection

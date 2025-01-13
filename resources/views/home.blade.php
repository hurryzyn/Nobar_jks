@extends('layout.master')

@section('title', 'Home Page')

@section('content')
@include('layout.bg')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@include('cust.product.product', ['events' => $events])

@endsection

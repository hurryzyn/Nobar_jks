@extends('layout.master')

@section('title', 'Home Page')

@section('content')
@include('layout.bg')


@include('cust.product.product', ['events' => $events])

@endsection

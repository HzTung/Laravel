@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
@endsection

@section('main')
    @include('product.collection')
@endsection

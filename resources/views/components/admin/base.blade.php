@props(['title' => ''])

@extends('adminlte::page')

@section('title', $title)

@section('css')
    <style type="text/css">
    .content-dashboard {
    background: url("../images/fondo.png") no-repeat center center fixed;
    background-size: cover;
    }
    </style>
@stop

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')
    {{ $slot }}
@stop

@section('js')

@stop

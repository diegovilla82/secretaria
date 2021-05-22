@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <div class="container">
         {{$dataTable->table()}}
    </div>
@stop
@push('scripts')
    {{$dataTable->scripts()}}
@endpush

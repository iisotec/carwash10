@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Usuarios</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('users.create') !!}">Agregar Nuevo</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('users.table')
        
@endsection

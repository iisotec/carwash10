@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Lavados</h1>
        <!-- <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('lavados.create') !!}">Agregar Nuevo</a>
         -->
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('lavados.table')
        
@endsection

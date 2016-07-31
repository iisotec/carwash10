@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Vehiculos</h1>

        <div class="col-lg-4 pull-right">
          <div class="input-group">
           {!! Form::open(['route' =>'vehiculos.index', 'method' => 'GET', 'class'=>'navbar-form navbar-lef', 'role'=>'search' ]) !!}
               <div class='btn-group'>
                   <span class="input-group-btn">
                   {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar por Placa'] )!!}
                   <button class="btn btn-default" type="submit">Buscar</button>
                    </span>                                       
               </div>
           {!! Form::close() !!}
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <a class="btn btn-primary pull-right" style="margin-top: 10px" href="{!! route('vehiculos.create') !!}">Agregar Nuevo</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('vehiculos.busqueda')
        
@endsection

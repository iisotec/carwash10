@extends('layouts.app')

@section('content')
    @include('vehiculos.crear_lavado')

    <div class="form-group col-sm-12 col-lg-12">
           <a href="{!! route('vehiculos.index') !!}" class="btn btn-default">Atras</a>
           <a class="btn btn-primary pull-lef enviar_lavado" href="{!! route('lavados.create') !!}">Agregar lavado</a>
           <button type="button" id="disponibilidad"  class="bt_enviar envi"  >ver disponibilidad</button>
    </div>

@endsection



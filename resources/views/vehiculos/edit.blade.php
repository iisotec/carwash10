@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Vehiculo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($vehiculo, ['route' => ['vehiculos.update', $vehiculo->id], 'method' => 'patch']) !!}

            @include('vehiculos.fields')

            {!! Form::close() !!}
        </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Crear nuevo lavado</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'lavados.store']) !!}

            @include('lavados.fields')

        {!! Form::close() !!}
    </div>
@endsection

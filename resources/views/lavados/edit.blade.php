@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edicion lavados</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($lavado, ['route' => ['lavados.update', $lavado->id], 'method' => 'patch']) !!}

            @include('lavados.fields')

            {!! Form::close() !!}
        </div>
@endsection

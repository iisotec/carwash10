@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Socursal</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($socursal, ['route' => ['socursals.update', $socursal->id], 'method' => 'patch']) !!}

            @include('socursals.fields')

            {!! Form::close() !!}
        </div>
@endsection

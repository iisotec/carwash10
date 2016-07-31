@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Socursal</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'socursals.store']) !!}

            @include('socursals.fields')

        {!! Form::close() !!}
    </div>
@endsection

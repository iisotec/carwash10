@extends('layouts.app')

@section('content')
    @include('lavados.show_fields')

    <div class="form-group">
           <a href="{!! route('lavados.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection

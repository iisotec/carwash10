@extends('layouts.app')

@section('content')
    @include('users.show_fields')

    <div class="form-group">
           <a href="{!! route('users.index') !!}" class="btn btn-default">Atras</a>
    </div>
@endsection

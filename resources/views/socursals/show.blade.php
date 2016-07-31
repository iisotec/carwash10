@extends('layouts.app')

@section('content')
    @include('socursals.show_fields')

    <div class="form-group">
           <a href="{!! route('socursals.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection

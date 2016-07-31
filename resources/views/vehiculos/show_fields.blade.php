<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehiculo->id !!}</p>
</div>

<!-- Placa Field -->
<div class="form-group">
    {!! Form::label('placa', 'Placa:') !!}
    <p>{!! $vehiculo->placa !!}</p>
    {!! Form::text('placa', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Registro Field -->
<div class="form-group">
    {!! Form::label('fecha_registro', 'Fecha Registro:') !!}
    <p>{!! $vehiculo->fecha_registro !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $vehiculo->tipo !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $vehiculo->descripcion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vehiculo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vehiculo->updated_at !!}</p>
</div>


<!-- Placa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('placa', 'Placa:') !!}
    {!! Form::text('placa', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', ['Taxi' => 'Taxi', 'Combi' => 'Combi', 'Camion' => 'Camion', 'Volvo' => 'Volvo'], null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehiculos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

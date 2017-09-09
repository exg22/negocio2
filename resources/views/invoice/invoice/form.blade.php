<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fecha',date('d-m-Y'), ['class' => 'form-control','id' => 'datepicker']) !!}
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('client_id') ? 'has-error' : ''}}">
    {!! Form::label('client_id', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('client_id', $clients,null, ['class' => 'form-control']) !!}
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('payment_id') ? 'has-error' : ''}}">
    {!! Form::label('payment_id', 'Forma de pago', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('payment_id',$payments, null, ['class' => 'form-control']) !!}
        {!! $errors->first('payment_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('type_id') ? 'has-error' : '' }}">
    {!! Form::label('type_id', 'Comlain Type') !!}<span class="astrix">*</span>:
    {!! Form::select('type_id', $complain_typeItems, null, ['class' => 'form-control select2']) !!}
    @if($errors->has('type_id'))
        <span class="help-block">
            <strong>{{ $errors->first('type_id') }}</strong>
        </span>
    @endif
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('message', 'Message') !!}<span class="astrix">*</span>:
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    @if($errors->has('message'))
        <span class="help-class">
            <strong>{{ $errors>first('message') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('complains.index') }}" class="btn btn-default">Cancel</a>
</div>

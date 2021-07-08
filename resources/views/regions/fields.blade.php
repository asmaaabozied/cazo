<!-- Name En Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_en') ? 'has-error' : '' }}">
    {!! Form::label('name_en', 'Name English') !!}<span class="astrix">*</span>:
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name_en'))
        <span class="help-block">
            <strong>{{ $errors->first('name_en') }}</strong>
        </span>
    @endif
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    {!! Form::label('name_ar', 'Name Arabic') !!}<span class="astrix">*</span>:
    {!! Form::text('name_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if ($errors->has('name_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('name_ar') }}</strong>
        </span>
    @endif
</div>

<!-- active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regions.index') }}" class="btn btn-default">Cancel</a>
</div>

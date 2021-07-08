<!-- Name En Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_en') ? 'has-error' : '' }}">
    {!! Form::label('name_en', 'Name English') !!}<span class="astrix">*</span>:
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('name_en'))
        <span class="help-block">
            <strong>{{ $errors->first('name_en') }}</strong>
        </span>
    @endif
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('name_ar') ? 'has-error' : '' }}">
    {!! Form::label('name_ar', 'Name Arabic') !!}<span class="astrix">*</span>:
    {!! Form::text('name_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('name_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('name_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Region Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('region_id') ? 'has-error' : '' }}">
    {!! Form::label('region_id', 'Region') !!}<span class="astrix">*</span>:
    {!! Form::select('region_id', $regionItems, null, ['placeholder' => 'Please select a Region', 'class' => 'form-control select2']) !!}
    @if($errors->has('region_id'))
        <span class="help-block">
            <strong>{{ $errors->first('region_id') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('suburbs.index') }}" class="btn btn-default">Cancel</a>
</div>

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

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', 'Image') !!}<span class="astrix">*</span>:<i class="fa fa-info-circle" style="font-size: 18px"><span class="tooltiptext">Image Size should be 200 * 120</span></i>
        <label for="image" id="image_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpg,image/jpeg']) !!}
        <span class="image-validation" id="image_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($category))
            @if($category->image != null)
                <img src="{{ url($category->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif 
    </div>
</div>
<div class="clearfix"></div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>

<!-- Home Field -->
<div class="form-group col-sm-6">
    {!! Form::label('home', 'In Home Page:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('home', 0) !!}
        {!! Form::checkbox('home', '1', null) !!}
    </label>
</div>


<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Category:') !!}
    {!! Form::select('parent_id', $categoryItems, null, ['placeholder' => 'Select a parent category if the category you adding is a sub','class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
</div>

@extends('layouts.scripts')

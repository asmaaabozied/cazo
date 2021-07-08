<!-- Title En Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_en') ? 'has-error' : '' }}">
    {!! Form::label('title_en', 'English Title') !!}<span class="astrix">*</span>:
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_en'))
        <span class="help-block">
            <strong>{{ $errors->first('title_en') }}</strong>
        </span>
    @endif
</div>

<!-- Title Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('title_ar') ? 'has-error' : '' }}">
    {!! Form::label('title_ar', 'Arabic Title') !!}<span class="astrix">*</span>:
    {!! Form::text('title_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('title_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('title_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Image En Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image_en') ? 'has-error' : '' }}">
        {!! Form::label('image_en', 'English Image') !!}<span class="astrix">*</span>:<br>
        <label for="image_en" id="image_en_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to Upload
        </label>
        {!! Form::file('image_en', ['accept' => "image/png,image/jpeg"]) !!}
        <span class="image-validation" id="image_en_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image_en'))
            <span class="help-block">
                <strong>{{ $errors->first('image_en') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($ads))
            @if($ads->image_en != null)
                <img src="{{ url($ads->image_en) }}" height="200px" width="250px" class="img img-responsive" id="image_en_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_en_preview" />
            @endif
        @else
        <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_en_preview" />
        @endif
    </div>
</div>

<!-- Image Ar Field -->
<div class="form-group col-sm-6 row" style="margin-left: 1%">
    <div class="form-group col-sm-6 {{ $errors->has('image_ar') ? 'has-error' : '' }}">
        {!! Form::label('image_ar', 'Arabic Image') !!}<span class="astrix">*</span>:<br>
        <label for="image_ar" id="image_ar_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to Upload
        </label>
        {!! Form::file('image_ar', ['accept' => "image/png,image/jpeg"]) !!}
        <span class="image-validation" id="image_ar_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image_ar'))
            <span class="help-block">
                <strong>{{ $errors->first('image_ar') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($ads))
            @if($ads->image_ar != null)
                <img src="{{ url($ads->image_ar) }}" height="200px" width="250px" class="img img-reponsive" id="image_ar_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_ar_preview" />
            @endif
        @else
        <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_ar_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Starting Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('starting_date', 'Starting Date:') !!}
    {!! Form::text('starting_date', null, ['class' => 'form-control','id'=>'starting_date']) !!}
</div>

<!-- Ending Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ending_date', 'Ending Date:') !!}
    {!! Form::text('ending_date', null, ['class' => 'form-control','id'=>'ending_date']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ads.index') }}" class="btn btn-default">Cancel</a>
</div>

@extends('layouts.scripts')

@push('scripts')
    <script>
        var today   = new Date();
        var dd      = today.getDate();
        var mm      = today.getMonth() + 1;
        var yyyy    = today.getFullYear();
        
        if(dd < 10){
            dd = '0' + dd;
        }
        if(mm < 10){
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        $('#ending_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        })
        $('#starting_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true,
        })
        $("#starting_date").on("dp.change", function (e) {
            $('#ending_date').data("DateTimePicker").minDate(e.date);
        });
    </script>
@endpush

<!-- Name Field -->
<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}<span class="astrix">*</span>:
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}<span class="astrix">*</span>:
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}<span class="astrix">*</span>:
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<!-- Password Confirmation Field -->
<div class="form-group col-sm-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Password Confirmation') !!}<span class="astrix">*</span>:
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @if($errors->has('password_confirmation'))
        <span class="help-block">    
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>

<!-- Birth Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('birth_date') ? 'has-error' : '' }}">
    {!! Form::label('birth_date', 'Birth Date') !!}<span class="astrix">*</span>:
    {!! Form::text('birth_date', null, ['class' => 'form-control','id'=>'birth_date']) !!}
    @if($errors->has('birth_date'))
        <span class="help-block">
            <strong>{{ $errors->first('birth_date') }}</strong>
        </span>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birth_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Phone Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number') !!}<span class="astrix">*</span>:
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('phone_number'))
        <span class="help-block">
            <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', 'Image:') !!}
        <label for="image" id="image_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('image', ['accept' => 'image/png,image/jpeg,image/jpg']) !!}
        <span class="image-validation" id="image_validation">
            <strong> the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-sm-6">
        @if(isset($clients))
            @if($clients->image != null)
                <img src="{{ url($clients->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview"/>
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Gender Field -->
<div class="form-group col-sm-12 {{ $errors->has('gender') ? 'has-error' : '' }}">
    {!! Form::label('gender', 'Gender') !!}<span class="astrix">*</span>:
    <label class="radio-inline">
        {!! Form::radio('gender', "Male", null) !!} Male
    </label>

    <label class="radio-inline">
        {!! Form::radio('gender', "Female", null) !!} Female
    </label>
    @if($errors->has('gender'))
        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
</div>

{{-- <!-- Google Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('google_id', 'Google Id:') !!}
    {!! Form::text('google_id', null, ['class' => 'form-control']) !!}
    @if($errors->has('google_id'))
        <span class="help-block">
            <strong>{{ $errors->first('google_id') }}</strong> 
        </span>
    @endif
</div>

<!-- Facebook Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_id', 'Facebook Id:') !!}
    {!! Form::text('facebook_id', null, ['class' => 'form-control']) !!}
    @if($errors->has('facebook_id'))
        <span class="help-block">
            <strong>{{ $errors->first('facebook_id') }}</strong>
        </span>
    @endif
</div>

<!-- Twitter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter_id', 'Twitter Id:') !!}
    {!! Form::text('twitter_id', null, ['class' => 'form-control']) !!}
    @if($errors->has('twitter_id'))
        <span class="help-block">
            <strong>{{ $errors->first('twitter_id') }}</strong>
        </span>
    @endif
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
</div>

@extends('layouts.scripts')

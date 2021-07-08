<!-- Contact Email Field -->
<div class="form-group col-sm-6 {{ $errors->has('contact_email') ? 'has-error' : '' }}">
    {!! Form::label('contact_email', 'Contact Email') !!}<span class="astrix">*</span>:
    {!! Form::email('contact_email', null, ['class' => 'form-control']) !!}
    @if($errors->has('contact_email'))
        <span class="help-block">
            <strong>{{ $errors->first('contact_email') }}</strong>
        </span>
    @endif
</div>

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

<!-- About En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('about_en') ? 'has-error' : '' }}">
    {!! Form::label('about_en', 'English About') !!}<span class="astrix">*</span>:
    {!! Form::textarea('about_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('about_en'))
        <span class="help-block">
            <strong>{{ $errors->first('about_en') }}</strong>
        </span>
    @endif
</div>

<!-- About Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('about_ar') ? 'has-error' : '' }}">
    {!! Form::label('about_ar', 'Arabic About') !!}<span class="astrix">*</span>:
    {!! Form::textarea('about_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('about_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('about_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Privecy En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('privecy_en') ? 'has-error' : '' }}">
    {!! Form::label('privecy_en', 'English Privecy') !!}<span class="astrix">*</span>:
    {!! Form::textarea('privecy_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('privecy_en'))
        <span class="help-block">
            <strong>{{ $errors->first('privecy_en') }}</strong>
        </span>
    @endif
</div>

<!-- Privecy Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('privecy_ar') ? 'has-error' : '' }}">
    {!! Form::label('privecy_ar', 'Arabic Privecy') !!}<span class="astrix">*</span>:
    {!! Form::textarea('privecy_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('privecy_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('privecy_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Terms Condtions Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('terms_conditions_en') ? 'has-error' : '' }}">
    {!! Form::label('terms_conditions_en', 'English Terms & Condtions') !!}<span class="astrix">*</span>:
    {!! Form::textarea('terms_conditions_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('terms_conditions_en'))
        <span class="help-block">
            <strong>{{ $errors->first('terms_conditions_en') }}</strong>
        </span>
    @endif
</div>

<!-- Terms Coditions Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('terms_conditions_ar') ? 'has-error' : '' }}">
    {!! Form::label('terms_conditions_ar', 'Arabic Terms & Coditions') !!}<span class="astrix">*</span>:
    {!! Form::textarea('terms_conditions_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('terms_conditions_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('terms_conditions_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Facebook Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
    {!! Form::label('facebook_link', 'Facebook Link') !!}<span class="astrix">*</span>:
    {!! Form::text('facebook_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('facebook_link'))
        <span class="help-block">
            <strong>{{ $errors->first('facebook_link') }}</strong>
        </span>
    @endif
</div>

<!-- Instagram Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('instagram_link') ? 'has-error' : '' }}">
    {!! Form::label('instagram_link', 'Instagram Link') !!}<span class="astrix">*</span>:
    {!! Form::text('instagram_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('instagram_link'))
        <span class="help-block">
            <strong>{{ $errors->first('instagram_link') }}</strong>
        </span>
    @endif
</div>

<!-- Twitter Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('twitter_link') ? 'has-error' : '' }}">
    {!! Form::label('twitter_link', 'Twitter Link') !!}<span class="astrix">*</span>:
    {!! Form::text('twitter_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('twitter_link'))
        <span class="help-block">
            <strong>{{ $errors->first('twitter_link') }}</strong>
        </span>
    @endif
</div>

<!-- Snapchat Link Field -->
<div class="form-group col-sm-6 {{ $errors->has('snapchat_link') ? 'has-error' : '' }}">
    {!! Form::label('snapchat_link', 'Snapchat Link') !!}<span class="astrix">*</span>:
    {!! Form::text('snapchat_link', null, ['class' => 'form-control']) !!}
    @if($errors->has('snapchat_link'))
        <span class="help-block">
            <strong>{{ $errors->first('snapchat_link') }}</strong>
        </span>
    @endif
</div>

<!-- Default Fee Field -->
<div class="form-group col-sm-6 {{ $errors->has('default_fee') ? 'has-error' : '' }}">
    {!! Form::label('default_fee', 'Default Fee') !!}<span class="astrix">*</span>:
    {!! Form::number('default_fee', null, ['class' => 'form-control']) !!}
    @if($errors->has('default_fee'))
        <span class="help-block">
            <strong>{{ $errors->first('default_fee') }}</strong>
        </span>
    @endif
</div>

<!-- About Image Field -->
<div class="form-group col-md-6">
    <div class="form-group col-md-6 {{ $errors->has('about_image') ? 'has-error' : '' }}">
        {!! Form::label('about_image', 'About Image:') !!}
        <label for="about_image" id="about_image_label" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> click to upload
        </label>
        {!! Form::file('about_image', ['accept' => 'image/png,image/jpg,image/jpeg']) !!}
        <span class="image-validation" id="about_image_validation">
            <strong>the type of image should be png or jpg</strong>
        </span>
        @if($errors->has('about_image'))
            <span class="help-block">
                <strong>{{ $errors->first('about_image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        @if(isset($informativeData))
            @if($informativeData->about_image != null)
                <img src="{{ url($informativeData->about_image) }}" height="200px" width="250px" class="img img-responsive" id="about_image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="about_image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="about_image_preview" />
        @endif
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('informativeDatas.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')

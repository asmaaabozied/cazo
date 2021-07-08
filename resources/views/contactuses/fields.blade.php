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

<!-- Phone Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number') !!}<span class="astrix">*</span>:
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
    @if($errors->has('phone_number'))
        <span class="phone_number">
            <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
</div>

<!-- Message Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('message', 'Message') !!}<span class="astrix">*</span>:
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    @if($errors->has('message'))
        <span class="help-block">
            <strong>{{ $errors->first('message') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactuses.index') }}" class="btn btn-default">Cancel</a>
</div>

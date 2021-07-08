<!-- Question En Field -->
<div class="form-group col-sm-6 {{ $errors->has('question_en') ? 'has-error' : '' }}">
    {!! Form::label('question_en', 'English Question') !!}<span class="astrix">*</span>:
    {!! Form::text('question_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('question_en'))
        <span class="help-block">
            <strong>{{ $errors->first('question_en') }}</strong>
        </span>
    @endif
</div>

<!-- Question Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('question_ar') ? 'has-error' : '' }}">
    {!! Form::label('question_ar', 'Arabic Question') !!}<span class="astrix">*</span>:
    {!! Form::text('question_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('question_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('question_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Answer En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('answer_en') ? 'has-error' : '' }}">
    {!! Form::label('answer_en', 'English Answer') !!}<span class="astrix">*</span>:
    {!! Form::textarea('answer_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('answer_en'))
        <span class="help-block">
            <strong>{{ $errors->first('answer_en') }}</strong>
        </span>
    @endif
</div>

<!-- Asnwer Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('answer_ar') ? 'has-error' : '' }}">
    {!! Form::label('answer_ar', 'Arabic Asnwer') !!}<span class="astrix">*</span>:
    {!! Form::textarea('answer_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('answer_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('answer_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fAQS.index') }}" class="btn btn-default">Cancel</a>
</div>

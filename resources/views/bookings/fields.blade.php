<!-- Status Field -->
<div class="form-group col-sm-6 {{ $errors->has('status') ? 'has-error' : '' }}">
    {!! Form::label('status', 'Status') !!}<span class="astrix">*</span>:
    {!! Form::select('status', ['1' => 'New', '2' => 'Finished', '3' => 'Canceled'], null, ['placeholder' => 'Please select Status....', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
    @if($errors->has('status'))
        <span class="help-block">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bookings.index') }}" class="btn btn-default">Cancel</a>
</div>

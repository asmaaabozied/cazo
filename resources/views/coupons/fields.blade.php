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

<!-- Count Of Use Field -->
<div class="form-group col-sm-6 {{ $errors->has('count_of_use') ? 'has-error' : '' }}">
    {!! Form::label('count_of_use', 'Count Of Use') !!}<span class="astrix">*</span>:
    {!! Form::number('count_of_use', null, ['class' => 'form-control']) !!}
    @if($errors->has('count_of_use'))
        <span class="help-block">
            <strong>{{ $errors->first('count_of_use') }}</strong>
        </span>
    @endif
</div>

<!-- Code Field -->
<div class="form-group col-sm-6 {{ $errors->has('code') ? 'has-error' : '' }}">
    {!! Form::label('code', 'Code') !!}<span class="astrix">*</span>:
    {{-- {!! Form::text('code', null, ['class' => 'form-control','minlength' => 6]) !!} --}}
    <div class="input-group input-group-sm">
        <input type="text" class="form-control" minlength="6" name="code" id="code" value="{{ isset($coupon) ? $coupon->code : old('code') }}">
        <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-flat" onclick="generateCode()">Generate</button>
        </span>
    </div>
    @if($errors->has('code'))
        <span class="help-block">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
    @endif
</div>

<!-- discount Field -->
<div class="form-group col-sm-6 {{ $errors->has('discount') ? 'has-error' : '' }}">
    {!! Form::label('discount', 'discount') !!}<span class="astrix">*</span>:
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
    @if($errors->has('discount'))
        <span class="help-block">
            <strong>{{ $errors->first('discount') }}</strong>
        </span>
    @endif
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('start_date') ? 'has-error' : '' }}">
    {!! Form::label('start_date', 'Start Date') !!}<span class="astrix">*</span>:
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
    @if($errors->has('start_date'))
        <span class="help-block">
            <strong>{{ $errors->first('start_date') }}</strong>
        </span>
    @endif
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('end_date') ? 'has-error' : '' }}">
    {!! Form::label('end_date', 'End Date') !!}<span class="astrix">*</span>:
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
    @if($errors->has('end_date'))
        <span class="help-block">
            <strong>{{ $errors->first('end_date') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('coupons.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')

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
        
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
            // useCurrent: true,
            sideBySide: true,
        })
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            // useCurrent: true,
            sideBySide: true,
        })
        $("#start_date").on("dp.change", function(e) {
            $('#end_date').data('DateTimePicker').minDate(e.date);
        });

        function generateCode(){
            var result            = '';
            var characters        = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength  = characters.length;
            for ( var i = 0; i < 6; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            document.getElementById("code").value = result;
        }
    </script>
@endpush

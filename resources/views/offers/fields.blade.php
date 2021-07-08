<!-- Specialization Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('specialization_id') ? 'has-error' : '' }}">
    {!! Form::label('specialization_id', 'Specialization') !!}<span class="astrix">*</span>:
    {!! Form::select('specialization_id', $specializationItems, null, ['placeholder' => 'Please select a Specialization.....', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
    @if($errors->has('specialization_id'))
        <span class="help-block">
            <strong>{{ $errors->first('specialization_id') }}</strong>
        </span>
    @endif
</div>




    <div class="form-group col-sm-6 {{ $errors->has('offer_type') ? 'has-error' : '' }}">

        <label>offer_type</label>

        <select class="form-control select2" name="offer_id" id="parent" required>
            <option selected disabled>Please select a Type.....</option>
            @foreach(\App\Models\Offertype::get()->pluck('type','id') as $id => $item)
                <option value="{{$id}}"  >{{$item}}</option>
            @endforeach
        </select>
        @if($errors->has('offer_type'))
            <span class="help-block">
            <strong>{{ $errors->first('offer_type') }}</strong>
        </span>
        @endif

    </div>


<!-- Offer Type Field -->
{{--<div class="form-group col-sm-6 {{ $errors->has('offer_type') ? 'has-error' : '' }}">--}}
{{--    {!! Form::label('offer_type', 'Offer Type') !!}<span class="astrix">*</span>:--}}
{{--    {!! Form::select('offer_type', ['3' => 'VIP', '2' => '24Hours', '1' => 'Under100'], null, ['placeholder' => 'Please select a Type.....', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}--}}
{{--    @if($errors->has('offer_type'))--}}
{{--        <span class="help-block">--}}
{{--            <strong>{{ $errors->first('offer_type') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}

<!-- Offer Value Field -->
<div class="form-group col-sm-6 {{ $errors->has('offer_value') ? 'has-error' : '' }}">
    {!! Form::label('offer_value', 'Offer Value') !!}<span class="astrix">*</span>:
    {!! Form::number('offer_value', null, ['class' => 'form-control']) !!}
    @if($errors->has('offer_value'))
        <span class="help-block">
            <strong>{{ $errors->first('offer_value') }}</strong>
        </span>
    @endif
</div>

<!-- Starting Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('starting_date') ? 'has-error' : '' }}">
    {!! Form::label('starting_date', 'Starting Date') !!}<span class="astrix">*</span>:
    {!! Form::text('starting_date', null, ['class' => 'form-control','id'=>'starting_date']) !!}
    @if($errors->has('starting_date'))
        <span class="help-block">
            <strong>{{ $errors->first('starting_date') }}</strong>
        </span>
    @endif
</div>

<!-- Ending Date Field -->
<div class="form-group col-sm-6 {{ $errors->has('ending_date') ? 'has-error' : '' }}">
    {!! Form::label('ending_date', 'Ending Date') !!}<span class="astrix">*</span>:
    {!! Form::text('ending_date', null, ['class' => 'form-control','id'=>'ending_date']) !!}
    @if($errors->has('ending_date'))
        <span class="help-block">
            <strong>{{ $errors->first('ending_date') }}</strong>
        </span>
    @endif
</div>

<!-- Home Field -->
<div class="form-group col-sm-6">
    {!! Form::label('home', 'In Home Page:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('home', 0) !!}
        {!! Form::checkbox('home', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('offers.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')

@push('scripts')
    <script type="text/javascript">
        var today    = new Date();
        var dd       = today.getDate();
        var mm       = today.getMonth() + 1;
        var yyyy     = today.getFullYear();

        if(dd < 10){
            dd = '0' + dd;
        }
        if(mm < 10){
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        $('#starting_date').datetimepicker({
            format     : 'YYYY-MM-DD',
            useCurrent : true,
            sideBySide : true,
        })
        $('#ending_date').datetimepicker({
            format     : 'YYYY-MM-DD',
            useCurrent : true,
            sideBySide : true,
            minDate    : today
        })
        $('#starting_date').on("dp.change", function(e){
            $('#ending_date').data("DateTimePicker").minDate(e.date);
        })
    </script>
@endpush


<div class="box box-primary">
    <div class="box-header">
        <h4>Specialization Information</h4>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Name En Field -->
            <div class="form-group col-sm-6 {{ $errors->has('name_en') ? 'has-error' : '' }}">
                {!! Form::label('name_en', 'English Name') !!}<span class="astrix">*</span>:
                {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
                @if($errors->has('name_en'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_en') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Name Ar Field -->
            <div class="form-group col-sm-6 {{ $errors->has('name_ar') ? 'has-error' : '' }}">
                {!! Form::label('name_ar', 'Arabic Name') !!}<span class="astrix">*</span>:
                {!! Form::text('name_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
                @if($errors->has('name_ar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_ar') }}</strong>
                    </span>
                @endif
            </div>

{{--            <!-- English Doctor Name Field -->--}}
{{--            <div class="form-group col-sm-6 {{ $errors->has('doc_name_en') ? 'has-error' : '' }}">--}}
{{--                {!! Form::label('doc_name_en', 'Doctor English Name') !!}<span class="astrix">*</span>:--}}
{{--                {!! Form::text('doc_name_en', null, ['class' => 'form-control']) !!}--}}
{{--                @if($errors->has('doc_name_en'))--}}
{{--                    <span class="help-block">--}}
{{--                        <strong>{{ $errors->first('doc_name_en') }}</strong>--}}
{{--                    </span> --}}
{{--                @endif--}}
{{--            </div>--}}

{{--            <!-- Arabic Doctor Name Field -->--}}
{{--            <div class="form-group col-sm-6 {{ $errors->has('doc_name_ar') ? 'has-error' : '' }}">--}}
{{--                {!! Form::label('doc_name_ar', 'Doctor Arabic Name') !!}<span class="astrix">*</span>:--}}
{{--                {!! Form::text('doc_name_ar', null, ['class' => 'form-control']) !!}--}}
{{--                @if($errors->has('doc_name_ar'))--}}
{{--                    <span class="help-block">--}}
{{--                        <strong>{{ $errors->first('doc_name_ar') }}</strong>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}

            <!-- English Doctor Title -->
{{--            <div class="form-group col-sm-6 {{ $errors->has('doc_title_en') ? 'has-error' : '' }}">--}}
{{--                {!! Form::label('doc_title_en', 'English Doctor Title') !!}<span class="astrix">*</span>:--}}
{{--                {!! Form::text('doc_title_en', null, ['class' => 'form-control']) !!}--}}
{{--                @if($errors->has('doc_title_en'))--}}
{{--                    <span class="help-block">--}}
{{--                        <strong>{{ $errors->first('doc_title_en') }}</strong>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--            <!-- Arabic Doctor Title -->--}}
{{--            <div class="form-group col-sm-6 {{ $errors->has('doc_title_ar') ? 'has-error' : '' }}">--}}
{{--                {!! Form::label('doc_title_ar', 'Arabic Doctor Title') !!}<span class="astrix">*</span>:--}}
{{--                {!! Form::text('doc_title_ar', null, ['class' => 'form-control']) !!}--}}
{{--                @if($errors->has('doc_title_ar'))--}}
{{--                    <span class="help-block">--}}
{{--                        <strong>{{ $errors->first('doc_title_ar') }}</strong>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}

            <!-- Doctor Gender -->
            <div class="form-group col-sm-6 {{ $errors->has('doc_gender') ? 'has-error' : '' }}">
                {!! Form::label('doc_gender', 'Doctor Gender') !!}<span class="astrix">*</span>:
                {!! Form::select('doc_gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['placeholder' => 'Please Doctor gender....', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
                @if($errors->has('doc_gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('doc_gender') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Fee Field -->
            <div class="form-group col-sm-6 {{ $errors->has('fee') ? 'has-error' : '' }}">
                {!! Form::label('fee', 'Fee') !!}<span class="astrix">*</span>:
                {!! Form::number('fee', null, ['class' => 'form-control']) !!}
                @if($errors->has('fee'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fee') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Description En Field -->
            <div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_en') ? 'has-error' : '' }}">
                {!! Form::label('description_en', 'English Description') !!}<span class="astrix">*</span>:
                {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
                @if($errors->has('description_en'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descriptoin_en') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Description Ar Field -->
            <div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_ar') ? 'has-error' : '' }}">
                {!! Form::label('description_ar', 'Arabic Description') !!}<span class="astrix">*</span>:
                {!! Form::textarea('description_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
                @if($errors->has('description_ar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description_ar') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Category Id Field -->
            <div class="form-group col-sm-6 {{ $errors->has('category_id') ? 'has-error' : '' }}">
                {!! Form::label('category_id', 'Category') !!}<span class="astrix">*</span>:
                {!! Form::select('category_id', $categoryItems, null, ['placeholder' => 'Please select a Main Category.....', 'class' => 'form-control select2 select2-hidden-accessibe', 'style' => 'width:100%']) !!}
                @if($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Subcategory id Field -->
            <div class="form-group col-sm-6 {{ $errors->has('subcategory_id') ? 'has-error' : '' }}">
                {!! Form::label('subcategory_id', 'Subcategory') !!}<span class="astrix">*</span>:
                {!! Form::select('subcategory_id', [], null, ['placeholder' => 'Please select a Subcategory.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%', 'disabled']) !!}
                @if($errors->has('subcategory_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Clinic Field -->
            <div class="form-group col-sm-6 {{ $errors->has('clinic_id') ? 'has-error' : '' }}">
                {!! Form::label('clinic', 'Clinic') !!}<span class="astrix">*</span>:
                {!! Form::select('clinic_id', $clinicItems, null, ['placeholder' => 'Please select a Clinic.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%']) !!}
                @if($errors->has('clinic_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('clinic_id') }}</strong>
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

            <!-- Allow Upload Files Field -->
{{--            <div class="form-group col-sm-6">--}}
{{--                {!! Form::label('allow_upload_files', 'Allow Upload Files:') !!}--}}
{{--                <label class="checkbox-inline">--}}
{{--                    {!! Form::hidden('allow_upload_files', 0) !!}--}}
{{--                    {!! Form::checkbox('allow_upload_files', '1', null) !!}--}}
{{--                </label>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h4>Specialization Images</h4>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Image Field -->
            <div class="form-group col-sm-12 row">
                <div class="form-group col-sm-3 {{ $errors->has('images') ? 'has-error' : '' }}">
                    {!! Form::label('images', 'Image') !!}<span class="astrix">*</span>:<i class="fa fa-info-circle" style="font-size: 18px"><span class="tooltiptext">Image Size should be 920 * 480</span></i>
                    <label for="images" id="image_label" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> click to upload
                    </label>
                    {!! Form::file('images[]', ['accept' => 'image/png,image/jpg,image/jpeg', 'id' => 'images', 'multiple']) !!}
                    <span class="image-validation" id="image_validation">
                        <strong>maximum number of images is 5</strong>
                    </span>
                    @if($errors->has('images'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-12 text-center product-images" id="product-images">
                    @if(isset($specialization) && count($specialization->images))
                        @foreach($specialization->images as $image)
                            <img src="{{ url($image->image) }}" height="200" width="19%" class="img img-responsive" style="display: inline" id="image_preview"/>
                        @endforeach
                    @else
                        <img src="{{ url('images/temp.png') }}" height="200px" width="20%" class="img img-responsive" style="display: inline" id="image_preview" />
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h4>Specialization Working Hours</h4>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-12">
                {{-- Sunday --}}
                <div class="row sunday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[1]', 0) !!}
                            {!! Form::checkbox('days[1]', '1', null, ['id' => 'day1']) !!}
                        </label>
                        {!! Form::label('days[1]', 'Sunday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[1]', null, ['class' => 'form-control starting_date1','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[1]', null, ['class' => 'form-control ending_date1','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[1]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Monday --}}
                <div class="row monday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[2]', 0) !!}
                            {!! Form::checkbox('days[2]', '1', null, ['id' => 'day2']) !!}
                        </label>
                        {!! Form::label('days[2]', 'Monday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[2]', null, ['class' => 'form-control starting_date2','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[2]', null, ['class' => 'form-control ending_date2','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[2]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Teusday --}}
                <div class="row tuesday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[3]', 0) !!}
                            {!! Form::checkbox('days[3]', '1', null, ['id' => 'day3']) !!}
                        </label>
                        {!! Form::label('days[3]', 'Tuesday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[3]', null, ['class' => 'form-control starting_date3','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[3]', null, ['class' => 'form-control ending_date3','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[3]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Wednesday --}}
                <div class="row wednsday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[4]', 0) !!}
                            {!! Form::checkbox('days[4]', '1', null, ['id' => 'day4']) !!}
                        </label>
                        {!! Form::label('days[4]', 'Wednesday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[4]', null, ['class' => 'form-control starting_date4','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[4]', null, ['class' => 'form-control ending_date4','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[4]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Thursday --}}
                <div class="row thursday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[5]', 0) !!}
                            {!! Form::checkbox('days[5]', '1', null, ['id' => 'day5']) !!}
                        </label>
                        {!! Form::label('days[5]', 'Thursday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[5]', null, ['class' => 'form-control starting_date5','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[5]', null, ['class' => 'form-control ending_date5','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[5]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Friday --}}
                <div class="row friday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[6]', 0) !!}
                            {!! Form::checkbox('days[6]', '1', null, ['id' => 'day6']) !!}
                        </label>
                        {!! Form::label('days[6]', 'Friday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[6]', null, ['class' => 'form-control starting_date6','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[6]', null, ['class' => 'form-control ending_date6','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[6]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Saturday --}}
                <div class="row saturday">
                    <div class="form-group col-sm-4">
                        <label class="checkbox-inline">
                            {!! Form::hidden('days[7]', 0) !!}
                            {!! Form::checkbox('days[7]', '1', null, ['id' => 'day7']) !!}
                        </label>
                        {!! Form::label('days[7]', 'Saturday') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Starting Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Starting Date:') !!}
                            {!! Form::text('start_date[7]', null, ['class' => 'form-control starting_date7','id'=>'starting_date']) !!}
                        </div>

                        <!-- Ending Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Ending Date:') !!}
                            {!! Form::text('end_date[7]', null, ['class' => 'form-control ending_date7','id'=>'ending_date']) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <!-- Count Of Use Field -->
                        <div class="form-group col-sm-12 {{ $errors->has('splitter') ? 'has-error' : '' }}">
                            {!! Form::label('splitter', 'Check up Time') !!}<span class="astrix">*</span>:
                            {!! Form::number('splitter[7]', null, ['class' => 'form-control']) !!}
                            @if($errors->has('splitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('splitter') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('specializations.index') }}" class="btn btn-default">Cancel</a>
</div>

<div class="clearfix"></div>

@include('layouts.scripts')

@push('scripts')
    @if(isset($specialization))
        <script type="module">
            var specialization_category_id      = "{{ $specialization->category_id }}";
            var specialization_subcategory_id   = "{{ $specialization->subcategory_id }}";
            if(specialization_category_id != null && specialization_subcategory_id != null && specialization_category_id != '' && specialization_subcategory_id != ''){
                var url = "{{ url('/select/subcategories') }}" + '/' + specialization_category_id;
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    beforeSend  : function(request){
                        request.setRequestHeader("Accept-Language", "en");
                    },
                    success     : function(data){
                        if(data.data.length > 0){
                            emptySelect('#subcategory_id', 'Subcategory', false);
                            $.each(data.data, function(i, obj){
                                if(obj.id == specialization_subcategory_id){
                                    $('#subcategory_id').append('<option selected="selected" value="' + obj.id + '">' + obj.name + '</option>');
                                }else{
                                    $('#subcategory_id').append("<option value='" + obj.id + '">' + obj.name + '</option>');
                                }
                            });
                        }else{
                            emptySelect('#subcategory_id', 'Subcategory', 'disabled');
                        }
                    }
                });
            }else{
                emptySelect('#subcategory_id', 'Subcategory', 'disabled');
            }
            @foreach($specialization->days as $day)
                var open = "{{ $day->open }}";
                var day  = "{{ $day->day }}";
                if(open == 1){
                    @foreach($day->times as $index => $time)
                        if("{{ $index }}" == 0){
                            var starting_day = "{{ date('H:m',strtotime($time->time)) }}";
                        }

                    @endforeach
                    console.log(starting_day);
                    $('#day' + day).prop('checked', true);

                    document.getElementsByClassName("starting_date" + day)[0].value = starting_date;
                    // $('.starting_date' + day).prop('value', starting_date);
                    // $('.ending_date' + day).prop('value', ending_date);
                }
                if(open == 0){
                    $('#day' + day).prop('checked', false);
                }
            @endforeach
        </script>
    @endif
    <script>
        $('#category_id').on('change', function(){
            var category_id = $(this).val();
            if(category_id != null && category_id != ''){
                var url = "{{ url('/select/subcategories') }}" + "/" + category_id;
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    beforeSend  : function(request){
                        request.setRequestHeader("Accept-Language", "en");
                    },
                    success     : function(data){
                        if(data.data.length > 0){
                            emptySelect('#subcategory_id', 'Subcactegory', false);
                            $.each(data.data, function(i, obj){
                                $('#subcategory_id').append('<option value="' + obj.id + '">' + obj.name + '</option');
                            });
                        }else{
                            emptySelect('#subcategory_id', 'Subcategory', 'disabled');
                        }
                    }
                });
            }else{
                emptySelect('#subcategory_id', 'Subcategory', 'disabled');
            }
        });

        function emptySelect(selectId, selectName, disabledValue){
            $(selectId).prop('disabled', disabledValue);
            $(selectId).html('');
            $(selectId).append('<option selected="selected" value="">Please select a ' + selectName + '.....</option>');
        }

        var imagesPreview = function(input, placeToInsertImagePreview){
            if(input.files){
                var filesAmount = input.files.length;
                if(filesAmount > 5){
                    $('#image_validation').show();
                    input.value = "";
                }else{
                    $('#product-images').empty();
                    for(i = 0; i < filesAmount && i < 5; i++){
                        var reader = new FileReader();

                        reader.onload = function(event){
                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('height', '200px').attr('width', '20%').attr('class', 'img img-responsive').attr('style', 'display: inline').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
        };

        $('#images').on('change', function(){
            imagesPreview(this, 'div.product-images')
        });

        $('#starting_date').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
        $('#ending_date').datetimepicker({
            format: 'HH:mm',
            useCurrent: true,
            sideBySide: true
        })
    </script>

@endpush

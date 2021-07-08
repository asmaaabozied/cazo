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
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('title_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('title_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Description En Field -->
<div class="form-group col-sm-6 {{ $errors->has('description_en') ? 'has-error' : '' }}">
    {!! Form::label('description_en', 'English Description') !!}<span class="astrix">*</span>:
    {!! Form::text('description_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('description_en'))
        <span class="help-block">
            <strong>{{ $errors->first('description_en') }}</strong>
        </span>
    @endif
</div>

<!-- Description Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('description_ar') ? 'has-error' : '' }}">
    {!! Form::label('description_ar', 'Arabic Description') !!}<span class="astrix">*</span>:
    {!! Form::text('description_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('description_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('description_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Additional En Field -->
<div class="form-group col-sm-6 {{ $errors->has('additional_en') ? 'has-error' : '' }}">
    {!! Form::label('additional_en', 'English Additional') !!}<span class="astrix">*</span>:
    {!! Form::text('additional_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('additional_en'))
        <span class="help-block">
            <strong>{{ $errors->first('additional_en') }}</strong>
        </span>
    @endif
</div>

<!-- Additional Ar Field -->
<div class="form-group col-sm-6 {{ $errors->has('additional_ar') ? 'has-error' : '' }}">
    {!! Form::label('additional_ar', 'Arabic Additional') !!}<span class="astrix">*</span>:
    {!! Form::text('additional_ar', null, ['class' => 'form-control']) !!}
    @if($errors->has('additional_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('additional_ar') }}</strong>
        </span>
    @endif
</div>

<!-- Forward Type Field -->
<div class="form-group col-sm-6 {{ $errors->has('forward_type') ? 'has-error' : '' }}">
    {!! Form::label('forward_type', 'Forward Type') !!}<span class="astrix">*</span>:
    {!! Form::select('forward_type', ['Category' => 'Category', 'Offer' => 'Offer', 'Specialization' => 'Specialization'], null, ['placeholder' => 'Please Select a Forward Type...', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
    @if($errors->has('forward_type'))
        <span class="help-block">
            <strong>{{ $errors->first('forward_type') }}</strong>
        </span>
    @endif
</div>

<!-- Forward Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('forward_id') ? 'has-error' : '' }}">
    {!! Form::label('forward_id', 'Forward') !!}<span class="astrix">*</span>:
    {!! Form::select('forward_id', [], null, ['placeholder' => 'Please Select a Forward...', 'class' => 'form-control select2', 'style' => 'width:100%', 'disabled' => 'disabled']) !!}
    @if($errors->has('forward_id'))
        <span class="help-block">
            <strong>{{ $errors->first('forward_id') }}</strong>
        </span>
    @endif
</div>

<!-- Discount Percentage Field -->
<div class="form-group col-sm-6 {{ $errors->has('discount_percentage') ? 'has-error' : '' }}">
    {!! Form::label('discount_percentage', 'Discount Percentage') !!}<span class="astrix">*</span>:
    {!! Form::number('discount_percentage', null, ['class' => 'form-control']) !!}
    @if($errors->has('discount_percentage'))
        <span class="help-block">
            <strong>{{ $errors->first('discount_percentage') }}</strong>
        </span>
    @endif
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', 'Image') !!}<span class="astrix">*</span>:<i class="fa fa-info-circle" style="font-size: 18px"><span class="tooltiptext">Image Size should be 1280 * 550</span></i>
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
        @if(isset($slider))
            @if($slider->image != null)
                <img src="{{ url($slider->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif 
    </div>
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sliders.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')

@push('scripts')
    <script type="module">
        function Type(type, slider_type_id){
            if(type == 'Category'){
                var url = "{{ url('/select/categories/all') }}";
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    beforeSend  : function(request){
                        request.setRequestHeader("Accept-Language", "en");
                    },
                    success     : function(data){
                        if(data.data.length > 0){
                            emptySelect('#forward_id', 'Category', false);
                            $.each(data.data, function(i, obj){
                                if(slider_type_id != '' && obj.id == type_id){
                                    $('#forward_id').append('<option selected="selected" value="' + obj.id + '">' + obj.name + '</option');
                                }else{
                                    $('#forward_id').append('<option value="' + obj.id + '">' + obj.name + '</option');
                                }
                                
                            });
                        }else{
                            emptySelect('#forward_id', 'Forward', 'disabled');
                        }
                    }
                });
            }
            if(type == 'Offer'){
                var select = document.getElementById("forward_id"); 
                var options = ['Vip', 'Under100', '24Hours']; 
                emptySelect('#forward_id', 'Offer Type', false);
                $.each(options, function(j, obj){
                    if(slider_type_id != '' && obj == type_id){
                        $('#forward_id').append('<option selected="selected" value="' + obj + '">' + obj + '</option');
                    }else{
                        $('#forward_id').append('<option value="' + obj + '">' + obj + '</option');
                    }
                });
            }
            if(type == 'Specialization'){
                var url = "{{ url('all') }}";
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    beforeSend  : function(request){
                        request.setRequestHeader("Accept-Language", "en");
                    },
                    success     : function(data){
                        // console.log(data.data);
                        if(data.data.length > 0){
                            emptySelect('#forward_id', 'Specialization', false);
                            $.each(data.data, function(i, obj){
                                if(slider_type_id != '' && obj.id == type_id){
                                    $('#forward_id').append('<option selected="selected" value="' + obj.id + '">' + obj.name_en + '</option');
                                }else{
                                    $('#forward_id').append('<option value="' + obj.id + '">' + obj.name_en + '</option');
                                }
                            });
                        }else{
                            emptySelect('#forward_id', 'Forward', 'disabled');
                        }
                    }
                });
                // if(type != null && type != ''){
                    
                // }else{
                //     emptySelect('#forward_id', 'Forward', 'disabled');
                // }
            }
        }
        @if(isset($slider))
            var type      = "{{ $slider->forward_type }}";
            var type_id   = "{{ $slider->forward_id }}";
            // console.log(type_id);
            if(type != null && type_id != null && type != '' && type_id != ''){
                Type(type, type_id);
            }else{
                emptySelect('#forward_id', 'Forward', 'disabled');
            }
        @endif 
        
        $('#forward_type').on('change', function(){
            var type = $(this).val();
            Type(type, '');
        });

        function emptySelect(selectId, selectName, disabledValue){
            $(selectId).prop('disabled', disabledValue);
            $(selectId).html('');
            $(selectId).append('<option selected="selected" value="">Please select a ' + selectName + '.....</option>');
        }
    </script>
@endpush

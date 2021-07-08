<!-- Title Field -->
<div class="form-group col-sm-6 {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title', 'Title') !!}<span class="astrix">*</span>:
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-6 {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('message', 'Message') !!}<span class="astrix">*</span>:
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    @if($errors->has('message'))
        <span class="help-block">
            <strong>{{ $errors->first('message') }}</strong>
        </span>
    @endif
</div>

<!-- Navigation Type Field -->
<div class="form-group col-sm-6 {{ $errors->has('navigation_type') ? 'has-error' : '' }}">
    {!! Form::label('navigation_type', 'Navigation Type') !!}<span class="astrix">*</span>:
    {!! Form::select('navigation_type', ['Category' => 'Category', 'Offer' => 'Offer', 'Specialization' => 'Specialization', 'None' => 'None'], null, ['placeholder' => 'Please Select Navigation Type', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
    @if($errors->has('navigation_type'))
        <span class="help-block">
            <strong>{{ $errors->first('navigation_type') }}</strong>
        </span>
    @endif
</div>

<!-- Navigation Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('navigation_id') ? 'has-error' : '' }}">
    {!! Form::label('navigation_id', 'Navigation For') !!}<span class="astrix">*</span>:
    {!! Form::select('navigation_id', [], null, ['placeholder' => 'Please select what to Navigate', 'disabled' => 'disabled', 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
    @if($errors->has('navigation_id'))
        <span class="help-block">
            <strong>{{ $errors->first('navigation_id') }}</strong>
        </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('notifications.index') }}" class="btn btn-default">Cancel</a>
</div>


@push('scripts')
    <script type="module">
        function Type(type, notification_type_id){
            if(type == 'Category'){
                var url = "{{ url('api/categories/all') }}";
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    beforeSend  : function(request){
                        request.setRequestHeader("Accept-Language", "en");
                    },
                    success     : function(data){
                        if(data.data.length > 0){
                            emptySelect('#navigation_id', 'Category', false);
                            $.each(data.data, function(i, obj){
                                if(notification_type_id != '' && obj.id == type_id){
                                    $('#navigation_id').append('<option selected="selected" value="' + obj.id + '">' + obj.name + '</option');
                                }else{
                                    $('#navigation_id').append('<option value="' + obj.id + '">' + obj.name + '</option');
                                }
                                
                            });
                        }else{
                            emptySelect('#navigation_id', 'navigation', 'disabled');
                        }
                    }
                });
            }
            if(type == 'Offer'){
                var select = document.getElementById("navigation_id"); 
                var options = ['Vip', 'Under100', '24Hours']; 
                emptySelect('#navigation_id', 'Offer Type', false);
                $.each(options, function(j, obj){
                    if(notification_type_id != '' && obj == type_id){
                        $('#navigation_id').append('<option selected="selected" value="' + obj + '">' + obj + '</option');
                    }else{
                        $('#navigation_id').append('<option value="' + obj + '">' + obj + '</option');
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
                            emptySelect('#navigation_id', 'Specialization', false);
                            $.each(data.data, function(i, obj){
                                if(notification_type_id != '' && obj.id == type_id){
                                    $('#navigation_id').append('<option selected="selected" value="' + obj.id + '">' + obj.name_en + '</option');
                                }else{
                                    $('#navigation_id').append('<option value="' + obj.id + '">' + obj.name_en + '</option');
                                }
                            });
                        }else{
                            emptySelect('#navigation_id', 'navigate', 'disabled');
                        }
                    }
                });
                // if(type != null && type != ''){
                    
                // }else{
                //     emptySelect('#navigation_id', 'navigation', 'disabled');
                // }
            }
            if(type == 'None'){
                emptySelect('#navigation_id', 'navigation', 'disabled');
            }
        }
        @if(isset($notification))
            var type      = "{{ $notification->navigation_type }}";
            var type_id   = "{{ $notification->navigation_id }}";
            // console.log(type_id);
            if(type != null && type_id != null && type != '' && type_id != ''){
                Type(type, type_id);
            }else{
                emptySelect('#navigation_id', 'navigate', 'disabled');
            }
        @endif 
        
        $('#navigation_type').on('change', function(){
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
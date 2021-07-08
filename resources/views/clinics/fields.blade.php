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

<!-- Description En Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_en') ? 'has-error' : '' }}">
    {!! Form::label('description_en', 'English Description') !!}<span class="astrix">*</span>:
    {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}
    @if($errors->has('description_en'))
        <span class="help-block">
            <strong>{{ $errors->first('description_en') }}</strong>
        </span>
    @endif
</div>

<!-- Description Ar Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('description_ar') ? 'has-error' : '' }}">
    {!! Form::label('description_ar', 'Arabic Description') !!}<span cllass="astrix">*</span>:
    {!! Form::textarea('description_ar', null, ['class' => 'form-control', 'dir' => 'rtl']) !!}
    @if($errors->has('description_ar'))
        <span class="help-block">
            <strong>{{ $errors->first('description_ar') }}</strong>
        </span>
    @endif
</div>

{{-- <!-- Category Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id', 'Category') !!}<span class="astrix">*</span>:
    {!! Form::select('category_id', $categoryItems, null, ['placeholder' => 'Please select a Main Category.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%']) !!}
    @if($errors->has('category_id'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

<!-- Subcategory Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('subcategory_id') ? 'has-error' : '' }}">
    {!! Form::label('subcategory_id', 'Subcategory') !!}<span class="astrix">*</span>:
    {!! Form::select('subcategory_id', [], null, ['placeholder' => 'Please select a Subcategory.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%', 'disabled']) !!}
    @if($errors->has('subcategory_id'))
        <span class="help-block">
            <strong>{{ $errors->first('subcategory_id') }}</strong>
        </span>
    @endif
</div> --}}

<!-- Region Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('region_id') ? 'has-error' : '' }}">
    {!! Form::label('region_id', 'Region') !!}<span class="astrix">*</span>:
    {!! Form::select('region_id', $regionItems, null, ['placeholder' => 'Please select a Region.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%']) !!}
    @if($errors->has('region_id'))
        <span class="help-block">
            <strong>{{ $errors->first('region_id') }}</strong>
        </span>
    @endif
</div>

<!-- Suburbs Id Field -->
<div class="form-group col-sm-6 {{ $errors->has('suburbs_id') ? 'has-error' : '' }}">
    {!! Form::label('suburbs_id', 'Suburbs') !!}<span class="astrix">*</span>:
    {!! Form::select('suburbs_id', [], null, ['placeholder' => 'Please select a Suburb.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%', 'disabled']) !!}
    @if($errors->has('suburbs_id'))
        <span class="help-block">
            <strong>{{ $errors->first('suburbs_id') }}</strong>
        </span>
    @endif
</div>

<!-- Admin id Field -->
<div class="form-group col-sm-6 {{ $errors->has('admin_id') ? 'has-error' : '' }}">
    {!! Form::label('admin_id', 'Clinic Manger') !!}<span class="astrix">*</span>:
    {!! Form::select('admin_id', $adminItems, null, ['placeholder' => 'Please select an Admin.....', 'class' => 'form-control select2 select2-hidden-accessible', 'style' => 'width:100%']) !!}
    @if($errors->has('admin_id'))
        <span class="help-block">
            <strong>{{ $errors->first('admin_id') }}</strong>
        </span>
    @endif
</div>

<!-- Address Field -->
<div class="form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : '' }}">
    {!! Form::label('address', 'Address') !!}<span class="astrix">*</span>:
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
    @if($errors->has('address'))
        <span class="help-block">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>

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

<!-- lantiate Number Field -->
<div class="form-group col-sm-6 {{ $errors->has('latitude') ? 'has-error' : '' }}">
    {!! Form::label('latitude', 'latitude') !!}<span class="astrix">*</span>:
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
    @if($errors->has('latitude'))
        <span class="help-block">
            <strong>{{ $errors->first('latitude') }}</strong>
        </span>
    @endif
</div>


<div class="form-group col-sm-6 {{ $errors->has('longitude') ? 'has-error' : '' }}">
    {!! Form::label('longitude', 'longitude') !!}<span class="astrix">*</span>:
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
    @if($errors->has('longitude'))
        <span class="help-block">
            <strong>{{ $errors->first('longitude') }}</strong>
        </span>
    @endif
</div>


<!-- Image Field -->
<div class="form-group col-sm-6 row">

    <div class="form-group col-sm-6 {{ $errors->has('image') ? 'has-error' : '' }}">
        {!! Form::label('image', 'Image') !!}<span class="astrix">*</span>:
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
        @if(isset($clinic))
            @if($clinic->image != null)
                <img src="{{ url($clinic->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @else
                <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
            @endif
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </div>

</div>

<!-- Accept Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accept_code', 'Accept Coupons:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('accept_code', 0) !!}
        {!! Form::checkbox('accept_code', '1', null) !!}
    </label>
</div>

<!-- Map Field -->
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::label('google_map', 'Location on Map (Move The pin to your clinic location) ') !!}<span class="astrix">*</span>:--}}
{{--    <span style="display: none; color: red;" id="failed_location">--}}
{{--        <strong>You need to Allow your location and reload the page</strong>--}}
{{--    </span>--}}
{{--    <div id="googleMap" style="width:100%;height:400px;"></div>--}}
{{--    <input type="hidden" id="latitude" name="latitude" value="">--}}
{{--    <input type="hidden" id="longitude" name="longitude" value="">--}}

{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'save']) !!}
    <a href="{{ route('clinics.index') }}" class="btn btn-default">Cancel</a>
</div>

@include('layouts.scripts')

@push('scripts')
    @if(isset($clinic))
        <script type="module">
            var clinic_region_id         = "{{ $clinic->region_id }}";
            var clinic_suburbs_id        = "{{ $clinic->suburbs_id }}";

            if(clinic_region_id != null && clinic_region_id != '' && clinic_suburbs_id != null && clinic_suburbs_id != ''){
                var url = "{{ url('/suburbs/select') }}" + '/' + clinic_region_id;
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    success     : function(data){
                        if(data.data.length > 0){
                            emptySelect('#suburbs_id', 'Suburbs', false);
                            $.each(data.data, function(i, obj){
                                if(obj.id == clinic_suburbs_id){
                                    $('#suburbs_id').append("<option selected='selected' value='" + obj.id + "'>" + obj.name + "</option>");
                                }else{
                                    $('#suburbs_id').append("<option value='" + obj.id + "'>" + obj.name + "</option>");
                                }
                            });
                        }else{
                            emptySelect('#suburbs_id', 'Suburb', 'disabled');
                        }
                    }
                });
            }
        </script>
    @endif
    <script>
        $('#region_id').on('change', function(){
            var region_id = $(this).val();
            if(region_id != null && region_id != ''){
                var url = "{{ url('/suburbs/select') }}" + '/' + region_id;
                $.ajax({
                    url         : url,
                    method      : 'GET',
                    dataType    : 'JSON',
                    success     : function(data){

                        if(data.data.length > 0){
                            emptySelect('#suburbs_id', 'Suburbs', false);
                            $.each(data.data, function(i, obj){
                                $('#suburbs_id').append("<option value='"+ obj.id +"'>" + obj.name + "</option>");
                            });
                        }else{
                            emptySelect('#suburbs_id', 'Suburb', 'disabled');
                        }
                    }
                });
            }else{
                emptySelect('#suburbs_id', 'Suburb', 'disabled');
            }

        });

        function emptySelect(selectId, selectName, disabledValue){
            $(selectId).prop('disabled', disabledValue);
            $(selectId).html('');
            $(selectId).append("<option selected='selected' value=''>Please select a " + selectName +".....</option>");
        }
    </script>


    <script>

        var map, infoWindow;
        function initMap() {
            var latlng = {};
            map = new google.maps.Map(document.getElementById('googleMap'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });


            infoWindow = new google.maps.InfoWindow;

            map.addListener("click",(mapsMouseEvent) => {

                infoWindow.close();

                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng
                });

                // $("#longitude").val(mapsMouseEvent.latLng.toJSON().lng);
                // $("#latitude").val(mapsMouseEvent.latLng.toJSON().lat);

                infoWindow.open(map);
            });

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // var pos = {
                    //     lat: position.coords.latitude,
                    //     lng: position.coords.longitude
                    // };
                    // var latlng = pos;
                    @if(!isset($clinic))
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    @else
                    var pos = {
                        lat: {{ $clinic->latitude }},
                        lng: {{ $clinic->longitude }}
                    };
                    @endif

                    document.getElementById("latitude").value = pos.lat;
                    document.getElementById("longitude").value = pos.lng;
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });
                    google.maps.event.addListener(marker, 'dragend', function(a) {
                        console.log(a.latLng);
                        document.getElementById("latitude").value = this.getPosition().lat();
                        document.getElementById("longitude").value = this.getPosition().lng();
                    });
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }

        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
            $('#failed_location').show();
            $('#save').attr("disabled", true);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoKyqsEZIO0C0xiVHdSelbdUdz5zTgdKQ&callback=initMap"></script>
@endpush

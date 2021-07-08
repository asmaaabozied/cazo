<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', 'English Title:') !!}
    <p>{{ $slider->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', 'Arabic Title:') !!}
    <p>{{ $slider->title_ar }}</p>
</div>

<!-- Description En Field -->
<div class="form-group">
    {!! Form::label('description_en', 'English Description:') !!}
    <p>{{ $slider->description_en }}</p>
</div>

<!-- Description Ar Field -->
<div class="form-group">
    {!! Form::label('description_ar', 'Arabic Description:') !!}
    <p>{{ $slider->description_ar }}</p>
</div>

<!-- Additional En Field -->
<div class="form-group">
    {!! Form::label('additional_en', 'English Additional:') !!}
    <p>{{ $slider->additional_en }}</p>
</div>

<!-- Additional Ar Field -->
<div class="form-group">
    {!! Form::label('additional_ar', 'Arabic Additional:') !!}
    <p>{{ $slider->additional_ar }}</p>
</div>

<!-- Forward Type Field -->
<div class="form-group">
    {!! Form::label('forward_type', 'Forward Type:') !!}
    <p>{{ $slider->forward_type }}</p>
</div>

<!-- Forward Id Field -->
<div class="form-group">
    {!! Form::label('forward_id', 'Forward Id:') !!}
    <p>{{ $slider->forward_id }}</p>
</div>

<!-- Discount Percentage Field -->
<div class="form-group">
    {!! Form::label('discount_percentage', 'Discount Percentage:') !!}
    <p>{{ $slider->discount_percentage }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>
        <img src="{{ $slider->image != null ? url($slider->image) : url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview">
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $slider->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $slider->updated_at }}</p>
</div>


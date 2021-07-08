<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'English Name:') !!}
    <p>{{ $brand->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Arabic Name:') !!}
    <p>{{ $brand->name_ar }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>
        <img src="{{ $brand->image != null ? url($brand->image) : url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview">
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $brand->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $brand->updated_at }}</p>
</div>


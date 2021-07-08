<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'English Name:') !!}
    <p>{{ $clinic->name_en }}</p>
</div>

<!-- Admin id Field -->
<div class="form-group">
    {!! Form::label('admin_id', 'Admin:') !!}
    <p>{{ optional($clinic->admin)->name }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Arabic Name:') !!}
    <p>{{ $clinic->name_ar }}</p>
</div>

<!-- Description En Field -->
<div class="form-group">
    {!! Form::label('description_en', 'English Description:') !!}
    <p>{{ $clinic->description_en }}</p>
</div>

<!-- Description Ar Field -->
<div class="form-group">
    {!! Form::label('description_ar', 'Arabic Description:') !!}
    <p>{{ $clinic->description_ar }}</p>
</div>

{{-- <!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    <p>{{ optional($clinic->category)->name_en }}</p>
</div>

<!-- Subcategory Id Field -->
<div class="form-group">
    {!! Form::label('subcategory_id', 'Subcategory:') !!}
    <p>{{ optional($clinic->subcategory)->name_en }}</p>
</div> --}}

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region:') !!}
    <p>{{ optional($clinic->region)->name_en }}</p>
</div>

<!-- Suburbs Id Field -->
<div class="form-group">
    {!! Form::label('suburbs_id', 'Suburb:') !!}
    <p>{{ optional($clinic->suburb)->name_en }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $clinic->address }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>
        @if($clinic->image != null)
            <img src="{{ url($clinic->image) }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @else
            <img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_preview" />
        @endif
    </p>
</div>

<!-- Contact Email Field -->
<div class="form-group">
    {!! Form::label('contact_email', 'Contact Email:') !!}
    <p>{{ $clinic->contact_email }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $clinic->phone_number }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $clinic->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $clinic->updated_at }}</p>
</div>


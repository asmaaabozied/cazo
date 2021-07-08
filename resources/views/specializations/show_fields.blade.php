<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'English Name:') !!}
    <p>{{ $specialization->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Arabic Name:') !!}
    <p>{{ $specialization->name_ar }}</p>
</div>

<!-- English Doctor Name Field -->
<div class="form-group">
    {!! Form::label('doc_name_en', 'English Doctor Name:') !!}
    <p>{{ $specialization->doc_name_en }}</p>
</div>

<!-- Arabic Doctor Name Field -->
<div class="form-group">
    {!! Form::label('doc_name_ar', 'Arabic Doctor Name:') !!}
    <p>{{ $specialization->doc_name_ar }}</p>
</div>

<!-- English Doctor Title Field -->
<div class="form-group">
    {!! Form::label('doc_title_en', 'English Doctor Title:') !!}
    <p>{{ $specialization->doc_title_en }}</p>
</div>

<!-- Arabic Doctor Title Field -->
<div class="form-group">
    {!! Form::label('doc_title_ar', 'Arabic Doctor Title:') !!}
    <p>{{ $specialization->doc_title_ar }}</p>
</div>

<!-- Doctor Gender Field -->
<div class="form-group">
    {!! Form::label('doc_gender', 'Doctor Gender:') !!}
    <p>{{ $specialization->doc_gender }}</p>
</div>

<!-- English Description Field -->
<div class="form-group">
    {!! Form::label('description_en', 'English Description:') !!}
    <p>{{ $specialization->description_en }}</p>
</div>

<!-- Arabic Description Field -->
<div class="form-group">
    {!! Form::label('description_ar', 'Arabic Description:') !!}
    <p>{{ $specialization->description_ar }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Main Category:') !!}
    <p>{{ optional($specialization->category)->name_en }}</p>
</div>

<!-- Subcategory Field -->
<div class="form-group">
    {!! Form::label('subcategory', 'Subcategory:') !!}
    <p>{{ optional($specialization->subcategory)->name_en }}</p>
</div>

<!-- Fee Field -->
<div class="form-group">
    {!! Form::label('fee', 'Fee:') !!}
    <p>{{ $specialization->fee }}</p>
</div>

<!-- Clinic Field -->
<div class="form-group">
    {!! Form::label('clinic', 'Clinic:') !!}
    <p>{{ optional($specialization->clinic)->name_en }}</p>
</div>

<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
    <div class="form-group col-sm-12 text-center product-images" style="margin-left: -10px">
        @if(count($specialization->images))
            @foreach ($specialization->images as $image)
                <img src="{{ url($image->image) }}" height="300px" width="19%" class="img img-responsive" style="display: inline;" id="image_preview">       
            @endforeach
        @else
            <img src="{{ url('images/temp.png') }}" height="300px" width="20%" class="img img-responsive" style="display: inline;" id="image_preview">
        @endif
    </div>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Status:') !!}
    <p>@include('badge', ['active' => $specialization->active])</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $specialization->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $specialization->updated_at }}</p>
</div>


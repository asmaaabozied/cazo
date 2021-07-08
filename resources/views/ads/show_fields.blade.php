<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', 'English Title:') !!}
    <p>{{ $ads->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', 'Arabic Title:') !!}
    <p>{{ $ads->title_ar }}</p>
</div>

<!-- Image En Field -->
<div class="form-group">
    {!! Form::label('image_en', 'English Image:') !!}
    @if($ads->image_en != null)
        <p><img src="{{ url($ads->image_en) }}" height="200px" width="250px" class="img img-responsive" id="image_en_preview" /></p>
    @else
        <p><img src="{{ url('images/temp.png') }}" height="200px" width="250px" class="img img-responsive" id="image_en_preview" /></p>
    @endif
</div>

<!-- Image Ar Field -->
<div class="form-group">
    {!! Form::label('image_ar', 'Arabic Image:') !!}
    @if($ads->image_ar != null)
        <p><img src="{{ url($ads->image_ar) }}" height="200px" width="250px" class="img img-responsive" id="image_ar_preview" /></p>
    @else
        <p><img src="{{ url($ads->image_ar) }}" height="200px" width="250px" class="img img-responsive" id="image_ar_preview" /></p>
</div>

<!-- Starting Date Field -->
<div class="form-group">
    {!! Form::label('starting_date', 'Starting Date:') !!}
    <p>{{ $ads->starting_date }}</p>
</div>

<!-- Ending Date Field -->
<div class="form-group">
    {!! Form::label('ending_date', 'Ending Date:') !!}
    <p>{{ $ads->ending_date }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>@include('badge', ['active' => $ads->active])</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ads->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ads->updated_at }}</p>
</div>


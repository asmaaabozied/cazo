<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'Name En:') !!}
    <p>{{ $complainTypes->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Name Ar:') !!}
    <p>{{ $complainTypes->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>@include('badge', ['active' => $complainTypes->active])</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $complainTypes->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $complainTypes->updated_at }}</p>
</div>


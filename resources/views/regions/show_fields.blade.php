<!-- Name En Field -->
<div class="form-group">
    {!! Form::label('name_en', 'Name English:') !!}
    <p>{{ $region->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="form-group">
    {!! Form::label('name_ar', 'Name Arabic:') !!}
    <p>{{ $region->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Status:') !!}
    <p>@include('badge', ['active' => $region->active])</p>
</div>

<!-- Suburbs Field -->
<div class="form-group">
    {!! Form::label('suburbs', 'Subrubs:') !!}
    @foreach($region->suburbs as $suburb)
        <p>{{ $suburb->name_en }}</p>
    @endforeach
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $region->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $region->updated_at }}</p>
</div>


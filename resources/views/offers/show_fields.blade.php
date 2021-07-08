<!-- Specialization Id Field -->
<div class="form-group">
    {!! Form::label('specialization_id', 'Specialization:') !!}
    <p>{{ optional($offer->specialization)->name_en }}</p>
</div>

<!-- Specialization Clinic -->
<div class="form-group">
    {!! Form::label('specialization_clinic', 'Specialization Clinic') !!}
    <p>{{ optional($offer->specialization->clinic)->name_en }}</p>
</div>

<!-- Offer Type Field -->
<div class="form-group">
    {!! Form::label('offer_type', 'Offer Type:') !!}
    <p>{{ $offer->offer_type }}</p>
</div>

<!-- Offer Value Field -->
<div class="form-group">
    {!! Form::label('offer_value', 'Offer Value:') !!}
    <p>@include('offer_type', ['offer_type' => $offer->offer_type])</p>
</div>

<!-- Starting Date Field -->
<div class="form-group">
    {!! Form::label('starting_date', 'Starting Date:') !!}
    <p>{{ $offer->starting_date }}</p>
</div>

<!-- Ending Date Field -->
<div class="form-group">
    {!! Form::label('ending_date', 'Ending Date:') !!}
    <p>{{ $offer->ending_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $offer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $offer->updated_at }}</p>
</div>


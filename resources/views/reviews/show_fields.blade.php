<!-- Specialization Id Field -->
<div class="form-group">
    {!! Form::label('specialization', 'Specialization:') !!}
    <p>{{ optional($review->specialization)->name_en }}</p>
</div>

<!-- Clinic Field -->
<div class="form-group">
    {!! Form::label('clinic', 'Clinic:') !!}
    <p>{{ optional($review->specialization->clinic)->name_en }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ optional($review->user)->name }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $review->comment }}</p>
</div>

<!-- Rate Field -->
<div class="form-group">
    {!! Form::label('rate', 'Rate:') !!}
    <p>{{ $review->rate }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $review->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $review->updated_at }}</p>
</div>


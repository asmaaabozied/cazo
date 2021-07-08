<!-- Question En Field -->
<div class="form-group">
    {!! Form::label('question_en', 'English Question:') !!}
    <p>{{ $fAQ->question_en }}</p>
</div>

<!-- Question Ar Field -->
<div class="form-group">
    {!! Form::label('question_ar', 'Arabic Question:') !!}
    <p>{{ $fAQ->question_ar }}</p>
</div>

<!-- Answer En Field -->
<div class="form-group">
    {!! Form::label('answer_en', 'English Answer:') !!}
    <p>{{ $fAQ->answer_en }}</p>
</div>

<!-- Asnwer Ar Field -->
<div class="form-group">
    {!! Form::label('answer_ar', 'English Asnwer:') !!}
    <p>{{ $fAQ->answer_ar }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fAQ->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fAQ->updated_at }}</p>
</div>


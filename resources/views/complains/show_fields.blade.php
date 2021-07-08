<!-- Type Id Field -->
<div class="form-group">
    {!! Form::label('type_id', 'Complain Type:') !!}
    <p>{{ optional($complains->type)->name_en }}</p>
</div>

<!-- Client Username Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Username') !!}
    <p>{{ optional($complains->client)->name }}</p>
</div>

<!-- Client Phone number Field -->
<div class="form-group">
    {!! Form::label('client_phone', 'Client Phone Number') !!}
    <p>{{ optional($complains->client)->phone_number }}</p>
</div>

<!-- Client Email Field -->
<div class="form-group">
    {!! Form::label('client_email', 'Client Email') !!}
    <p>{{ optional($complains->client)->email }}</p>
</div> 

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $complains->message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $complains->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $complains->updated_at }}</p>
</div>


<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $notification->title }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $notification->message }}</p>
</div>

<!-- Navigation Type Field -->
<div class="form-group">
    {!! Form::label('navigation_type', 'Navigation Type:') !!}
    <p>{{ $notification->navigation_type }}</p>
</div>

<!-- Navigation Id Field -->
<div class="form-group">
    {!! Form::label('navigation_id', 'Navigation Id:') !!}
    <p>{{ $notification->navigation_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $notification->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $notification->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $notification->updated_at }}</p>
</div>


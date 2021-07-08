<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $roles->name }}</p>
</div>

<!-- Permissions Field -->
<div class="form-group">
    {!! Form::label('permissions', 'Permissions:') !!}
    @foreach($roles->permissions as $permission)
        <p><span class="label bg-blue" style="font-size: 16px">{{ $permission->name }}</span></p>
    @endforeach
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $roles->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $roles->updated_at }}</p>
</div>


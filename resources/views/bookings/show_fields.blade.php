<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $booking->user_id }}</p>
</div>

<!-- Specialization Id Field -->
<div class="form-group">
    {!! Form::label('specialization_id', 'Specialization Id:') !!}
    <p>{{ $booking->specialization_id }}</p>
</div>

<!-- Fee Field -->
<div class="form-group">
    {!! Form::label('fee', 'Fee:') !!}
    <p>{{ $booking->fee }}</p>
</div>

<!-- Offer Field -->
<div class="form-group">
    {!! Form::label('offer', 'Offer:') !!}
    <p>{{ $booking->offer }}</p>
</div>

<!-- Day Field -->
<div class="form-group">
    {!! Form::label('day', 'Day:') !!}
    <p>{{ $booking->day }}</p>
</div>

<!-- Hour Field -->
<div class="form-group">
    {!! Form::label('hour', 'Hour:') !!}
    <p>{{ $booking->hour }}</p>
</div>

<!-- Coupon Field -->
<div class="form-group">
    {!! Form::label('coupon', 'Coupon:') !!}
    <p>{{ $booking->coupon }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>@include('booking_status', ['active' => $booking->status]){{ $booking->status }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $booking->code }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $booking->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $booking->updated_at }}</p>
</div>


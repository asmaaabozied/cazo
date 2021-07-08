{!! Form::open(['route' => ['reviews.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('reviews.show', $id) }}" class='btn btn-default btn-xs'>
        <span class="tooltiptext">Show</span><i class="glyphicon glyphicon-edit"></i>
    </a>
    <a href="{{ route('hide_review', $id) }}" class='btn btn-default btn-xs '>
        <span class="tooltiptext">{{ $hidden != 1 ? 'Hide' : 'View'}}</span><i class="glyphicon {{ $hidden != 1 ? 'glyphicon-eye-open' : 'glyphicon-eye-close'}}"></i>
    </a>
    {!! Form::button('<span class="tooltiptext">Delete</span><i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}

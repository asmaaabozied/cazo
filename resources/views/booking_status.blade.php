@if($status == 1)
    <span class="label bg-blue">New</span>
@elseif($status == 2)
    <span class="label bg-green">Finished</span>
@else
    <span class="label bg-red">Canceled</span>
@endif
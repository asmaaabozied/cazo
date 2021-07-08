@if(isset($active))
    <span class="label {{ $active == 1 ? 'bg-green' : 'bg-red' }}">{{ $active == 1 ? 'Published' : 'Blocked' }}</span>
@endif

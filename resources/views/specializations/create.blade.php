@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Specialization
        </h1>
    </section>
    <div class="content">
        {{-- @include('adminlte-templates::common.errors') --}}
        
        {!! Form::open(['route' => 'specializations.store', 'files' => true]) !!}

            @include('specializations.fields')

        {!! Form::close() !!}
                
    </div>
@endsection

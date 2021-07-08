@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Suburb
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suburb, ['route' => ['suburbs.update', $suburb->id], 'method' => 'patch']) !!}

                        @include('suburbs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
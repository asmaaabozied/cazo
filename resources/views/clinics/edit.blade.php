@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Clinic
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clinic, ['route' => ['clinics.update', $clinic->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('clinics.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
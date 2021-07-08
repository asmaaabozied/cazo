@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Complains
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($complains, ['route' => ['complains.update', $complains->id], 'method' => 'patch']) !!}

                        @include('complains.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
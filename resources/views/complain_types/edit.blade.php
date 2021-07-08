@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Complain Types
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($complainTypes, ['route' => ['complainTypes.update', $complainTypes->id], 'method' => 'patch']) !!}

                        @include('complain_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
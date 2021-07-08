@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
Type_offer
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($offer, ['route' => ['type_offersss', $offer->id], 'method' => 'post']) !!}


                   <div class="form-group col-sm-6 {{ $errors->has('offer_type') ? 'has-error' : '' }}">
                       {!! Form::label('offer_type', 'Offer Type') !!}<span class="astrix">*</span>:
                       {!! Form::text('type', null, [ 'class' => 'form-control select2', 'style' => 'width:100%']) !!}
                       @if($errors->has('offer_type'))
                           <span class="help-block">
            <strong>{{ $errors->first('offer_type') }}</strong>
        </span>
                       @endif
                   </div>

                   <!-- Submit Field -->
                   <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{{ route('type_offers') }}" class="btn btn-default">Cancel</a>
                   </div>




                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

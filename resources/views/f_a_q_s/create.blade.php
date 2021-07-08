@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            FAQ
        </h1>
    </section>
    <div class="content">
        {{-- @include('adminlte-templates::common.errors') --}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'fAQS.store']) !!}

                        @include('f_a_q_s.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

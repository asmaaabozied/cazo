@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Type_Offers</h1>
        <h1 class="pull-right">

        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">


                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>type</th>


                        <th>Updated_at</th>


                        <th>actions</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($offers as $offer)

                        <tr>
                            <td>{{ $offer ->id }}</td>
                            <td>{{$offer->type ??''}}</td>


                            <td>{{isset($offer->updated_at) ? $offer->updated_at->diffForHumans() :'' }}</td>
                            <td>

                                <a href="{{ route('type_offerss', $offer->id) }}"
                                   class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i> edit</a>

                            </td>

                        </tr>




                    @endforeach


                    </tbody>
                </table>


            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $bookings }}</h3>
    
                    <p>Total Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
                <a href="{!! route('bookings.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $specializations }}</h3>
        
                    <p>Specializations</p>
                </div>
                <div class="icon">
                    {{-- <ion-icon name="heart-outline"></ion-icon> --}}
                    <i class="ion ion-medkit"></i>
                </div>
                <a href="{!! route('specializations.index') !!}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{{ $reviews }}</h3>
        
                    <p>Reviews</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-hand"></i>
                </div>
                <a href="{!! route('reviews.index') !!}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @if(Auth::user()->role_id == 1)
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $clinics }}</h3>
            
                        <p>Clinics</p>
                    </div>
                    <div class="icon">
                        {{-- <ion-icon name="heart-outline"></ion-icon> --}}
                        <i class="ion ion-heart-broken"></i>
                    </div>
                    <a href="{!! route('clinics.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $clients }}</h3>
            
                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{!! route('clients.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>{{ $complains }}</h3>
            
                        <p>Complains</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="{!! route('complains.index') !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="content-header">
                <h1 class="pull-left">Today Bookings</h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>

                <div class="box box-d4d">
                    <div class="box-body">
                        <table class="table table-striped table-bordered dataTable no-footer" id="table" role="grid" aria-describedby="dataTableBuuilder_info" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>Created At</td>
                                    <td>Client Name</td>
                                    <td>Phone Number</td>
                                    <td>Specialization</td>
                                    <td>Day</td>
                                    <td>Hour</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
    <script>
        $(function (){
            var oTable = $('#table').DataTable({
                // dom: "<'row'<'col-lg-6'i><'col-lg-6'f><'col-xs-6'r><'col-lg-12't>>" + 
                //         "<'col-lg-12'<'col-xs-6'p>>",
                processing: true,
                serverSide: true,
                pageLength: 10,
                order: [ ],
                ajax: {
                    url: "{{ route('today_bookings') }}",
                },
                columns: [
                    {name: 'created_at', data: 'created_at', orderable: false},
                    {name: 'user.name', data: 'user.name', defaultContent: ' '},
                    {name: 'user.phone_number', data: 'user.phone_number', defaultContent: ' '},
                    {name: 'specialization.name_en', data: 'specialization.name_en', defaultContent: ' '},
                    {name: 'day', data: 'day'},
                    {name: 'hour', data: 'hour'},
                    {name: 'action', data: 'action', orderable: false}
                ],
                language: {
                    "info": "Total _TOTAL_ Bookings",
                }
            });
        });
    </script>
@endpush

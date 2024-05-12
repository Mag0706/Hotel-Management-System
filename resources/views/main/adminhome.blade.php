use Illuminate\Support\Facades\DB;
@extends('layout.adminapp')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Dashboard</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <h4 style="color:green">Total Room </h4>
                                    @php
                                            $Rooms = DB::table('room_types')->count();
                                    @endphp
                                    <h4 style="color:red">{{$Rooms}}</h4>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <h4 style="color:green"> Allocated Room </h4>
                                    @php
                                        $mytime = now()->format('Y-m-d');
                                            $AlloRooms = DB::table('room_books')->where('book_startdate',$mytime)->count();
                                    @endphp
                                    <h4 style="color:red">{{$AlloRooms}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <h4 style="color:green"> Pendding Allocation Room</h4>
                                        @php
                                            $pennding=$Rooms-$AlloRooms;
                                    @endphp
                                    <h4 style="color:red">{{$pennding}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection
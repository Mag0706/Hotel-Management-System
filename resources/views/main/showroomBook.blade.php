use Illuminate\Support\Facades\DB;
@extends('layout.userapp')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Room Book List</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol> -->
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                <div class="card mb-4">
                                    <a style="text-decoration: none; color: white;" class="badge bg-success" href="{{ route('roomBook') }}">Room Book</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Total days</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach($roombooks as $roombook)
                                        <tr>
                                            <td>
                                                @php
                                                    $Rooms = DB::table('room_types')->where('id',$roombook->room_id)->first();;
                                                @endphp
                                                {{$Rooms->room_number}}
                                            </td>
                                            <td>
                                                {{$Rooms->room_type}}
                                            </td>
                                            <td>{{date('d/m/Y', strtotime($roombook->book_startdate))}}</td>
                                            <td>{{date('d/m/Y', strtotime($roombook->book_enddate))}}</td>
                                            <td>{{$roombook->book_days}}</td>
                                            <!-- <td><button style="border-style: none;" class="badge bg-primary" data-toggle="modal" data-target="#EditRoom{{$roombook->id}}">
                                                   Update
                                                </button>
                                                <div class="modal fade" id="EditRoom{{$roombook->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Room Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/editRoom" data-toggle="validator" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Room Number</label>
                                                                            <input type="text" class="form-control" name="room_number" value="{{$roombook->room_number}}" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Room Type</label>
                                                                            <select  name="room_type" class="form-control" required>
                                                                                <option value="single"{{ $roombook->room_type == 'single' ? 'selected' : '' }}>Single</option>
                                                                                <option value="double"{{ $roombook->room_type == 'double' ? 'selected' : '' }}>Double</option>
                                                                                <option value="suite"{{ $roombook->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
                                                                            </select>
                                                                        </div>
                                                                        <br><br>
                                                                        <div class="col-md-6">
                                                                            <label>Capacity</label>
                                                                            <input type="text"  name="capacity" class="form-control" value="{{$roombook->capacity}}" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Price</label>
                                                                            <input type="text"  name="price" class="form-control" value="{{$roombook->price}}" required>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label>Description</label>
                                                                            <textarea name="description" class="form-control">
                                                                                {{$roombook->description}}
                                                                            </textarea>
                                                                            <input type="hidden"  name="id" class="form-control" value="{{$roombook->id}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                        </div>
                                                                
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection
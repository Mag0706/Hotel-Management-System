@extends('layout.adminapp')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Room List</h1>
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
                                    <button style="border-style: none;" class="badge bg-success" data-toggle="modal" data-target="#addroom">
                                            Add Room
                                    </button>
                                        <div class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Room</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/addRoom" method="post" id="" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Room Number</label>
                                                                        <input type="text" class="form-control" name="room_number" placeholder="Room Number" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Room Type</label>
                                                                        <select  name="room_type" class="form-control" required>
                                                                            <option value="single">Single</option>
                                                                            <option value="double">Double</option>
                                                                            <option value="suite">Suite</option>
                                                                        </select>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="col-md-6">
                                                                        <label>Capacity</label>
                                                                        <input type="text"  name="capacity" class="form-control" placeholder="Capacity" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Price</label>
                                                                        <input type="text"  name="price" class="form-control" placeholder="Price" required>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Description</label>
                                                                        <textarea name="description" class="form-control" required> </textarea>
                                                                        <!-- <input type="text"  name="description" class="form-control" placeholder="Price" required> -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
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
                                            <th>Capacity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      @foreach($roomtypes as $roomtype)
                                        <tr>
                                            <td>{{$roomtype->room_number}}</td>
                                            <td>{{$roomtype->room_type}}</td>
                                            <td>{{$roomtype->capacity}}</td>
                                            <td>{{$roomtype->price}}</td>
                                            <td><button style="border-style: none;" class="badge bg-primary" data-toggle="modal" data-target="#EditRoom{{$roomtype->id}}">
                                                   Update
                                                </button>
                                                <!-- <button style="border-style: none;" class="badge bg-danger" data-toggle="modal" data-target="#DeleteRoom{{$roomtype->id}}">Delete</button> -->
                                                <!-- <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a></td> -->
                                                <div class="modal fade" id="EditRoom{{$roomtype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                            <input type="text" class="form-control" name="room_number" value="{{$roomtype->room_number}}" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Room Type</label>
                                                                            <select  name="room_type" class="form-control" required>
                                                                                <option value="single"{{ $roomtype->room_type == 'single' ? 'selected' : '' }}>Single</option>
                                                                                <option value="double"{{ $roomtype->room_type == 'double' ? 'selected' : '' }}>Double</option>
                                                                                <option value="suite"{{ $roomtype->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
                                                                            </select>
                                                                        </div>
                                                                        <br><br>
                                                                        <div class="col-md-6">
                                                                            <label>Capacity</label>
                                                                            <input type="text"  name="capacity" class="form-control" value="{{$roomtype->capacity}}" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Price</label>
                                                                            <input type="text"  name="price" class="form-control" value="{{$roomtype->price}}" required>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label>Description</label>
                                                                            <textarea name="description" class="form-control">
                                                                                {{$roomtype->description}}
                                                                            </textarea>
                                                                            <input type="hidden"  name="id" class="form-control" value="{{$roomtype->id}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                        </div>
                                                                
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection
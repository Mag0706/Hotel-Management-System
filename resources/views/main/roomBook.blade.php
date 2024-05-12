@extends('layout.userapp')

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Room Book</h3>
                        <hr>
                        <div class="card mb-4">
                            
                            <div class="card-body">
                            <form action="/addroomBook" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <label>Room Type</label>
                                        <input type="text" class="form-control" name="room_number" placeholder="Room Number" required>
                                    </div> -->
                                    <div class="col-md-6">
                                        <label>Room Type</label>
                                        <select  name="room_type" class="form-control" required>
                                            @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->room_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br><br>
                                    <div class="col-md-6">
                                        <label>Start Date</label>
                                        <input type="date"  name="book_startdate" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>End Date</label>
                                        <input type="date"  name="book_enddate" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        @if(session('error'))
                                            <div class="alert alert-danger" id="alert">
                                                        
                                                <strong>Error:</strong>{{Session::get('error')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <label>Guest</label>
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <tr>
                                                <th>Name</th>
                                                <th>AadharId</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="guest_name[0]" placeholder="Enter guest name" class="form-control" />
                                                </td>
                                                <td><input type="text" name="guest_aadhar[0]" placeholder="Enter subject" class="form-control" />
                                                </td>
                                                <td><input type="text" name="guest_phone[0]" placeholder="Enter subject" class="form-control" />
                                                </td>
                                                <td><input type="text" name="guest_email[0]" placeholder="Enter subject" class="form-control" />
                                                </td>
                                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add More</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    var i = 0;
                    $("#dynamic-ar").click(function () {
                        ++i;
                        $("#dynamicAddRemove").append('<tr><td><input type="text" name="guest_name[' + i +
                            ']" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="guest_aadhar[' + i +
                            ']" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="guest_phone[' + i +
                            ']" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="guest_email[' + i +
                            ']" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                            );
                    });
                    $(document).on('click', '.remove-input-field', function () {
                        $(this).parents('tr').remove();
                    });
                </script>
@endsection
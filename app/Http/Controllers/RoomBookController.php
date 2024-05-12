<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\RoomBook;
use App\Models\Guest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RoomBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session()->has('loginid')) 
        {
            $data = Role::where('id', Session()->get('loginid'))->first();
            if($data)
            {
                $roombooks=RoomBook::where('user_id',$data->id)->get();
                if($roombooks)
                {
                    return view('main.showroomBook', ['roombooks' => $roombooks]);
                }
                else{
                    return redirect()->route('dashboard');
                }
            }
            else
            {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'required',
            'guest_aadhar' => 'required',
            'guest_phone' => 'required',
            'guest_email' => 'required'
        ]);
        $startdate = Carbon::parse(date('Y-m-d', strtotime($request->book_startdate))); 
        $enddate = Carbon::parse(date('Y-m-d', strtotime($request->book_enddate))); 
            
        // get total number of minutes between from and throung date
        $shift_difference = $startdate->diffInDays($enddate);
        if (Session()->has('loginid')) 
        {
            $data = Role::where('id', Session()->get('loginid'))->first();
            if($data->role_type == 'User')
            {
                $getroombook=RoomBook::where('book_startdate',$request->book_startdate)
                                    ->where('book_enddate',$request->book_enddate)
                                    ->where('room_id',$request->room_type)->first();
                if($getroombook)
                {
                    return back()->with('error',"room allocated for this date");
                }
                else
                {
                    $roombook = new RoomBook();
                    $roombook->room_id = $request->room_type;
                    $roombook->book_days = $shift_difference;
                    $roombook->book_startdate = $request->book_startdate;
                    $roombook->book_enddate = $request->book_enddate;
                    $roombook->user_id = $data->id;
                    $roombook->save();
                    $insertid=$roombook->id;
                    if($roombook)
                    {
                        foreach ($request->guest_name as $guestname) {

                            foreach ($request->guest_aadhar as $guestaadhar) {
                            
                                foreach ($request->guest_phone as $guestphone) {
                            
                                    foreach ($request->guest_email as $guestemail) {
                                        $Guest = new Guest();
                                        $Guest->user_id = $data->id;
                                        $Guest->book_id = $insertid;
                                        $Guest->name = $guestname;
                                        $Guest->aadharcard = $guestaadhar;
                                        $Guest->phone = $guestphone;
                                        $Guest->email = $guestemail;
                                        $Guest->save();
                                        // $data=[
                                        //     'user_id' => $data->id,
                                        //     'book_id' => $insertid,
                                        //     'name' => $guestname,
                                        //     'aadharcard' => $guestaadhar,
                                        //     'phone' => $guestphone,
                                        //     'email' => $guestemail,
                                        // ];
                                    // Guest::create($data);
                                    }
                                }
                            }
                            
                        }
                        return redirect()->route('showRoomBook');
                    }
                }
                
            }
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Session()->has('loginid')) 
        {
            $data = Role::where('id', Session()->get('loginid'))->first();
            if($data)
            {
                $rooms=RoomType::all();
                return view('main.roomBook', compact('rooms','data'));
            }
        }
        else
        {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

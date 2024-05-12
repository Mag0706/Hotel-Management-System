<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoomTypeController extends Controller
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
                $roomtypes=RoomType::all();
                if($roomtypes)
                {
                    return view('main.showrooms', ['roomtypes' => $roomtypes]);
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
        $newroom = new RoomType();
        $newroom->room_number = $request->room_number;
        $newroom->room_type = $request->room_type;
        $newroom->capacity = $request->capacity;
        $newroom->price = $request->price;
        $newroom->description = $request->description;
        $newroom->save();
        $insertid=$newroom->id;
        if($newroom)
        {
            return redirect()->route('showRoom');
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
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
    public function update(Request $request)
    {
         $data = array(
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description
        );
        $update=RoomType::where('id', $request->id)->update($data);
        if ($update) {
            return redirect()->route('showRoom');
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

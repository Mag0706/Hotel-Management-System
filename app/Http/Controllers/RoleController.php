<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array();
        if (Session()->has('loginid')) {
            $data = Role::where('id', Session()->get('loginid'))->first();
            if($data->role_type == 'Admin')
            {
                return view('main.adminhome', compact('data'));
            }
            elseif($data->role_type == 'User')
            {
                return view('main.userhome', compact('data'));
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
        $pass= Hash::make($request->password);
        $newuser = new Role();
        $newuser->name = $request->name;
        $newuser->role_type = 'User';
        $newuser->email = $request->email;
        $newuser->password = $pass;
        $newuser->con_password = $pass;
        $newuser->aadhar_number = $request->aadhar_number;
        $newuser->is_active = '1';
        $newuser->save();
        $insertid=$newuser->id;
        if($newuser)
        {
            $data=Role::where('id',$insertid)->first();
            $request->Session()->put('loginid', $data->id);
                    return redirect()->route('dashboard');
        }
        else{
            return view('main.userregister');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
         return view('main.userregister');
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
    public function login(Request $request)
    {
            $user = Role::where('email', $request->email)->first();
            if($user)
            {
                // return $user; exit;
                $empass = Hash::check($request->password,$user->password);
                if ($empass) {
                    $request->Session()->put('loginid', $user->id);
                    return redirect()->route('dashboard');
                } else {
                    return back()->with('error',"Incorrect password");
                }
            }
            else{
                return back()->with('error',"Incorrect Mail");
            }
    }
    public function logout()
    {
        if(Session()->has('loginid'))
        {
            Session()->pull('loginid');
            return redirect('/');
        }
    }
}

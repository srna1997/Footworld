<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Club;
use App\Player;
use App\Admin;



class AdminController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->name;

        if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            return view('admin.index')->with('user',$user);
        }
        else return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $data = User::all();
            $roles = Admin::all();
            return view('admin.show')->with('data',$data)->with('roles',$roles);
        }
        else return redirect('home');
    }

    public function club()
    {   if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $club = Club::all();  
            return view('admin.club')->with('club',$club);
        } 
        else return redirect('home');
    }
    public function player()
    {
        if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
        $players = Player::all();
        return view('admin.player')->with('players',$players);
        } 
        else return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $user = User::find($id);
            $roles = Admin::all();
            return view('user.edit')->with('user',$user)->with('roles',$roles);
        }
        else return redirect('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $role = Admin::where('role','=',$request->input('role'))->first();
        $user = User::find($id);
        $user->role = $role->role;     
        $user->save();
        
        return redirect('/admin/show')->with('success','Changed role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
       
        $user->delete();

        return redirect('/admin/show')->with('success','User deleted'); 
    }

    
    
}

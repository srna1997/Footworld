<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Club;
use App\Player;
class ClubController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('auth',['except' => ['index', 'show']]); sluzi ako zelimo ipak dopustiti neki view da guest moze vidjeti!
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Club::all();
        return view('clubs.index')->with('club',$club);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
        return view('clubs.create');
        }
        else return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'place' => 'required',
            'image' => 'image|nullable|max:1999',
            'text' => 'required'
        ]);
        
        //Handle File Upload
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';

        }
        //create Club
        $club = new Club;
        $club->name = $request->input('name');
        $club->place = $request->input('place');
        $club->image = $fileNameToStore;
        $club->text = $request->input('text');
        $club->save();

        return redirect('/admin/club')->with('success','New club created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $club = Club::find($id);
       $player = Player::where('id',$id); 
       return view('clubs.show')->with('club',$club)->with('player',$player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $club = Club::find($id);
            return view('clubs.edit')->with('club',$club);
    
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
        $this->validate($request, [
            'name' => 'required',
            'place' => 'required',
            'image' => 'image|nullable|max:1999',
            'text' => 'required'
        ]);
        
        //Handle File Upload
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
        }

        //Update Club
        $club = Club::find($id);
        $club->name = $request->input('name');
        $club->place = $request->input('place');
        if($request->hasFile('image')){
        $club->image = $fileNameToStore;
        }
        $club->text = $request->input('text');
        $club->save();

        return redirect('/admin/club')->with('success','Club is edited'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::find($id);

        if($club->image != 'noimage.jpg')
        {
            Storage::delete('public/image/'.$club->image);
        }

        $club->delete();
        return redirect('/admin/club')->with('success','Club is deleted');
    }
}

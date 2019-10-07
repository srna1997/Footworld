<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Club;

class PlayersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       $player = Player::find($id);
       return view('clubs.player')->with('player',$player);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $club = Club::all();
            $player = Player::all();
            return view('players.create')->with('player',$player)->with('club',$club);
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
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'country' => 'required',
            'position' => 'required',
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
        //create Player
        
        $player = new Player;
        $player->fname = $request->input('fname');
        $player->lname = $request->input('lname');
        $player->age = $request->input('age');
        $player->country = $request->input('country');
        $player->position = $request->input('position');
        $player->image = $fileNameToStore;
        $player->text = $request->input('text');
        $club = Club::find($request->get('club_id'));
        $club->player()->save($player);
        
        return redirect('/admin/player')->with('success','New player created'); 
    }

    public function edit($id)
    {   
        if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Moderator')
        {
            $club = Club::all();
            $player = Player::find($id);
            return view('players.edit')->with('player',$player)->with('club',$club);
    
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
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'country' => 'required',
            'position' => 'required',
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
       
        $player = Player::find($id);
        $player->fname = $request->input('fname');
        $player->lname = $request->input('lname');
        $player->age = $request->input('age');
        $player->country = $request->input('country');
        $player->position = $request->input('position');
        if($request->hasFile('image')){
        $club->image = $fileNameToStore;
        }
        $player->text = $request->input('text');
        $club = Club::find($request->get('club_id'));
        $club->player()->save($player);
        return redirect('/admin/player')->with('success','Player Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
       
        $player->delete();

        return redirect('/admin/player')->with('success','Player deleted'); 
    }
}

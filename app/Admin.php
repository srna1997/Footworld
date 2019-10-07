<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'role';
    
    /*public function user()
    {
        return $this->belongTo(User::class);
    }
    	*/
    public function club()
    {
        return $this->hasMany(Club::class);    
        
    }


    public function player()
    {
        return $this->hasMany(Player::class);    
        
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}

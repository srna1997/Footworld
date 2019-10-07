<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';
    protected $fillable = ['id','fname','lname','age','country','position','image','text','club_id'];
    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

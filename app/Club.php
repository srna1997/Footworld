<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'club';
    protected $fillable = ['id','name','place','image','text'];

    public function player()
    {
        return $this->hasMany(Player::class);    
        
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

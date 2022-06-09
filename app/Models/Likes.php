<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model{

    protected $table = 'like_drink';

    public function user(){
        return $this->belongsTo("App/Models/User");
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model{

    protected $table = 'like_drink';

    public function user(){
        #relazione N-N
        return $this->belongsTo("App/Models/User");
    }
}
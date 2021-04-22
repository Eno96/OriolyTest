<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leagues extends Model
{
    //
    protected $primaryKey = 'league_id'; 

    public $timestamps = false;

    protected $table = 'leagues';


    protected $fillable = [
        'league_id' , 
        'league_name' , 
    ];
}

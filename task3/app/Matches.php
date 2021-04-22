<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    //
    protected $primaryKey = 'match_id'; 

    public $timestamps = false;

    protected $table = 'matches';


    protected $fillable = [
        'match_winner' , 
        'match_country' , 
        'match_year' , 
        'match_runnerup' , 
        'match_league_id'
    ];
}

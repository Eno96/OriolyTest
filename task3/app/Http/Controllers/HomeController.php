<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leagues;
use App\Matches;
Use DB;
use Mail;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addmatch()
    {
        $leagues = Leagues::all();
        return view('newmatch',  ['leagues' => $leagues ]);
    } 


    public function savematch()
    {
        try { 
            $matches = new Matches();
            $matches->match_winner = request('match_winner');
            $matches->match_country = request('match_country');
            $matches->match_year = request('match_year');
            $matches->match_runnerup = request('match_runnerup');
            $matches->match_league_id = request('match_league_id');
            $matches->save();

            return redirect('/'); 
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }    
 
    public function show($year)
    {
        $leagues = Leagues::all();
        $matches = Matches::where('match_year', $year)->get();
        $data = array();

        foreach($matches as $match){
            foreach($leagues as $league){
                if($match-> match_league_id  == $league->league_id) $gameleague = $league->league_name;
            }
            $data[] = [
                'name' => $gameleague,
                'country' => $match->match_country,
                'year' => $match->match_year,
                'winner' => $match->match_winner,
                'runnerup' => $match->match_runnerup,
            ];
        }
        if(!count($data)) $data = ['No Result'];

        return response()->json(['status'=>200,'data'=>$data]);
    }
}
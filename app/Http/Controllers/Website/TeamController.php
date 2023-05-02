<?php

namespace App\Http\Controllers\Website;
use App\Model\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::where('status','=','Y')->orderBy('name','ASC')->paginate(4);
        // return view('Website.teams',['teams'=>$teams]);
        return view('Website.teams',compact('teams'));
    }

    public function teamDetails($teamUrl)
    {
        $team_details=Team::where('team_url','=',$teamUrl)->first();
        return view('Website.teams_view',['team_details'=>$team_details]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

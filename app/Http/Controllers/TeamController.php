<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){
        $team_data=Team::all();
        //return response()->json(['success' => true,'status_code'=>1,'data'=>$team_data]);
        return response()->json($team_data);
    }
    public function add(Request $request){

        $team=new Team;
        $team->team_name=$request->team_name;
        $team->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $team_data=Team::where('id',$request->id)->get();
        return response()->json(['success' => true,'data'=>$team_name]);
    }
    public function update(Request $request){
     Team::where('id', $request->id)
      ->update(['team_name'=>$request->team_name]);
      return response()->json(['success' => true,]);

    }
    public function remove(Request $request){
        $team_data = Team::find($request->id);
        $team_data->delete();
        return response()->json(['success' => true]);

    }
}

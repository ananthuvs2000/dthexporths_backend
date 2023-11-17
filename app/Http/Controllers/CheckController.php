<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemcheck;

class CheckController extends Controller
{
    public function index(){
        $itemcheck_data=Itemcheck::all();
        return response()->json($itemcheck_data);
    }
    public function add(Request $request){

        $itemcheck=new Itemcheck;
        $itemcheck->vendor_code=$request->vendor_code;
        $itemcheck->batch_code=$request->batch_code;
        $itemcheck->venue=$request->venue;
        $itemcheck->quantity_checked=$request->quantity_checked;
        $itemcheck->team_name=$request->team_name;
        $itemcheck->status='pending';
        $itemcheck->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $itemcheck_data=Itemcheck::where('id',$request->id)->get();
        return response()->json(['success' => true,'data'=>$itemcheck_data]);
    }
    public function update(Request $request){
     Itemcheck::where('id', $request->id)
      ->update(['vendor_code'=>$request->vendor_code,'batch_code'=>$request->batch_code,'venue'=>$request->venue,'quantity_checked'=>$request->quantity_checked,'team_name'=>$request->team_name,'status'=>$request->status]);
      return response()->json(['success' => true,]);

    }
    public function remove(Request $request){
        $itemcheck_data = Itemcheck::find($request->id);
        $itemcheck_data->delete();
        return response()->json(['success' => true]);

    }
     public function filter_check_staus(Request $request){
        $filter_data=$request->filter_data?$request->filter_data:'';
        if($filter_data!=''){
            $filter_data=Itemcheck::where('status','=',$filter_data)->get();
            return response()->json($filter_data);
        }
        else{
            return response()->json();
        }

    }
}

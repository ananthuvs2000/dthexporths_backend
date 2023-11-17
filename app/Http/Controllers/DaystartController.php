<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daystart;
class DaystartController extends Controller
{
    public function index(){
        $daystart_data=Daystart::all();
        return response()->json($daystart_data);
    }
    public function add(Request $request){

        $daystart=new Daystart;
        $daystart->day_start_date=date('Y-m-d');
        $daystart->batch_code=$request->batch_code;
        $daystart->boxno=$request->box_no;
        $daystart->process=$request->process;
        $daystart->team=$request->team;
        $daystart->image=$request->image;
        $daystart->weight_shown=$request->weight_shown;
        $daystart->calculated_weight=$request->calculated_weight;
        $daystart->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $itemcheck_data=Itemcheck::where('id',$request->id)->get();
        return response()->json(['success' => true,'data'=>$itemcheck_data]);
    }
    public function update(Request $request){
     Itemcheck::where('id', $request->id)
      ->update(['vendor_code'=>$request->vendor_code,'batch_code'=>$request->batch_code,'venue'=>$request->venue,'quantity_checked'=>$request->quantity_checked,'team_name'=>$request->team_name]);
      return response()->json(['success' => true,]);

    }
    public function remove(Request $request){
        $itemcheck_data = Itemcheck::find($request->id);
        $itemcheck_data->delete();
        return response()->json(['success' => true]);

    }
    public function filter_by_date(Request $request){
        $todate=$request->date;
        $item_daystart=Daystart::where('day_start_date','=',$todate)->get();  
        return response()->json($item_daystart);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index(){
        $worker_data=Worker::all();
        //return response()->json(['success' => true,'data'=>$color_data]);
        return response()->json($worker_data);
    }
    public function add(Request $request){

        $worker=new Worker;
        $worker->employee_name=$request->employee_name;
        $worker->employee_code=$request->employee_code;
        $worker->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $wroker_data=Worker::where('id',$request->id)->get();
        return response()->json(['success' => true,'data'=>$wroker_data]);
    }
    public function update(Request $request){
     Worker::where('id', $request->id)
      ->update(['color_name'=>$request->employee_name,'color_code'=>$request->employee_code]);
      return response()->json(['success' => true]);

    }
    public function remove(Request $request){
        $worker_data = Worker::find($request->id);
        $worker_data->delete();
        return response()->json(['success' => true]);

    }
}

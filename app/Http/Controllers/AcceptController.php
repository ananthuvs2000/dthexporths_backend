<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accept_temp;
use App\Models\Itemaccept;
use App\Models\Itemcheck;
use App\Models\Worker;

class AcceptController extends Controller
{
    public function index(Request $request){
        $itema_accept_data=Itemaccept::all();
        return response()->json(['success' => true,'data'=>$itema_accept_data]);
    }
    public function get_accept_tmp(Request $request){
        /*$itema_accept_tmp_data=Accept_temp::all();
        return response()->json($itema_accept_tmp_data);*/
         $batch_code=$request->batch_code;
        $itema_accept_tmp_data=Accept_temp::where('batch_code','=',$batch_code)->get();
        return response()->json($itema_accept_tmp_data);
    }
    public function accept_tmp_store(Request $request){
        $itemaccept=new Accept_temp;
        $itemaccept->batch_code=$request->batch_code;
        $itemaccept->box_ref=$request->box_ref;
        $itemaccept->size_ref=$request->size_ref;
        $itemaccept->color_ref=$request->color_ref;
        $itemaccept->texture_ref=$request->texture_ref;
        $itemaccept->material_qty=$request->material_qty;
        $itemaccept->image_path=$request->image_path;
        $itemaccept->process=$request->process;
        $itemaccept->save();
        return response()->json(['success' => true]);
    }
    public function accept_tmp_remove(Request $request){
        $batch_code=$request->batch_code;
        $box_ref=$request->box_ref;
        $accept_data = Accept_temp::where(['batch_code'=>$batch_code,'box_ref'=>$box_ref]);
        $accept_data->delete();
        return response()->json(['success' => true]);
    }
    public function accept_tmp_store_confirm(Request $request){
        $batch_code=$request->batch_code;
        Accept_temp::select("*")->where('batch_code','=',$batch_code)
        ->each(function ($accept_tmp) {
                $new_accept_tmp = $accept_tmp->replicate();
                $new_accept_tmp->setTable('itemaccepts');
                $new_accept_tmp->save();
                $accept_tmp->delete();
          });
        Itemcheck::where('batch_code','=', $batch_code)->update(['status'=>'accepted']);
        return response()->json(['success' => true]);
    }
    public function accept_tmp_empty(Request $request){

    }
    public function get_batchcode_available_boxes(Request $request){
        $batch_code=$request->batch_code;
        $data=Accept_temp::select('box_ref')->where('batch_code','=',$batch_code)->get();
        $data_ar=[];
        foreach($data as $item){
            array_push($data_ar,$item->box_ref);
        }
        
        $available_boxes=[];
        for($i=1;$i<100;$i++)
        {
           /* if(array_search(str($i),array_column($data_ar,'box_ref'))){
                $i++;
            }*/
            if(in_array(str($i),$data_ar)){
                $i++;
            }
            array_push($available_boxes,$i);
        }
        
        return response()->json($available_boxes);
        

    }
     public function accepted_batch_details(Request $request){
        $batch_code=$request->batch_code;
        $worker_data=$this->get_employees_batch_code_wise($batch_code);
        $box_data=$this->get_accepeted_boxes_based_on_batchno($batch_code);
        return response()->json(['box_data'=>$box_data,'workerdata'=>$worker_data]);

    }
    public function get_employees_batch_code_wise($batch_code){
        $worker_set=[];
        $id_data=Itemcheck::select('team_name')->where('batch_code','=',$batch_code)->get();
        if($id_data)
        {
            $item_set=explode('#',$id_data[0]->team_name);
            $worker_set=Worker::whereIn('employee_code',$item_set)->get();
            return $worker_set;
        }
        return $worker_set;
    }
    public function get_accepeted_boxes_based_on_batchno($batch_code){
        $accepted_dataset=Itemaccept::where('batch_code','=',$batch_code)->get();
        return $accepted_dataset;

    }
    

}

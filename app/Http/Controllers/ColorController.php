<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;


class ColorController extends Controller
{
    public function index(){
        $color_data=Color::all();
        return response()->json(['success' => true,'data'=>$color_data]);
    }
    public function add(Request $request){

        $color=new Color;
        $color->color_name=$request->color_name;
        $color->color_code=$request->color_code;
        $color->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $color_data=Color::where('id',$request->id)->get();
        return response()->json(['success' => true,'data'=>$color_data]);
    }
    public function update(Request $request){
     Color::where('id', $request->id)
      ->update(['color_name'=>$request->color_name,'color_code'=>$request->color_code]);
      return response()->json(['success' => true,]);

    }
    public function remove(Request $request){
        $flight = Color::find($request->id);
        $flight->delete();
        return response()->json(['success' => true]);

    }
}

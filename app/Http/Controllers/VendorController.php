<?php

namespace App\Http\Controllers;
use App\Models\Vendor;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(){
        $vendor_data=Vendor::all();
       // return response()->json(['success' => true,'status_code'=>1,'data'=>$vendor_data]);
       return response()->json($vendor_data);
    }
    public function add(Request $request){

        $vendor=new Vendor;
        $vendor->vendor_code=$request->vendor_code;
        $vendor->vendor_name=$request->vendor_name;
        $vendor->vendor_email=$request->vendor_email;
        $vendor->vendor_mobile=$request->vendor_mobile;
        $vendor->vendor_address=$request->vendor_address;
        $vendor->save();
        return response()->json(['success' => true]);

    }
    public function edit(Request $request){
        $vendor_data=Vendor::where('id',$request->id)->get();
        //return response()->json(['success' => true,'data'=>$vendor_data]);
        return response()->json($vendor_data);
    }
    public function update(Request $request){
     Vendor::where('id', $request->id)
      ->update(['vendor_code'=>$request->vendor_code,'vendor_name'=>$request->vendor_name,'vendor_email'=>$request->vendor_email,'vendor_mobile'=>$request->vendor_mobile,'vendor_address'=>$request->vendor_address]);
      return response()->json(['success' => true,]);

    }
    public function remove(Request $request){
        $vendor_data = Vendor::find($request->id);
        $vendor_data->delete();
        return response()->json(['success' => true]);

    }
}

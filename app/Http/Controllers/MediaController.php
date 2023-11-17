<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media_temp;

class MediaController extends Controller
{
    public function index(Request $request){
        $media_data=Media_temp::all();
        return response()->json($media_data);

    }
    public function store_temp_img(Request $request){
        $getImage = $request->image;
        $imageName = time().'.'.$getImage->extension();
        $imagePath = public_path(). '/images/posts';
        $imgpath="/images/posts/".$imageName;
        $getImage->move($imagePath, $imageName);
        $image=new Media_temp();
        $image->image_path=$imgpath;
        $image->status="pending";
        $image->save();
        return response()->json(['image_path'=>$imgpath]);


    }
}

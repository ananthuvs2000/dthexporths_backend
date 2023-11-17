<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Generalsettings extends Controller
{
    public function create_batchcode(){


    }
    public function getdatetime(){
        
        $data['date']=date('Y-m-d');
        $data['time']=date('h:i:s');
        return response()->json($data);
    }

}

<?php

namespace App\Http\Controllers\api;

use App\Appointment;
use App\WorkingHours;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function getWorkingHours($date=''){
        $date = ($date =="") ? date("Y-m-d") : $date ;
        $returnArray=[];
        $hours = WorkingHours::all();
        foreach ($hours as $k => $v){
            $control = Appointment::where('date',$date)
                ->where('workingHour', $v['id'])->count();
            $v['isActive'] = $control == 0;
            $returnArray[] = $v;
        }

        return response()->json($returnArray);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\DriveCapacity;

trait DriveCapacityTrait
{
    protected $data;

    public function getCapacity($type){
        $usage = DriveCapacity::where('user_id',Auth::user()->id)->sum($type);

        //KB 1000
        if($usage < 1000000){
            $v = round($usage/1000,2);
            $this->data = (string)$v.' KB';
        }
        //MB 1000 000
        else if($usage >= 1000000 && $usage < 1000000000){
            $v = round($usage/1000000,2);

            $this->data = (string)$v.' MB';
        }
        //GB 1000 000 000
        else if($usage >= 1000000000 && $usage < 1000000000000 ){
            $v = round($usage/1000000000,2);

            $this->data = (string)$v.' GB';
        }
        //TB 1000 000 000 000
        else{
            $v = round($usage/1000000000000,2);

            $this->data = (string)$v.' TB';
        }

        return $this->data.'/'.$usage;
    }
}

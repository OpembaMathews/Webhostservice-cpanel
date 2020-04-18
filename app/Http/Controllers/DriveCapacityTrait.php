<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\DriveCapacity;

trait DriveCapacityTrait
{
    protected $data;

    public function getCapacity($type){
        $usage = DriveCapacity::where('user_id',Auth::user()->id)->sum($type);

        if($usage < 1000){
            $this->data = (string)$usage.' KB';
        }
        else if($usage >= 1000 && $usage <= 999999){
            $v = round($usage/1000,2);

            $this->data = (string)$v.' MB';
        }
        else if($usage >= 1000000 && $usage <= 999999999){
            $v = round($usage/1000000,2);

            $this->data = (string)$v.' GB';
        }
        else{
            $v = round($usage/1000000000,2);

            $this->data = (string)$v.' TB';
        }

        return $this->data.'-'.$usage;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriveCapacity extends Model
{
    use SoftDeletes;
	
	protected $table = 'drive_capacity';
    protected $guarded = [];
}

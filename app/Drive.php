<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drive extends Model
{
	use SoftDeletes;
	
	protected $table = 'drive';
    protected $guarded = [];

    public function folder(){
    	return $this->belongsTo('App\Folder');
    }
}

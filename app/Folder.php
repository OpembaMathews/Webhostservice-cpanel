<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes;
	
	protected $table = 'folder';
    protected $guarded = [];

    public function drive(){
    	return $this->hasMany('App\Drive');
    }
}

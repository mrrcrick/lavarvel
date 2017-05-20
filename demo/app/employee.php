<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    //
	public function bookins()
	{
		return $this->hasMany('bookin');
	}
}

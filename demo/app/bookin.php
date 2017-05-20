<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookin extends Model
{
    //
	public function employees()
	{
		return $this->belongsTo('employee');
	}
}

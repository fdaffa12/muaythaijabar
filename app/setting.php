<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
	protected $fillable = [
		'address', 'phone', 'fax', 'email', 'social', 'about'
	];
}

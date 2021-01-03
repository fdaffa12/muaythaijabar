<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
	protected $fillable = [
		'newscat_name', 'status',
	];
}

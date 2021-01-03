<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
		'tittle', 'tittle_slug', 'long_description', 'image_one', 'status'
	];
}

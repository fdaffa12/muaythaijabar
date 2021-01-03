<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $fillable = [
		'news_tittle', 'news_slug', 'newscat_id', 'long_description', 'image_one', 'status', 'views'
	];

	public function newscat(){
		return $this->belongsTo(NewsCategory::class, 'newscat_id');
	}
}

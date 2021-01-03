<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
	protected $fillable = [
		'athlete_name', 'athlete_slug', 'pengcab_id', 'club_id', 'category_id', 'kelas_id', 'address', 'gender', 'birthday', 'prestasi', 'image_one', 'status',
	];

	public function category(){
		return $this->belongsTo(Category::class, 'category_id');
	}

	public function club(){
		return $this->belongsTo(Club::class, 'club_id');
	}

	public function pengcab(){
		return $this->belongsTo(Pengcab::class, 'pengcab_id');
	}

	public function kelas(){
		return $this->belongsTo(Kelas::class, 'kelas_id');
	}
}

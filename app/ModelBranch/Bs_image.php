<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Bs_image extends Model
{
	public $timestamps = false;
    protected $table = 'bs_image';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','image_big','image_small'];
}

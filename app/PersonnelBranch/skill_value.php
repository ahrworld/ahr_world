<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class skill_value extends Model
{
	public $timestamps = false;
     protected $table = 'skill_value';

     protected $fillable = ['skill_value','skill_name_id','user_id'];

}

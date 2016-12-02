<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abroad_exp extends Model
{
   public $timestamps = false;
   protected $table = 'abroad_exp';
   protected $fillable = ['main','gear','content','place','gotime','backtime','user_id'];
}

<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Bs_summary extends Model
{
    public $timestamps = false;
    protected $table = 'bs_summary';
    protected $fillable = ['user_id','image_id','summary','summary_title'];
}

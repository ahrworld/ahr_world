<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Bs_summary_image extends Model
{
    public $timestamps = false;
    protected $table = 'bs_summary_image';
    protected $fillable = ['bs_summary_id','image'];
}

<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Bs_history extends Model
{
    protected $table = 'bs_history';
    protected $fillable = ['user_id','personnels_id'];
}

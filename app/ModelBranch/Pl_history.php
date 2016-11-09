<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Pl_history extends Model
{
    protected $table = 'pl_history';
    protected $fillable = ['bs_user_id','user_id','recruitments_id'];

}

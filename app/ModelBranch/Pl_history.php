<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Pl_history extends Model
{
    protected $table = 'pl_history';
    protected $fillable = ['bsinformations_id','user_id','recruitments_id'];

}

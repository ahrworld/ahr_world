<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class P_license extends Model
{
    public $timestamps = false;
    protected $table = 'p_license';
    protected $fillable = ['license','user_id'];
}

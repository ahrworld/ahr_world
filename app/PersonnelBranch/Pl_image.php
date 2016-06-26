<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class Pl_image extends Model
{
    public $timestamps = false;
    protected $table = 'pl_image';
    protected $fillable = ['image_small','user_id'];
}

<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Pl_portfolio extends Model
{
    protected $table = 'pl_portfolio';
    protected $fillable = ['user_id','p_title','p_content','p_file','p_url'];
}

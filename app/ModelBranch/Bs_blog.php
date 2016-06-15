<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Bs_blog extends Model
{
    protected $table = 'bs_blog';
    protected $primaryKey = 'id';
    protected $fillable = ['title','sub_title','blog_content','blog_image','user_id'];
}

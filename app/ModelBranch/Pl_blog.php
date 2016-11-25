<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Pl_blog extends Model
{
     protected $table = 'pl_blog';
    protected $primaryKey = 'id';
    protected $fillable = ['title','sub_title','blog_content','blog_image','user_id'];
}

<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Mail_box extends Model
{
    protected $table = 'mail_box';
    protected $primaryKey = 'id';
    protected $fillable = ['mail_title','mail_content','status','favorite','get_user_id','post_user_id'];
}

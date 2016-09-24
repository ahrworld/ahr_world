<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnels';

    protected $fillable = [
        'surname', 'family_name', 'surname_en', 'family_name_en',
        'birthday', 'post','city','address','phone','line_id',
        'country','want_country','sex','military','military_end_year',
        'military_end_month','character','educational_status','educational','school',
        'school_country','subject_id','start_year','start_month','end_year','end_month','skype_id',

    ];
}

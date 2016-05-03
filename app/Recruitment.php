<?php

namespace App;
use App\ModelBranch\Employment;
use App\ModelBranch\Experience;
use App\ModelBranch\Languagelv;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
	protected $table = 'recruitments';
	protected $fillable = [
        'name', 'content', 'employment_id', 'experience_id',
        'ideal', 'subject','languageLv_id','need_skill','if_skill','other_skill',
        'work_site', 'annual_income','monthly_income','work_time','bonus','holiday',
        'welfare', 'allowances','education','user_id',
    ];

    public function employment()
    {
        return $this->hasMany(Employment::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function languagelv()
    {
        return $this->hasMany(Languagelv::class);
    }
}

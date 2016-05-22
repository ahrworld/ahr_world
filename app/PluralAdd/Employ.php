<?php

namespace App\PluralAdd;
use App\BSinformations;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
	public $timestamps = false;
    protected $table = 'employs';
    protected $fillable = [
        'employ', 'BSinformations_id', 
    ];
    public function BSinformationss()
    {
        return $this->belongsTo(BSinformations::class);
    }
}

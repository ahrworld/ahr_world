<?php

namespace App;
use App\Task;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function owns($related)
    {
        return $this->id == $related->user_id;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name',$role);
        }

        return !! $role->intersect($this->roles)->count();

        // foreach($role as $r){
        //     if($this->hasRole($r->name)){
        //         return true;
        //     }
        // }

        // return false;
    }
}

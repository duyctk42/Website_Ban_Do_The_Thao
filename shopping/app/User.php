<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){return $this->belongsToMany(Role::class,'role_user', 'user_id', 'role_id');
    }
    public  function checkPermissionAccess($pemissionCheck){
           $roles = auth() ->user()->role;
           foreach ($roles as $role){
               $permissions = $role->permissions;
               if($permissions->contains('key_code', $pemissionCheck)){
                   return true;
               }
           }
           return false;
    }
}




<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Jenssegers\Mongodb\Auth\User as Authenticatable;
// // use Illuminate\Contracts\Auth\Authenticatable;
// // use Illuminate\Foundation\Auth\User as Authenticatable;
// // use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


// // class User extends Eloquent implements AuthenticatableContract
// class User extends Authenticatable

// {
//     use Notifiable  ;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
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
    // public function subject(){
    //     return $this->hasMany(UserSubjectMap::class);//,'user_id', 'id');
    // }
    public function slots(){
        return $this->hasOne('App\DoctorSlot', 'doctorId');
    }
    // public function getAuthIdentifierName();
// public function getAuthIdentifier();
// public function getAuthPassword();
// public function getRememberToken();
// public function setRememberToken($value);
// public function getRememberTokenName();
}

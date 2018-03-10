<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    public $table = 'taikhoan';
    public $timestamps = false;
    use Notifiable;

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

    // public function phieunhapkho()
    // {
    //     return $this->hasMany('App\phieunhapkho','ID_TaiKhoan','ID');
    // }

    // public function phieuxuatkho()
    // {
    //     return $this->hasMany('App\phieuxuatkho','ID_TaiKhoan','ID');
    // }
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }
}

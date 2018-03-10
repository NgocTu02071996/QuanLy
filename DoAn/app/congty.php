<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class congty extends Model
{
    protected $table = "congty";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function sanpham()
    {
        return $this->hasMany('App\sanpham','MaCongTy','id');
    }
}

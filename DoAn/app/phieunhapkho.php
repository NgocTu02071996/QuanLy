<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class phieunhapkho extends Model
{
    //
    protected $table = "phieunhapkho";
    protected $primaryKey = 'STT_NhapKho';
    public $timestamps = false;

    public function taikhoan(){
        return $this->belongsTo('App\User','ID_TaiKhoan','id');
    }
}

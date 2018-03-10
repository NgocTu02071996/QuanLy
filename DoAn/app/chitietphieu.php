<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class chitietphieu extends Model
{
    //
    protected $table = "chitietphieu";
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function congty(){
        return $this->belongsTo('App\congty','TenCongTy','id');
    }

    public function donvidem(){
        return $this->belongsTo('App\donvidem','DonViDem','ID_DVD');
    }

    public function addDataBase($a,$b,$c,$d,$e,$f,$g,$h,$i)
    {
        DB::table('chitietphieu')->insert([
            'ID_Phieu'=>$a,
            'TenSanPham'=>$b,
            'ID_SanPham'=>$c,
            'Anh'=>$d,
            'TenCongTy'=>$e,
            'SoLuong'=>$f,
            'DonViDem'=>$g,
            'DonGia'=>$h,
            'GhiChu'=>$i
        ]);
    }
}

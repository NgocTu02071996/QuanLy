<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //
    protected $table = "sanpham";
    protected $primaryKey = 'STT';
    public $timestamps = false;

    public function congty(){
        return $this->belongsTo('App\congty','MaCongTy','id');
    }

    public function donvidem(){
        return $this->belongsTo('App\donvidem','DonViDem','ID_DVD');
    }
}

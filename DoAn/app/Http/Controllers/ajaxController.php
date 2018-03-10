<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietphieu;
use App\phieunhapkho;
use App\congty;
use App\donvidem;
class ajaxController extends Controller
{
    //
    
    public function getRow_Product($id)
    {
        $congty=congty::all();
        $donvidem=donvidem::all();
        for($a=1;$a<=$id;$a++)
        {
            echo "
                <div class='form-group'>
                    <label>Tên Sản Phẩm</label>
                    <input class='form-control a".$a."'  name='txtTenSanPham' placeholder='Điền tên sản phẩm' />
                </div>
                <div class='form-group'>
                    <label>ID Sản Phẩm</label>
                    <input class='form-control ID_SanPham".$a."' name='ID_SanPham' placeholder='Điền ID sản phẩm' />
                </div>
                <div class='form-group'>
                    <label>Hình</label>
                    <input type='file' class='form-control txtAnh".$a."' name='txtAnh$a' placeholder='Chọn hình' value='' />
                </div>
                <div class='form-group'>
                    <label>Tên Công Ty</label>
                    <select class='form-control txtTenCongTy".$a."' name='txtTenCongTy'>";
                    foreach($congty as $ct)
                    {
                        echo "<option value='".$ct->id."'>".$ct->TenCongTy."</option>";
                    }
            echo "
                </select>
            </div>
            <div class='form-group'>
                <label>Số lượng</label>
                <input maxlength='4' type='text' class='form-control txtSoLuong".$a."' name='txtSoLuong' placeholder='Điền số lượng' />
            </div>
            <div class='form-group'>
                <label>Đơn vị đếm</label>
                <select class='form-control txtDVD".$a."' name='txtDVD'>";
                foreach($donvidem as $dvd)
                {
                    echo "<option value='".$dvd->ID_DVD."'>".$dvd->Ten_DVD."</option>";
                }
            echo "
                </select>
            </div>
            <div class='form-group'>
                <label>Đơn giá</label>
                <input type='number' class='form-control txtDonGia".$a."' name='txtDonGia' placeholder='Điền đơn giá' value='' />
            </div>
            <div class='form-group'>
                <label>Ghi chú</label>
                <input class='form-control txtGhiChu".$a."' name='txtGhiChu' placeholder='Điền ghi chú' value='' />
            </div>
            <hr>";
        }
    }

    public function getRow_value($id)
    {
        echo "<input type='hidden' name='hidden' value='";print_r($id); echo"' />";
    }
    
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\donvidem;
use App\congty;
use App\phieunhapkho;

class sanphamController extends Controller
{
    //
    
    public function getDanhSach()
    {
        $sanpham= sanpham::all();
        return view ('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
    public function getThem()
    {
        $donvidem=donvidem::all();
        $congty=congty::all();
        $phieunhapkho=phieunhapkho::all();
        return view ('admin.sanpham.them',['donvidem'=>$donvidem],['phieunhapkho'=>$phieunhapkho,'congty'=>$congty]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTenSanPham'=>'required|max:30',
            'txtHinh'=>'required|image',
            'txtSoLuong'=>'required|max:9999|numeric',
            'ID_DVD'=>'required',
            'txtCongTy'=>'required',
            'txtGia'=>'required|numeric',
            'txtLoHang'=>'required'
        ],
        [
            'txtTenSanPham.required'=>'Chưa nhập tên',
            'txtTenSanPham.max'=>'Tên nhỏ hơn 30 ký tự',

            'txtHinh.required'=>'Chưa chọn hình',
            'txtHinh.image'=>'Không phải là hình',

            'txtSoLuong.required'=>'Chưa nhập số lượng',
            'txtSoLuong.max'=>'Số lượng dưới 10000',
            'txtSoLuong.numeric'=>'Số lượng phải là số',
            
            'ID_DVD.required'=>'Chưa chọn đơn vị tính',

            'txtCongTy.required'=>'Chưa chọn công ty',

            'txtGia.required'=>'Chưa nhập giá',
            'txtGia.numeric'=>'Giá phải là số',
            
            'txtLoHang.required'=>'Chưa chọn lô hàng'
        ]);
        
        $sanpham= new sanpham;
        if($request->txtSoLuong < 0)
        {
            return redirect('admin/sanpham/them')->with('canhbao','Số lượng lớn hơn 0');
        }
        else{
            $sanpham->SoLuong=$request->txtSoLuong;
        }

        if($request->txtGia < 0)
        {
            return redirect('admin/sanpham/them')->with('canhbao','Giá lớn hơn 0');
        }
        else{
            $sanpham->GiaTien=$request->txtGia;
        }
        $sanpham->TenSanPham=$request->txtTenSanPham;
        
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');

            $name=$file->getClientOriginalName();
            $Hinh= str_random(4)."_".$name;
            while(file_exists("upload/img_product/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/img_product/",$Hinh);
            $sanpham->Anh=$Hinh;
        }
        else{
            $sanpham->Anh="";
        }

        $sanpham->DonViDem=$request->ID_DVD;
        $sanpham->MaCongTy=$request->txtCongTy;
        $sanpham->GiaTien=$request->txtGia;
        $sanpham->LoHang=$request->txtLoHang;
        $sanpham->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm Thành Công');
        
        
    }

    public function getSua($id)
    {
        $sanpham= sanpham::find($id);
        $donvidem=donvidem::all();
        $congty=congty::all();
        $phieunhapkho=phieunhapkho::all();
        return view ('admin/sanpham/sua',['donvidem'=>$donvidem],['phieunhapkho'=>$phieunhapkho,'congty'=>$congty,'sanpham'=>$sanpham]);
    }

    public function postSua(Request $request,$id)
    {
        $sanpham = sanpham::find($id);
        $this->validate($request,
        [
            'txtTenSanPham'=>'required|max:30',
            'txtHinh'=>'image',
            'txtSoLuong'=>'required|max:9999|numeric',
            'ID_DVD'=>'required',
            'txtCongTy'=>'required',
            'txtGia'=>'required|numeric',
            'txtLoHang'=>'required'
        ],
        [
            'txtTenSanPham.required'=>'Chưa nhập tên',
            'txtTenSanPham.max'=>'Tên nhỏ hơn 30 ký tự',

            // 'txtHinh.required'=>'Chưa chọn hình',
            'txtHinh.image'=>'Không phải là hình',

            'txtSoLuong.required'=>'Chưa nhập số lượng',
            'txtSoLuong.max'=>'Số lượng dưới 10000',
            'txtSoLuong.numeric'=>'Số lượng phải là số',
            
            'ID_DVD.required'=>'Chưa chọn đơn vị tính',

            'txtCongTy.required'=>'Chưa chọn công ty',

            'txtGia.required'=>'Chưa nhập giá',
            'txtGia.numeric'=>'Giá phải là số',
            
            'txtLoHang.required'=>'Chưa chọn lô hàng'
        ]);
        if($request->txtSoLuong < 0)
        {
            return redirect('admin/sanpham/them')->with('canhbao','Số lượng lớn hơn 0');
        }
        else{
            $sanpham->SoLuong=$request->txtSoLuong;
        }

        if($request->txtGia < 0)
        {
            return redirect('admin/sanpham/them')->with('canhbao','Giá lớn hơn 0');
        }
        else{
            $sanpham->GiaTien=$request->txtGia;
        }
        $sanpham->TenSanPham=$request->txtTenSanPham;
        
        if($request->hasFile('txtHinh'))
        {
            $file=$request->file('txtHinh');

            $name=$file->getClientOriginalName();
            $Hinh= str_random(4)."_".$name;
            while(file_exists("upload/img_product/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            unlink("upload/img_product/".$sanpham->Anh);
            $file->move("upload/img_product/",$Hinh);
            $sanpham->Anh=$Hinh;
        }
        

        $sanpham->DonViDem=$request->ID_DVD;
        $sanpham->MaCongTy=$request->txtCongTy;
        $sanpham->GiaTien=$request->txtGia;
        $sanpham->LoHang=$request->txtLoHang;
        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

    public function getXoa($id)
    {
        $sanpham=sanpham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')-> with ('thongbao','Xóa thành công');
    }
}

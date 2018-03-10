<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietphieu;
use App\phieunhapkho;
use App\congty;
use App\donvidem;
use App\sanpham;
use DB;

class chitietphieuController extends Controller
{
    //
    
    public function getChiTiet($id)
    {
        $chitietphieu=chitietphieu::where('ID_Phieu', $id)->get();
        return view ('admin.chitietphieu.danhsach',['chitietphieu'=>$chitietphieu]);
    }
    
    public function getThemChiTiet()
    {
        $phieunhapkho= phieunhapkho::all();
        $congty=congty::all();
        $donvidem=donvidem::all();
        return view('admin.chitietphieu.them',['phieunhapkho'=>$phieunhapkho,'congty'=>$congty,'donvidem'=>$donvidem]);
    }

    public function postThemChiTiet(Request $request)
    {
        
        $this->validate($request,
        [
            'ID_SanPham'=>'required',
            'txtTenSanPham'=>'required|max:30|min:3',
            'ID_SanPham'=>'required|min:1|max:999',
            'txtAnh'=>'image',
            'txtTenCongTy'=>'required',
            'txtSoLuong'=>'required|min:1|max:9999',
            'txtDVD'=>'required',
            'txtDonGia'=>'required|min:5|max:9999999999',
        ],
        [
            'ID_SanPham.required'=>'Chưa chọn lô hàng',

            'txtTenSanPham.min'=>'Tên lớn hơn ba ký tự',
            'txtTenSanPham.required'=>'Chưa nhập tên sản phẩm',
            'txtTenSanPham.max'=>'Tên nhỏ hơn 30 ký tự',

            'ID_SanPham.max'=>'ID nhỏ hơn 999',
            'ID_SanPham.required'=>'Chưa nhập ID sản phẩm',
            'ID_SanPham.min'=>'ID lớn hơn 0',

            'txtAnh.image'=>'Không phải file ảnh',

            'txtTenCongTy.required'=>'Chưa chọn công ty',

            'txtSoLuong.required'=>'Chưa nhập số lượng',
            'txtSoLuong.max'=>'Số lượng dưới 9999',
            'txtSoLuong.min'=>'Số lượng phải >0',

            'txtDVD.required'=>'Chưa chọn đơn vị tính',

            'txtDonGia.required'=>'Chưa nhập đơn giá',
            'txtDonGia.min'=>'Giá trị lớn hơn 1.000',
            'txtDonGia.max'=>'Giá trị nhỏ hơn 1.000.000.000',
        ]);
        $loop=$request->row_product;
        $file_box='txtAnh'.$loop;
        for($z=0;$z<$loop;$z++)
        {
        if($request->hasFile($file_box))
        {
            $file=$request->file($file_box);
            $a = explode(',',$request->hidden);
            for($i = 0; $i<count($a);$i++){
            $b = explode(';',$a[$i]);
            }
            $name=$b[3];
            while(file_exists("upload/img_detail/img_product/".$name))
            {
            }
            $file->move("upload/img_detail/img_product/",$name);
        
        }
        }
        
        
        // $chitietphieu= new chitietphieu;
        // $chitietphieu->ID_Phieu=$request->ID_LoHang;
        // $chitietphieu->TenSanPham=$request->txtTenSP;
        // $chitietphieu->ID_SanPham=$request->ID_SanPham;
        // $chitietphieu->TenCongTy=$request->txtTenCongTy;
        // $chitietphieu->SoLuong=$request->txtSoLuong;
        // $chitietphieu->DonViDem=$request->txtDVD;
        // $chitietphieu->GhiChu=$request->txtGhiChu;
        // $chitietphieu->DonGia=$request->txtDonGia;
        // $chitietphieu->save();
        
        $a = explode(',',$request->hidden);
        for($i = 0; $i<count($a);$i++){
            $b = explode(';',$a[$i]);
            $data = new chitietphieu();
            $data ->addDataBase($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8]);
        }
        return redirect('admin/danhsachphieu/themchitiet')->with('thongbao','Thêm Thành Công');
    }   

    public function getSua($id)
    {
        $chitietphieu=chitietphieu::find($id);
        $donvidem=donvidem::all();
        $congty=congty::all();
        return view('admin.chitietphieu.sua',['chitietphieu'=>$chitietphieu],['donvidem'=>$donvidem,'congty'=>$congty]);
    
        

    }
    public function postSua(Request $request,$id)
    {
        $chitietphieu=chitietphieu::find($id);
        $this->validate($request,
        [
            'ID_SanPham'=>'required',
            'txtTenSP'=>'required|max:30|min:3',
            'ID_SanPham'=>'required|min:1|max:999',
            'txtAnh'=>'image',
            'txtTenCongTy'=>'required',
            'txtSoLuong'=>'required|min:1|max:9999',
            'txtDVD'=>'required',
            'txtDonGia'=>'required|min:5|max:9999999999',
        ],
        [
            'ID_SanPham.required'=>'Chưa chọn lô hàng',

            'txtTenSP.min'=>'Tên lớn hơn ba ký tự',
            'txtTenSP.required'=>'Chưa nhập tên sản phẩm',
            'txtTenSP.max'=>'Tên nhỏ hơn 30 ký tự',

            'ID_SanPham.max'=>'ID nhỏ hơn 999',
            'ID_SanPham.required'=>'Chưa nhập ID sản phẩm',
            'ID_SanPham.min'=>'ID lớn hơn 0',

            'txtAnh.image'=>'Không phải file ảnh',

            'txtTenCongTy.required'=>'Chưa chọn công ty',

            'txtSoLuong.required'=>'Chưa nhập số lượng',
            'txtSoLuong.max'=>'Số lượng dưới 9999',
            'txtSoLuong.min'=>'Số lượng phải >0',

            'txtDVD.required'=>'Chưa chọn đơn vị tính',

            'txtDonGia.required'=>'Chưa nhập đơn giá',
            'txtDonGia.min'=>'Giá trị lớn hơn 1.000',
            'txtDonGia.max'=>'Giá trị nhỏ hơn 1.000.000.000',
        ]);
        if($request->hasFile('txtAnh'))
        {
            $file=$request->file('txtAnh');

            $name=$file->getClientOriginalName();
            $Hinh= str_random(4)."_".$name;
            while(file_exists("upload/img_detail/img_product/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            unlink("upload/img_detail/img_product/".$sanpham->Anh);
            $file->move("upload/img_detail/img_product/",$Hinh);
            $sanpham->Anh=$Hinh;
        }
        $chitietphieu->TenSanPham=$request->txtTenSP;
        $chitietphieu->ID_SanPham=$request->ID_SanPham;
        $chitietphieu->TenCongTy=$request->txtTenCongTy;
        $chitietphieu->SoLuong=$request->txtSoLuong;
        $chitietphieu->DonViDem=$request->txtDVD;
        $chitietphieu->GhiChu=$request->txtGhiChu;
        $chitietphieu->DonGia=$request->txtDonGia;
        $chitietphieu->save();
        return redirect('admin/danhsachphieu/suachitiet/'.$id)->with('thongbao','Sửa Thành Công');   
    }
    public function getXoa($id)
    {
        $chitietphieu=chitietphieu::find($id);
        $chitietphieu->delete();
        return redirect('admin/danhsachphieu/phnk')-> with ('thongbao','Xóa thành công');
    }
    // public function getproduct(Request $request,$product){
        // $a = explode(',',$product);
        // for($i = 0; $i<count($a);$i++){
        //     $b = explode(';',$a[$i]);
        //     $data = new chitietphieu();
        //     $data ->addDataBase($b[0],$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8]);
        // }
        
        // return redirect('admin/danhsachphieu/themchitiet')->with ('thongbao','Thêm Chi Tiết thành công');
    // }

    public function getDuyet($id,$id_sp)
    {
        DB::table('chitietphieu')
            ->where(function($query)
        {
            $query->where('ID_SanPham','=',$id)
                  ->where('id','=',$id_sp);
        })->get();
        
        $sanpham=sanpham::find($id);
        if(isset($sanpham->STT))
        {
            $sanpham->SoLuong=$sanpham->SoLuong+$chitietphieu->SoLuong;
            $sanpham->save();
        }
        else
        {
            $sanpham= new sanpham();
            $sanpham->STT=$chitietphieu->ID_SanPham;
            $sanpham->TenSanPham=$chitietphieu->TenSanPham;
            $sanpham->Anh=$chitietphieu->Anh;
            $sanpham->SoLuong=$chitietphieu->SoLuong;
            $sanpham->DonViDem=$chitietphieu->DonViDem;
            $sanpham->MaCongTy=$chitietphieu->TenCongTy;
            $sanpham->GiaTien=$chitietphieu->DonGia;
            $sanpham->LoHang=$chitietphieu->ID_Phieu;
            copy ("upload/img_detail/img_product/".$chitietphieu->Anh, "upload/img_product/$chitietphieu->Anh");
            $sanpham->save();
        }
        return redirect('admin/danhsachphieu/phnk')-> with ('thongbao','Duyệt sản phẩm thành công');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phieunhapkho;
use App\phieu;
use Carbon\Carbon;
use Auth;

class phieunhapkhoController extends Controller
{
    //
    
    public function getDanhSach()
    {
        $phieunhapkho= phieunhapkho::all();
        return view ('admin.phieunhapkho.danhsach',['phieunhapkho'=>$phieunhapkho]);
    }
    public function getDanhSachxk()
    {
        $phieunhapkho= phieunhapkho::all();
        return view ('admin.phieunhapkho.danhsach',['phieunhapkho'=>$phieunhapkho]);
    }
    public function getThem()
    {
        $phieu=phieu::all();
        return view ('admin.phieunhapkho.them',['phieu'=>$phieu]);
    }
    public function postThem(Request $request)
    {
        $mytime = Carbon::now();
        $this->validate($request,
        [
            
            'txtGhiChu'=>'required|max:50'
        ],
        [
            
            'txtGhiChu.max'=>'Mô tả ít hơn 50 ký tự',
            'txtGhiChu.required'=>'Chưa nhập mô tả'
        ]);
        $phieunhapkho= new phieunhapkho;
        $phieunhapkho->ID_Phieu=$request->ID_Phieu;
        $phieunhapkho->GhiChu=$request->txtGhiChu;
        if(Auth::check())
        {
        $phieunhapkho->ID_TaiKhoan=Auth::user()->id;
        }
        $phieunhapkho->Ngay=$mytime->toDateTimeString();;
        $phieunhapkho->save();
        return redirect('admin/danhsachphieu/phnk')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        $phieu=phieu::all();
        $phieunhapkho= phieunhapkho::find($id);
        return view('admin.phieunhapkho.sua',['phieunhapkho'=>$phieunhapkho],['phieu'=>$phieu]);
    }

    public function postSua(Request $request,$id)
    {
        $phieunhapkho=phieunhapkho::find($id);
        $this->validate($request,
        [
            
            'txtGhiChu'=>'max:50|required'
        ],
        [
            
            'txtGhiChu.max'=>'Mô tả ít hơn 50 ký tự',
            'txtGhiChu.required'=>'Chưa nhập mô tả'
        ]);
        $phieunhapkho->ID_Phieu=$request->ID_Phieu;
        $phieunhapkho->GhiChu=$request->txtGhiChu;
        $phieunhapkho->ID_TaiKhoan=$phieunhapkho->ID_TaiKhoan;
        $phieunhapkho->Ngay=$phieunhapkho->Ngay;
        $phieunhapkho->save();  
        return redirect('admin/danhsachphieu/sua/'.$id)->with('thongbao','Sửa Thành Công'); 
    }

    public function getXoa($id)
    {
        $phieunhapkho=phieunhapkho::find($id);
        $phieunhapkho->delete();
        return redirect('admin/danhsachphieu/phnk')-> with ('thongbao','Xóa thành công');
    }

}

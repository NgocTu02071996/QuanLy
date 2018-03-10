<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phieu;

class phieuController extends Controller
{
    //
    
    public function getDanhSach()
    {
        $phieu= phieu::all();
        return view ('admin.phieu.danhsach',['phieu'=>$phieu]);
    }
    public function getThem()
    {
        return view ('admin.phieu.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTenphieu'=>'required|max:50',
            'txtMoTa'=>'required|max:50'
        ],
        [
            'txtTenphieu.required'=>'Chưa nhập tên',
            'txtTenphieu.max'=>'Tên nhỏ hơn 50 ký tự',
            // 'txtTenphieu.unique'=>'Tên đã tồn tại',
            'txtMoTa.max'=>'Mô tả ít hơn 50 ký tự',
            'txtMoTa.required'=>'Chưa nhập mô tả'
        ]);
        $phieu= new phieu;
        $phieu->Ten_Phieu=$request->txtTenphieu;
        $phieu->MoTa=$request->txtMoTa;
        $phieu->save();
        return redirect('admin/phieu/danhsach')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        $phieu= phieu::find($id);
        return view('admin.phieu.sua',['phieu'=>$phieu]);
    }

    public function postSua(Request $request,$id)
    {
        $phieu=phieu::find($id);
        $this->validate($request,
        [
            'txtTen'=>'required|unique:phieu,ten_Phieu|min:1|max:50',
            'txtMoTa'=>'max:50|required'
        ],
        [
            'txtTen.required'=>'Chưa nhập tên đơn vị đếm',
            'txtTen.unique'=>'Đơn vị đếm đã tồn tại đã tồn tại',
            'txtTen.min'=>'Tên lớn hơn một ký tự',
            'txtTen.max'=>'Tên nhỏ hơn 30 ký tự',
            'txtMoTa.max'=>'Mô tả ít hơn 50 ký tự',
            'txtMoTa.required'=>'Chưa nhập mô tả'
        ]);
        $phieu->Ten_Phieu=$request->txtTen;
        $phieu->MoTa=$request->txtMoTa;
        $phieu->save();  
        return redirect('admin/phieu/sua/'.$id)->with('thongbao','Sửa Thành Công'); 
    }

    public function getXoa($id)
    {
        $phieu=phieu::find($id);
        $phieu->delete();
        return redirect('admin/phieu/danhsach')-> with ('thongbao','Xóa thành công');
    }
}

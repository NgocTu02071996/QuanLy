<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donvidem;

class donvidemController extends Controller
{
    //
    
    public function getDanhSach()
    {
        $donvidem= donvidem::all();
        return view ('admin.donvidem.danhsach',['donvidem'=>$donvidem]);
    }
    public function getThem()
    {
        return view ('admin.donvidem.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTendonvidem'=>'required|max:10',
            'txtMoTa'=>'required|max:50'
        ],
        [
            'txtTendonvidem.required'=>'Chưa nhập tên',
            'txtTendonvidem.max'=>'Tên nhỏ hơn 10 ký tự',
            // 'txtTendonvidem.unique'=>'Tên đã tồn tại',
            'txtMoTa.max'=>'Mô tả ít hơn 50 ký tự',
            'txtMoTa.required'=>'Chưa nhập mô tả'
        ]);
        $donvidem= new donvidem;
        $donvidem->Ten_DVD=$request->txtTendonvidem;
        $donvidem->MoTa=$request->txtMoTa;
        $donvidem->save();
        return redirect('admin/donvidem/danhsach')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        $donvidem= donvidem::find($id);
        return view('admin.donvidem.sua',['donvidem'=>$donvidem]);
    }

    public function postSua(Request $request,$id)
    {
        $donvidem=donvidem::find($id);
        $this->validate($request,
        [
            'txtTen'=>'required|unique:donvidem,ten_DVD|min:1|max:30',
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
        $donvidem->Ten_DVD=$request->txtTen;
        $donvidem->MoTa=$request->txtMoTa;
        $donvidem->save();  
        return redirect('admin/donvidem/sua/'.$id)->with('thongbao','Sửa Thành Công'); 
    }

    public function getXoa($id)
    {
        $donvidem=donvidem::find($id);
        $donvidem->delete();
        return redirect('admin/donvidem/danhsach')-> with ('thongbao','Xóa thành công');
    }
}

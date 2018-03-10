<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\congty;

class congtyController extends Controller
{
    //
    
    public function getDanhSach()
    {
        $congty= congty::all();
        return view ('admin.congty.danhsach',['congty'=>$congty]);
    }
    public function getThem()
    {
        return view ('admin.congty.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtTenCongTy'=>'required|min:3|max:30',
            'txtMoTa'=>'required|max:50'
        ],
        [
            'txtTenCongTy.required'=>'Chưa nhập tên',
            'txtTenCongTy.min'=>'Tên lớn hơn ba ký tự',
            'txtTenCongTy.max'=>'Tên nhỏ hơn 30 ký tự',
            'txtMoTa.max'=>'Mô tả ít hơn 50 ký tự',
            'txtMoTa.required'=>'Chưa nhập mô tả'
        ]);
        
        $congty= new congty;
        $congty->TenCongTy=$request->txtTenCongTy;
        $congty->MoTa=$request->txtMoTa;
        if($request->hasFile('txtAnh'))
        {
            $file=$request->file('txtAnh');

            $name=$file->getClientOriginalName();
            $Hinh= str_random(4)."_".$name;
            while(file_exists("upload/img_company/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/img_company/",$Hinh);
            $congty->Anh=$Hinh;
        }
        $congty->save();
        return redirect('admin/congty/danhsach')->with('thongbao','Thêm Thành Công');
        
        
    }

    public function getSua($id)
    {
        $congty= congty::find($id);
        return view('admin.congty.sua',['congty'=>$congty]);
    }

    public function postSua(Request $request,$id)
    {
        $congty = congty::find($id);
        $this->validate($request,
        [
            'txtTen'=>'required|unique:congty,TenCongTy|min:3|max:30',
            'txtMoTa'=>'max:50',
            
        ],
        [
            'txtTen.required'=>'Chưa nhập tên công ty',
            'txtTen.unique'=>'Công ty đã tồn tại',
            'txtTen.min'=>'Tên lớn hơn ba ký tự',
            'txtTen.max'=>'Tên nhỏ hơn 30 ký tự',
            'txtMoTa.max'=>'Mô tả ít hơn 50 ký tự',
            'txtMoTa.required'=>'Chưa nhập mô tả',
            
        ]);
        $congty->TenCongTy=$request->txtTen;
        $congty->MoTa=$request->txtMoTa;
        if($request->hasFile('txtAnh'))
        {
            $file=$request->file('txtAnh');

            $name=$file->getClientOriginalName();
            $Hinh= str_random(4)."_".$name;
            while(file_exists("upload/img_company/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
            }
            unlink("upload/img_company/".$congty->Anh);
            $file->move("upload/img_company/",$Hinh);
            $congty->Anh=$Hinh;
        }
        
        $congty->save();
        return redirect('admin/congty/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

    public function getXoa($id)
    {
        $congty=congty::find($id);
        $congty->delete();
        return redirect('admin/congty/danhsach')-> with ('thongbao','Xóa thành công');
    }
}

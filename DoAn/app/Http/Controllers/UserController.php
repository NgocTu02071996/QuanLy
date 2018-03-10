<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;



class UserController extends Controller
{
    //

    
    public function getDanhSach(){
        $user= user::all();
        return view ('admin.users.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
        return view ('admin.users.them');
    }

    public function postThem(Request $request)
    {
        
        $this->validate($request,
        [
            
            'txtID'=>'required|max:10|unique:taikhoan,ID_Name|min:3',
            'txtPass'=>'required|max:15|min:6',
            'txtTen'=>'required|max:30',
            'txtNgaySinh'=>'required',
            'txtDiaChi'=>'required'
            
        ],
        [
            'txtID.required'=>'Chưa nhập ID',
            'txtID.max'=>'Tên ít hơn 10 ký tự',
            'txtID.min'=>'Tên nhiều hơn 3 ký tự',
            'txtID.unique'=>'ID đã tồn tại',
            
            'txtPass.required'=>'Chưa nhập Password',
            'txtPass.max'=>'Password ít hơn 15 kí tự',
            'txtPass.min'=>'Password nhiều hơn 6 kí tự',

            'txtNgaySinh.required'=>'Chưa nhập ngày sinh',
            'txtDiaChi.required'=>'Chưa nhập địa chỉ',

            'txtTen.required'=>'Chưa nhập tên',
            'txtTen.max'=>'Tên tối đa 30 kí tự'
        ]);
        $user= new user;    
        $user->ID_Name=$request->txtID;
        $user->password=$request->txtPass;
        $user->Ten=$request->txtTen;
        $user->DiaChi=$request->txtDiaChi;
        $user->NgaySinh=$request->txtNgaySinh;
        $user->remember_token='0';
        $user->save();
        return redirect('admin/users/danhsach')->with('thongbao','Thêm Thành Công');
    }

    public function postSua(Request $request,$id)
    {
        $user=user::find($id);
        $this->validate($request,
        [

            
            'txtTen'=>'required|max:30',
            'txtNgaySinh'=>'required',
            'txtDiaChi'=>'required'
            
        ],
        [

            'txtNgaySinh.required'=>'Chưa nhập ngày sinh',
            'txtDiaChi.required'=>'Chưa nhập địa chỉ',
            'txtTen.required'=>'Chưa nhập tên',
            'txtTen.max'=>'Tên tối đa 30 kí tự'
        ]);
        $user->ID_Name=$request->txtTenTaiKhoan;
        $user->Ten=$request->txtTen;
        $user->DiaChi=$request->txtDiaChi;
        $user->NgaySinh=$request->txtNgaySinh;
        $user->remember_token='0';
        if($request->changePass=="on")
        {
            $this->validate($request,
        [
            'txtPass'=>'required|max:15|min:6',
        ],
        [
            'txtPass.required'=>'Chưa nhập Password',
            'txtPass.max'=>'Password ít hơn 15 kí tự',
            'txtPass.min'=>'Password nhiều hơn 6 kí tự',
        ]);
        $user->password=$request->txtPass;
        }
        $user->save();
        return redirect('admin/users/sua/'.$id)->with('thongbao','Thêm Thành Công');
    }

    
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
        
        $this->validate($request,
        [
            'ID'=>'required|max:10|min:3',
            'password'=>'required|max:10'
        ],
        [
            'ID.required'=>'Chưa nhập tài khoản',
            'ID.min'=>'Tài khoản lớn hơn 3 kí tự',
            'ID.max'=>'Tài khoản nhỏ hơn 10 kí tự',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.max'=>'Mật khẩu nhỏ hơn 10 kí tự'
        ]);
        $username=$request->ID;
        $password=$request->password;
        if(Auth::attempt(['ID_Name'=>$username,'password'=>$password]))
        {
            
            return redirect('admin/congty/danhsach') ;
        }
        else
        {
            return redirect('admin/dangnhap')-> with ('thongbao','Đăng nhập không thành công');
        }
    }

    public function getSua($id)
    {
        $user= user::find($id);
        return view('admin.users.sua',['user'=>$user]);
    }

    public function getXoa($id)
    {
        $user=user::find($id);
        $user->delete();
        return redirect('admin/users/danhsach')-> with ('thongbao','Xóa thành công');
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <small>Chi tiết tài khoản</small>
                        </h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>                        
                            @endforeach
                        </div>
                    @endif
                    <!-- Thông báo khi thành công -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}} 
                        </div>
                    @endif 
                        <form action="admin/users/sua/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control" name="txtTenTaiKhoan" placeholder="Ghi chú" value="{{$user->ID_Name}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePass" name="changePass"/>
                                <label>Password</label>
                                <input class="form-control password" name="txtPass" placeholder="Muốn đổi mật khẩu nhấn vào dấu check"  disabled=""/>
                            </div>
                            <div class="form-group">
                                <label>Ten</label>
                                <input class="form-control" name="txtTen" placeholder="Ghi chú" value="{{$user->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtDiaChi" placeholder="Ghi chú" value="{{$user->DiaChi}}" />
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input class="form-control" name="txtNgaySinh" placeholder="Ghi chú" value="{{$user->NgaySinh}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection 

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection      
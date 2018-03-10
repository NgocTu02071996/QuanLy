@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">THÊM
                            <small>TÀI KHOẢN</small>
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
                            {{session('ThongBao')}} 
                        </div>
                    @endif               
                        <form action="admin/users/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" name="txtID" placeholder="Nhập tên tài khoản" />
                            </div>
                            <div class="form-group">
                                <label>PASSWORD</label>
                                <input class="form-control" name="txtPass" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>TÊN</label>
                                <input class="form-control" name="txtTen" placeholder="Nhập Tên" />
                            </div>
                            <div class="form-group">
                                <label>ĐỊA CHỈ</label>
                                <input class="form-control" name="txtDiaChi" placeholder="Nhập địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>NGÀY SINH</label>
                                <input class="form-control" type="date" name="txtNgaySinh" placeholder="Ngày sinh" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection
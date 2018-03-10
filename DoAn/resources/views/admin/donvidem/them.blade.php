@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">THÊM
                            <small>ĐƠN VỊ ĐẾM</small>
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
                    <!-- Thông báo khi thành công
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('ThongBao')}} 
                        </div>
                    @endif                -->
                        <form action="admin/donvidem/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <!-- <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control">
                                    <option value="0">Chọn Công ty muốn thêm</option>
                                    <option value="">Tin Tức</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label>Tên Đơn Vị Đếm</label>
                                <input class="form-control" name="txtTendonvidem" placeholder="Điền đơn vị đếm" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea id="demo" class="form-control ckeditor" name="txtMoTa" placeholder="Ghi chú" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Xóa dữ liệu</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection
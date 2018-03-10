@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
                            <small>{{$sanpham->TenSanPham}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->STT}}" method="POST" enctype= "multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="txtTenSanPham" placeholder="Nhập tên sản phẩm" value="{{$sanpham->TenSanPham}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="txtHinh" placeholder="Chọn hình" value="{{$sanpham->Anh}}" />
                                <img width="100px" heigh="100px" src="upload/img_product/{{$sanpham->Anh}}"/>
                            </div>
                            <div class="form-group">
                                <label>Số Lượng</label>
                                <input class="form-control" name="txtSoLuong" placeholder="Nhập số lượng" value="{{$sanpham->SoLuong}}" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị tính</label>
                                <select class="form-control" name="ID_DVD" id="ID_DVD">
                                @foreach($donvidem as $dvd)
                                <option
                                    @if ($sanpham->DonViDem==$dvd->ID_DVD)
                                    {{"selected"}}
                                    @endif
                                     value="{{$dvd->ID_DVD}}">{{$dvd->Ten_DVD}}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Đơn vị tính</label>
                                <select class="form-control" name="txtCongTy" value="{{$sanpham->MaCongTy}}">
                                @foreach($congty as $ct)
                                    <option
                                    @if ($sanpham->MaCongTy==$ct->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$ct->id}}">{{$ct->TenCongTy}}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá Tiền</label>
                                <input class="form-control" name="txtGia" placeholder="Giá sản phẩm" value="{{$sanpham->GiaTien}}" />
                            </div>
                            <div class="form-group">
                                <label>Lô hàng</label>
                                <select class="form-control" name="txtLoHang" value="{{$sanpham->LoHang}}">
                                @foreach($phieunhapkho as $ca)
                                    <option
                                    @if ($sanpham->LoHang==$ca->STT_NhapKho)
                                    {{"selected"}}
                                    @endif
                                    value="{{$ca->STT_NhapKho}}">{{$ca->GhiChu}}</option>
                                    
                                @endforeach    
                                </select>
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
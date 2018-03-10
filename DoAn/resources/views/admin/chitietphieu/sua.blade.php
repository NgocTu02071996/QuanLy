@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SỬA
                            <small>CHI TIẾT</small>
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
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}} 
                        </div>
                    @endif  
                        <form action="admin/danhsachphieu/suachitiet/{{$chitietphieu->id}}" method="POST" enctype= "multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <!-- <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <option value="">Tin Tức</option>
                                </select>
                            </div> -->
                            <div id="form">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="txtTenSP" placeholder="Điền tên sản phẩm"  value="{{$chitietphieu->TenSanPham}}" />
                            </div>
                            <div class="form-group">
                                <label>ID Sản Phẩm</label>
                                <input class="form-control" name="ID_SanPham" placeholder="Điền ID sản phẩm" value="{{$chitietphieu->ID_SanPham}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="txtAnh" placeholder="Chọn hình" value="" />
                                <img width="100px" heigh="100px" src="upload/img_detail/img_product/{{$chitietphieu->Anh}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tên Công Ty</label>
                                <select class="form-control" name="txtTenCongTy"  value="{{$chitietphieu->TenCongTy}}">
                                @foreach($congty as $ct)
                                    <option
                                    @if ($chitietphieu->TenCongTy==$ct->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$ct->id}}">{{$ct->TenCongTy}}</option>
                                    
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="txtSoLuong" placeholder="Điền số lượng"  value="{{$chitietphieu->SoLuong}}" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị đếm</label>
                                <select class="form-control" name="txtDVD"  value="{{$chitietphieu->DonViDem}}">
                                @foreach($donvidem as $dvd)
                                    <option
                                    @if ($chitietphieu->DonViDem==$dvd->ID_DVD)
                                    {{"selected"}}
                                    @endif
                                    value="{{$dvd->ID_DVD}}">{{$dvd->Ten_DVD}}</option>
                                    
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="txtDonGia" placeholder="Điền ghi chú" value="{{$chitietphieu->DonGia}}"/>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="txtGhiChu" placeholder="Điền ghi chú" value=" {{$chitietphieu->GhiChu}}" />
                            </div>

                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection        
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">THÊM
                            <small>Chi Tiết Phiếu</small>
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
                        <form action="admin/danhsachphieu/themchitiet" method="POST" enctype= "multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Chọn số sản phẩm muốn thêm</label>
                                <select class="form-control " id="row_product" name="row_product">
                                @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lô hàng</label>
                                <select class="form-control ID_LoHang" name="ID_LoHang">
                                @foreach($phieunhapkho as $phnk)
                                    <option value="{{$phnk->STT_NhapKho}}">{{$phnk->GhiChu}}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div id="form_1">
                            </div>
                            <div id="form">
                            <!-- <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="txtTenSP" placeholder="Điền tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>ID Sản Phẩm</label>
                                <input class="form-control" name="ID_SanPham" placeholder="Điền ID sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="txtAnh" placeholder="Chọn hình" value="" />
                            </div>
                            <div class="form-group">
                                <label>Tên Công Ty</label>
                                <select class="form-control" name="txtTenCongTy">
                                @foreach($congty as $ct)
                                    <option value="{{$ct->id}}">{{$ct->TenCongTy}}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="txtSoLuong" placeholder="Điền số lượng" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị đếm</label>
                                <select class="form-control" name="txtDVD">
                                @foreach($donvidem as $dvd)
                                    <option value="{{$dvd->ID_DVD}}">{{$dvd->Ten_DVD}}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="txtDonGia" placeholder="Điền ghi chú" value="" />
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input class="form-control" name="txtGhiChu" placeholder="Điền ghi chú" value="" />
                            </div>

                            <hr> -->
                            </div>
                            
                            <button type="button" class="btn btn-default abc">Thêm</button>
                            <button type="submit" class="btn btn-default def" disabled="">Xác Nhận</button>
                            <button type="reset" class="btn btn-default">Xóa dữ liệu</button>
                        </form>
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
        $("#row_product").change(function(){
            var i=$(this).val();
            $.get("admin/ajax/row_product/"+i,function(form){
                $("#form").html(form);
            });
        });
    });
    $('.abc').click(function(){
       // $('.txtAnh'+i).val(),
        var row_product = $('#row_product').val();
        var ab = [];
        var random=Math.random().toString(36).substring(9);
        var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
        var random4_name=random+filename;
        for(var i=1;i<=row_product;i++){
            a = $('.ID_LoHang').val()+';'+$('.a'+i).val()+';'+$('.ID_SanPham'+i).val()+';'+random4_name+';'+$('.txtTenCongTy'+i).val()+';';
            a += $('.txtSoLuong'+i).val()+';'+$('.txtDVD'+i).val()+';'+$('.txtDonGia'+i).val()+';'+$('.txtGhiChu'+i).val();
            ab.push(a); 
        }
        $(".def").removeAttr('disabled');
        $.get("admin/ajax/row_value/"+ab,function(data){
                $("#form_1").html(data);
        });
        // location.href = 'admin/danhsachphieu/getproduct/'+ab;
    });
    </script>

@endsection
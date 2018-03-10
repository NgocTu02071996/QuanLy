@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH
                            <small>SẢN PHẨM</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}} 
                        </div>
                    @endif  
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>ID Phiếu</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Ảnh</th>
                                <th>Tên Công Ty</th>
                                <th>Số Lượng</th>
                                <th>Đơn Vị Đếm</th>
                                <th>Ghi Chú</th>
                                <th>Duyệt</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitietphieu as $ctp)
                            <tr class="even gradeC" align="center">
                                <td>{{$ctp->id}}</td>
                                <td>{{$ctp->ID_Phieu}}</td>
                                <td>{{$ctp->TenSanPham}}</td>
                                <td><img width="100px" heigh="100px" src="upload/img_detail/img_product/{{$ctp->Anh}}"/></td>
                                <td>{{$ctp->congty->TenCongTy}}</td>
                                <td>{{$ctp->SoLuong}}</td>
                                <td>{{$ctp->donvidem->Ten_DVD}}</td>
                                <td>{{$ctp->GhiChu}}</td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw duyet"></i> <a href="admin/danhsachphieu/duyetchitiet/{{$ctp->ID_SanPham}}/{{$ctp->id}}">Duyệt</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/danhsachphieu/xoachitiet/{{$ctp->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhsachphieu/suachitiet/{{$ctp->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection        
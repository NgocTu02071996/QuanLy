@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH
                            <small>PHIẾU NHẬP KHO</small>
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
                                <th>ID</th>
                                <th>ID Phiếu</th>
                                <th>Ngày</th>
                                <th>ID_Tài Khoản</th>
                                <th>Ghi Chú</th>
                                <th>Chi Tiết</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phieunhapkho as $phnk)
                            <tr class="even gradeC" align="center">
                                <td>{{$phnk->STT_NhapKho}}</td>
                                <td>{{$phnk->ID_Phieu}}</td>
                                <td>{{$phnk->Ngay}}</td>
                                <td>{{$phnk->taikhoan->ID_Name}}</td>
                                <td>{{$phnk->GhiChu}}</td>
                                <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="admin/danhsachphieu/chitiet/{{$phnk->STT_NhapKho}}">Chi Tiết</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/danhsachphieu/xoa/{{$phnk->STT_NhapKho}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhsachphieu/sua/{{$phnk->STT_NhapKho}}">Edit</a></td>
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
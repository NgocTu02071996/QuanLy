@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH
                            <small>CÔNG TY</small>
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
                                <th>Tên Công Ty</th>
                                <th>Mô tả</th>
                                <th>Ảnh</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($congty as $ct)
                            <tr class="even gradeC" align="center">
                                <td>{{$ct->id}}</td>
                                <td>{{$ct->TenCongTy}}</td>
                                <td>{{$ct->MoTa}}</td>
                                <td><img width="100px" heigh="100px" src="upload/img_company/{{$ct->Anh}}"/></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/congty/xoa/{{$ct->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/congty/sua/{{$ct->id}}">Edit</a></td>
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
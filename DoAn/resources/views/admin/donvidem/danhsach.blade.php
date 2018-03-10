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
                                <th>Tên Đơn Vị Đếm</th>
                                <th>Mô tả</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donvidem as $dvd)
                            <tr class="even gradeC" align="center">
                                <td>{{$dvd->ID_DVD}}</td>
                                <td>{{$dvd->Ten_DVD}}</td>
                                <td>{{$dvd->MoTa}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donvidem/xoa/{{$dvd->ID_DVD}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donvidem/sua/{{$dvd->ID_DVD}}">Edit</a></td>
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
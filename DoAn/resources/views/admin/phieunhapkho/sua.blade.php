@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa
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
                        <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Loại Phiếu</label>
                                <select class="form-control" name="ID_Phieu">
                                @foreach($phieu as $ph)
                                    <option
                                    @if ($phieunhapkho->ID_Phieu==$ph->ID_Phieu)
                                    {{"selected"}}
                                    @endif
                                    value="{{$ph->ID_Phieu}}">{{$ph->Ten_Phieu}}</option>
                                    
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi Chú</label>
                                <input class="form-control" name="txtGhiChu" placeholder="Ghi chú" value="{{$phieunhapkho->GhiChu}}" />
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
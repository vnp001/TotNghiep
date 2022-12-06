@extends('index')
@section('content')
<div class=" row page-titles shadow-lg mx-0">
    <div class="col-sm-6 p-md-0">
        <div style="display:flex;">
            <h3>Sửa văn bản</h3>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('document')}}">văn bản</a></li>
            <li class="breadcrumb-item active"><a href="">sửa</a></li>
        </ol>
    </div>
</div>

@if ( Session::has('error') )
<div class="alert mb-3 alert-danger solid alert-dismissible fade show">
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>{{ Session::get('error') }}</strong>
</div>
@endif
<div class="container " style="margin-top: -25px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @foreach ($docs as $doc)                    
                <form action="/admin/document/update/{{$doc->Id_VanBan}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Tên văn bản</label>
                            <input type="text" name="tenvanban" class="form-control" value="{{$doc->TenVanBan}}" placeholder="Tên văn bản" required>
                        </div>                   
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Loại văn bản</label>
                            <select name="loaivanban" class="form-control" id="">
                                
                                <option value="">Mã loại văn bản - loại văn bản</option>   
                                @foreach ($typeofdocs as $typeofdoc)
                                    @if ($typeofdoc->Id_LoaiVanBan == $doc->Id_LoaiVanBan)
                                        <option selected value="{{$typeofdoc->Id_LoaiVanBan}}">{{$typeofdoc->Id_LoaiVanBan}} - {{$typeofdoc->TenLoaiVanBan}}</option> 
                                    @else
                                        <option value="{{$typeofdoc->Id_LoaiVanBan}}">{{$typeofdoc->Id_LoaiVanBan}} - {{$typeofdoc->TenLoaiVanBan}}</option>                                         
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Số VB</label>
                            <input type="number" value="{{$doc->soVB}}" disabled  class="form-control" >
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Ngày</label>
                            <input type="date"  value="{{$doc->Ngay}}" name="ngay" class="form-control" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Người kí</label>
                            <select name="nguoiki" class="form-control" id="">
                                <option value="">Người kí</option>   
                                @foreach ($employees as $employee)
                                    @if ($employee->Id_NhanVien == $doc->Id_NhanVien )
                                        <option selected value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>   
                                    @else
                                        <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    <div class="form-row">  
                        <div class="col-xl-12 form-group col-xxl-12" required>
                        <div class="card-body">
                            <label>Nội dung</label>
                            <textarea  class="summernote" name="noidung" id="">{{$doc->NoiDung}}</textarea>
                        </div>
                        </div>
                    </div> 
                    <button type="submit" style="margin-left: 420px; width:150px;height:50px;font-size: 20px;" class="btn  btn-primary">Sửa văn bản</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
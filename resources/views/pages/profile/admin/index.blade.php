@extends('index')
@section('content')
<style>
    .test{
    background-image:
    }
</style>
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Thông tin các nhân</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Home</a></li>
                <li class="breadcrumb-item active" ><a href="{{route('profileadmin')}}">Thông tin cá nhân</a></li>
            </ol>
        </div>
    </div>
    @foreach ($dataadmin as $value)
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-content">
                    <div class="row mt-1 mb-1">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-5 mt-5">
                                    <img src="{{ asset('./images/'.$value->HinhAnh)}}" width="220" height="220" class="rounded-circle" alt="">
                                </div>
                                <div class="col-lg-7 mt-5" style="border-right: 2px dashed #ccc;">
                                    <h4 class="mt-2">{{$value->Ho.' '.$value->Ten}}</h4>
                                    <h7 class="" style="font-size: ">Phòng ban:{{' '.$value->phongban->TenPhongBan}}</h7>
                                    <h7 class="">Chức vụ:{{' '.$value->chucvu->TenChucVu}}</h7>
                                    <h5 class="mt-3">Mã nhân viên:{{' '.$value->Id_NhanVien}}</h5>
                                    <h7>Ngày vào trường:{{' '.\Carbon\Carbon::parse($value->NgayVaoTruong)->format('d-m-Y')}}</h7><br>
                                    <h7>Bắt đầu công tác:{{' '.\Carbon\Carbon::parse($value->BatDauCongTac)->format('d-m-Y')}}</h7>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 w-auto ml-5">
                            <ul class="mt-2">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Ngày sinh
                                        </div>
                                        <div class="col-lg-7">
                                            {{' '.\Carbon\Carbon::parse($value->NgaySinh)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Giới tính
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->GioiTinh}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Số điện thoại
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->SDT}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Dân tộc
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->DanToc}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Email
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->Email}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Địa chỉ
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->DiaChi}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Nơi sinh
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->NoiSinh}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Quê quán
                                        </div>
                                        <div class="col-lg-7">
                                            {{$value->QueQuan}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Đã vào đảng
                                        </div>
                                        <div class="col-lg-7">
                                          @if ($value->DaVaoDang == 1)
                                              Đã vào đảng
                                          @else
                                            chưa vào đảng
                                          @endif
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Biên chế
                                        </div>
                                        <div class="col-lg-7">
                                            @if ($value->DaVaoDang == 1)
                                                Đã vào biên chế
                                            @else
                                                chưa vào biên chế
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-0">
                            {{-- <a href="" style="color: black" data-toggle="modal" data-target="#modalThongTin"><i class="mdi mdi-border-color" style="font-size:30px"></i></a> --}}
                        </div>
                        {{-- start model thong tin --}}
                        {{-- <form action="{{ route('update',['id'=>$value->Id_NhanVien])}}" method="post">
                            @csrf
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-content p-3 col-lg-12">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Thông tin nhân viên: {{ Illuminate\Support\Str::lower($value->Ho.' '.$value->Ten)}} </h2>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-lg-12 mb-2">
                                                <dt>Thông tin nhân viên</dt>
                                            </div>
                                            <div class="col-md-6 lg-3  mb-3 " style="display: flex">
                                                <div class="col-md-6 lg-3  mb-3">
                                                    <label >Họ</label>
                                                    <input type="text" name="ho" class="form-control"  placeholder="Họ " value="{{$value->Ho}}"  required>
                                                </div>
                                                <div class=" col-md-6 lg-3 ml-3">
                                                    <label >Tên</label>
                                                    <input type="text" name="ten" class="form-control"  placeholder="tên nhân viên" value="{{$value->Ten}}"  required>
                                                </div>
                                            </div>
                                
                                            <div class="col-md-6 mb-3">
                                                <label >Ngày sinh</label>
                                                <input type="Date" class="form-control" placeholder="Ngày sinh" name="ngaysinh" value="{{$value->NgaySinh}}"  required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Giới tính</label>
                                                <select class="form-control" name="gioitinh">
                                                    <option value="{{$value->GioiTinh}}">{{$value->GioiTinh}}</option>
                                                    <option >---Chọn---</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label >Dân tộc</label>
                                                <input type="text" class="form-control"placeholder="Dân tộc" value="{{$value->DanToc}}" name="dantoc" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Số điện thoại</label>
                                                <input type="text" class="form-control"placeholder="Số điện thoại" value="{{$value->SDT}}" name="sdt" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label >Email</label>
                                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{$value->Email}}"  required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Nơi sinh</label>
                                                <input type="text" class="form-control" placeholder="Nơi sinh" name="noisinh" value="{{$value->NoiSinh}}"  required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>CMND</label>
                                                <input type="number" class="form-control" placeholder="Chứng minh nhân dân" value="{{$value->CMND}}" name="cmnd"  required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Địa chỉ</label>
                                                <input type="text" class="form-control" placeholder="Địa chỉ"  name="diachi" value="{{$value->DiaChi}}" required>
                                               
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Quê quán</label>
                                                <input type="text" class="form-control" placeholder="Quê quán" name="quequan" value="{{$value->QueQuan}}"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <dt>chức vụ / phòng ban</dt>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6  mb-3">
                                                <label >Chức vụ</label>
                                                <select class="form-control" name="phongban">
                                                    <option value="{{$value->chucvu->Id_ChucVu}}">{{$value->chucvu->TenChucVu}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listchucvu as $valuechucvu)
                                                        <option value="{{$valuechucvu->Id_ChucVu}}">{{$valuechucvu->TenChucVu}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6  mb-3">
                                                <label >Phòng ban</label>
                                                <select class="form-control" name="chucvu">
                                                    <option value="{{$value->phongban->Id_PhongBan}}">{{$value->phongban->TenPhongBan}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listphongban as $valuephongban)
                                                        <option value="{{$valuephongban->Id_PhongBan}}">{{$valuephongban->TenPhongBan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <dt>Trình độ</dt>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Trình độ chuyên môn</label>
                                                <select class="form-control" name="trinhdochuyenmon" >
                                                    <option value="{{$value->trinhdochuyenmon->Id_TDChuyenMon}}">{{$value->trinhdochuyenmon->TrinhDo}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listtdchuyenmon as $valuetdcm)
                                                        <option value="{{$valuetdcm->Id_TDChuyenMon}}">{{$valuetdcm->TrinhDo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Trình độ tin học</label>
                                                <select class="form-control" name="tinhoc">
                                                    <option value="{{$value->tinhoc->Id_TinHoc}}">{{$value->tinhoc->TrinhDo}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listtdtinhoc as $valuetinhoc)
                                                        <option value="{{$valuetinhoc->Id_TinHoc}}">{{$valuetinhoc->TrinhDo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Trình độ ngoại ngữ</label>
                                                <select class="form-control" name="ngoaingu" >
                                                    <option value="{{$value->ngoaingu->Id_NgoaiNgu}}">{{$value->ngoaingu->TrinhDo}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listtdngoaingu as $valuengoaingu)
                                                        <option value="{{$valuengoaingu->Id_NgoaiNgu}}">{{$valuengoaingu->TrinhDo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Trình độ chính trị</label>
                                                <select class="form-control" name="chinhtri">
                                                    <option value="{{$value->chinhtri->Id_ChinhTri}}">{{$value->chinhtri->TrinhDo}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listchinhtri as $valuechinhtri)
                                                        <option value="{{$valuechinhtri->Id_ChinhTri}}">{{$valuechinhtri->TrinhDo}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <dt>Trường</dt>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Đơn vị</label>
                                                <select class="form-control" name="donvi" >
                                                    <option value="{{$value->donvi->Id_DonVi}}">{{$value->donvi->TenDonVi}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listdonvi as $valuedv)
                                                        <option value="{{$valuedv->Id_DonVi}}">{{$valuedv->TenDonVi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Bộ Môn</label>
                                                <select class="form-control" name="bomon">
                                                    <option value="{{$value->bomon->Id_BoMon}}">{{$value->bomon->TenBoMon}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listbomon as $valuebomon)
                                                        <option value="{{$valuebomon->Id_BoMon}}">{{$valuebomon->TenBoMon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                   
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Biên chế</label>
                                                <select class="form-control" name="bienche">
                                                    @if ($value->DaVaoDang==1)
                                                        <option value="1">Đã có biên chế</option>
                                                    @else
                                                        <option value="0">chưa có biên chế</option>
                                                    @endif
                                                    <option >--Chọn--</option>
                                                    <option value="1">Đã có biên chế</option>
                                                    <option value="0">chưa có biên chế</option>
                                                </select> 
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Đã vào đảng</label>
                                                <select class="form-control" name="davaodang">
                                                    @if ($value->DaVaoDang==1)
                                                        <option value="1">Đã vào đảng</option>
                                                    @else
                                                        <option value="0">Chưa vào đảng</option>
                                                    @endif
                                                    <option >--Chọn--</option>
                                                    <option value="1">Đã vào đảng</option>
                                                    <option value="0">Chưa vào đảng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label >Bắt đầu công tác</label>
                                                <input type="date" class="form-control"  value="{{$value->BatDauCongTac}}" placeholder="Bắt đầu công tác" name="batdaucongtac"required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Chuyên môn đào tạo</label>
                                                <select class="form-control" name="chuyenmon">
                                                    <option value="{{$value->chuyenmon->Id_ChuyenMon}}">{{$value->chuyenmon->TenChuyenMon}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listchuyenmon as $valuechuyenmon)
                                                        <option value="{{$valuechuyenmon->Id_ChuyenMon}}">{{$valuechuyenmon->TenChuyenMon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label>Ngày vào trường</label>
                                                <input type="date" class="form-control"  value="{{$value->NgayVaoTruong}}" placeholder="" name="ngayvt"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <dt>Khác</dt>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3 " >
                                                <label >Tên Tài Khoản</label>
                                                <input type="text" class="form-control" value="{{$value->TenTk}}"  placeholder="Tên tài khoản" name="tentk"  required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label >Mật khẩu</label>
                                                <input type="text" class="form-control" value="{{$value->MatKhau}}"  placeholder="Mật khẩu" name="matkhau"  required>
                                          
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label>Phân quyền</label>
                                                <select class="form-control" name="phanquyen">
                                                    <option value="{{$value->phanquyen->Id_PhanQuyen}}" >{{$value->phanquyen->TenQuyen}}</option>
                                                    <option >--Chọn--</option>
                                                    @foreach ($listphanquyen as $valuelistphanquyen)
                                                        <option value="{{$valuelistphanquyen->Id_PhanQuyen}}">{{$valuelistphanquyen->TenQuyen}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                            <div class="w-25 mr-2"></div>
                                            <div class="w-75 d-flex">
                                                <input type="submit" name="btn" class="btn btn-success w-40" value="Cập nhập">
                                                <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form> --}}
                        {{-- end model thong tin --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    Thông tin chi tiết
                </div>
                <div class="card-content">
                    <ul class="mt-2 ml-5">
                        <li class="">
                            <div class="row">
                                <div class="col-lg-5">
                                    Chuyên môn
                                </div>
                                <div class="col-lg-7">
                                    {{$value->chuyenmon->TenChuyenMon}}
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <div class="row">
                                <div class="col-lg-5">
                                    Bộ môn
                                </div>
                                <div class="col-lg-7">
                                    {{$value->bomon->TenBoMon}}
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <div class="row">
                                <div class="col-lg-5">
                                    Đơn vị
                                </div>
                                <div class="col-lg-7">
                                    {{$value->donvi->TenDonVi}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    Trình độ
                </div>
                <div class="card-content">
                    <div class="col-lg-11">
                        <ul class="mt-2 ml-5">
                            <li>
                                <div class="row">
                                    <div class="col-lg-5">
                                        Chuyên môn
                                    </div>
                                    <div class="col-lg-7">
                                        {{$value->trinhdochuyenmon->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Tin học
                                    </div>
                                    <div class="col-lg-7">
                                        {{$value->tinhoc->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Chính trị
                                    </div>
                                    <div class="col-lg-7">
                                        {{$value->chinhtri->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Ngoại ngữ 
                                    </div>
                                    <div class="col-lg-7">
                                        {{$value->ngoaingu->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-1">
                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    Khen thưởng
                </div>
                <div class="card-content">
                    <ul class="ml-4">
                        @if ($discipline->isEmpty())
                            <li class="mt-3"><p>Hiện tại chưa có thành tựu </p></li>
                        @else
                        @foreach ($laudatory as $laudatoryAdmin)
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p style="color: #616161;" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($laudatoryAdmin->Ngay)->format('d/ m/ Y')}}</p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="text-left" >{!! $laudatoryAdmin->MoTa !!}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    Kĩ luật
                </div>
                <div class="card-content">
                    <ul class="ml-4">
                        @if ($discipline->isEmpty())
                            <li class="mt-3"><p>Hiện tại chưa bị kỹ luật</p></li>
                        @else
                        @foreach ($discipline as $disciplineAdmin)
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p style="color: #616161;" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($disciplineAdmin->Ngay)->format('d/ m/ Y')}}</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="text-left" >{!! $disciplineAdmin->MoTa !!}</div>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

</div>
@endsection
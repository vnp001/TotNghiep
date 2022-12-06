@extends('index')
@section('content')
<div class=" row page-titles shadow-lg mx-0">
    <div class="col-sm-6 p-md-0">
        <div style="display:flex;">
            <h3> Sửa nhân viên</h3>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listemployee')}}">nhân viên</a></li>
            <li class="breadcrumb-item active"><a href="">sửa</a></li>
        </ol>
    </div>
</div>
@if ( Session::has('success') )
	<div class="alert mb-3 alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif


@if ( Session::has('error') )
	<div class="alert mb-3 alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ( Session::has('error') )
<div class="alert mb-3 alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
                                {{-- NỘI DUNG TRANG EMPLOYEE--}}
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->

     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    <div class="row">
        @foreach($employee as $value)
        <div class="container py-5 card" style="margin-top: -20px; margin-left: 50px;">
                <form  method="POST" action="{{route('update',['id'=>$value->Id_NhanVien])}}">
                    {{-- @method('PUT') --}}
                    @csrf
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
                            <input type="Date" class="form-control" placeholder="Ngày sinh" name="ngaysinh" value="{{$value->NgaySinh}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Giới tính</label>
                            <select class="form-control" name="gioitinh">
                                <option value="{{$value->GioiTinh}}" >{{$value->GioiTinh}}</option>
                                <option >---Chọn---</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Dân tộc</label>
                            <input type="text" class="form-control"placeholder="Dân tộc" name="dantoc" value="{{$value->DanToc}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label >Số điện thoại</label>
                            <input type="text" class="form-control"placeholder="Số điện thoại" name="sdt" value="{{$value->SDT}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$value->Email}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label >Nơi sinh</label>
                            <input type="text" class="form-control" placeholder="Nơi sinh" name="noisinh" value="{{$value->NoiSinh}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>CMND</label>
                            <input type="text" class="form-control" placeholder="Chứng minh nhân dân" name="cmnd" value="{{$value->CMND}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label >Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ"  name="diachi" value="{{$value->DiaChi}}" required>
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Quê quán</label>
                            <input type="text" class="form-control" placeholder="Quê quán" name="quequan" value="{{$value->QueQuan}}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <dt>chức vụ / phòng ban</dt>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6  mb-3">
                            <label >Chức vụ</label>
                            <select class="form-control" name="phongban">
                                <option value="{{$value->chucvu->Id_ChucVu}}" >{{$value->chucvu->TenChucVu}}</option>
                                <option >--Chọn--</option>
                                @foreach ($listchucvu as $valuechucvu)
                                    <option value="{{$valuechucvu->Id_ChucVu}}">{{$valuechucvu->TenChucVu}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label >Phòng ban</label>
                            <select class="form-control" name="chucvu">
                                <option value="{{$value->phongban->Id_PhongBan}}" >{{$value->phongban->TenPhongBan}}</option>
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
                                <option value="{{$value->trinhdochuyenmon->Id_TDChuyenMon}}" >{{$value->trinhdochuyenmon->TrinhDo}}</option>
                                <option >--Chọn--</option>
                                @foreach ($listtdchuyenmon as $valuetdcm)
                                    <option value="{{$valuetdcm->Id_TDChuyenMon}}">{{$valuetdcm->TrinhDo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Trình độ tin học</label>
                            <select class="form-control" name="tinhoc">
                                <option value="{{$value->tinhoc->Id_TinHoc}}" >{{$value->tinhoc->TrinhDo}}</option>
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
                                <option value="{{$value->ngoaingu->Id_NgoaiNgu}}" >{{$value->ngoaingu->TrinhDo}}</option>
                                <option >--Chọn--</option>
                                @foreach ($listtdngoaingu as $valuengoaingu)
                                    <option value="{{$valuengoaingu->Id_NgoaiNgu}}">{{$valuengoaingu->TrinhDo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Trình độ chính trị</label>
                            <select class="form-control" name="chinhtri">
                                <option value="{{$value->chinhtri->Id_ChinhTri}}" >{{$value->chinhtri->TrinhDo}}</option>
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
                            {{-- <label >Đơn vị</label>
                            <input type="text" class="form-control" placeholder="Đơn vị" name="suadonvi" value="{{$value->DonVi}}" required> --}}
                            <label >Đơn vị</label>
                            <select class="form-control" name="donvi" >
                                <option value="{{$value->donvi->Id_DonVi}}" >{{$value->donvi->TenDonVi}}</option>
                                <option >--Chọn--</option>
                                @foreach ($listdonvi as $valuedv)
                                    <option value="{{$valuedv->Id_DonVi}}">{{$valuedv->TenDonVi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bộ Môn</label>
                            <select class="form-control" name="bomon">
                                <option value="{{$value->bomon->Id_BoMon}}" >{{$value->bomon->TenBoMon}}</option>
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
                            <!-- <input type="text" class="form-control" placeholder="Địa chỉ" name="themdiachi" required> -->
                            <select class="form-control" name="bienche">
                                @if ($value->BienChe == '1')
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
                            <!-- <input type="date" class="form-control" placeholder="Quê quán" name="themquequan" required> -->
                            <select class="form-control" name="davaodang">
                                @if ($value->DaVaoDang == '1')
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
                            <input type="date" class="form-control" placeholder="Bắt đầu công tác" name="batdaucongtac" value="{{$value->BatDauCongTac}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Chuyên môn đào tạo</label>
                            <select class="form-control" name="chuyenmon">
                                <option value="{{$value->chuyenmon->Id_ChuyenMon}}" >{{$value->chuyenmon->TenChuyenMon}}</option>
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
                            <input type="date" class="form-control" placeholder="" name="ngayvt" value="{{$value->NgayVaoTruong}}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <dt>Khác</dt>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3 " >
                            <label >Tên Tài Khoản</label>
                            <input type="text" class="form-control"  placeholder="Tên tài khoản" name="tentk"  value="{{$value->TenTk}}" required>
                      
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Mật khẩu</label>
                            <input type="text" class="form-control"  placeholder="Mật khẩu" name="matkhau"  value="{{$value->MatKhau}}" required>
                      
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
                    <div class="mb-4 mt-4 " style="margin-left: 400px;">
                        <input type="submit" name="btn" class="btn btn-primary" type="submit" value="Sửa nhân viên">
                    </div>
                    @endforeach
                    </form>
             </div>
    </div>    
</div>
@endsection

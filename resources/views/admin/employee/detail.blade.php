@extends('index')
@section('content')

@foreach ($employee as $detail)
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Thông tin chi tiết nhân viên: {{ Illuminate\Support\Str::lower($detail->Ho.' '.$detail->Ten)}}</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Home</a></li>
                <li class="breadcrumb-item active" ><a href="{{route('profileadmin')}}">Chi tiết</a></li>
            </ol>
        </div>
    </div>
    @if ( Session::has('success') )
        <div class="alert mb-3 alert-primary solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-account-search"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button> {{ Session::get('success') }}
        </div>
    @endif


    @if ( Session::has('error') )
        <div class="alert mb-3 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-content">
                    <div class="row mt-1 mb-1">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-5 mt-5">
                                    <img src="{{ asset('./images/'.$detail->HinhAnh)}}" width="220" height="220" class="rounded-circle" alt="">
                                </div>
                                <div class="col-lg-7 mt-5" style="border-right: 2px dashed #ccc;">
                                    <h4 class="mt-2">{{$detail->Ho.' '.$detail->Ten}}</h4>
                                    <h7 class="">Phòng ban:{{' '.$detail->phongban->TenPhongBan}}</h7><br>
                                    <h7 class="">Chức vụ:{{' '.$detail->chucvu->TenChucVu}}</h7><br>
                                    <h5 class="mt-3">Mã nhân viên:{{' '.$detail->Id_NhanVien}}</h5>
                                    <h7>Ngày vào trường:{{' '.\Carbon\Carbon::parse($detail->NgayVaoTruong)->format('d-m-Y')}}</h7><br>
                                    <h7>Bắt đầu công tác:{{' '.\Carbon\Carbon::parse($detail->BatDauCongTac)->format('d-m-Y')}}</h7>
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
                                            {{' '.\Carbon\Carbon::parse($detail->NgaySinh)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Giới tính
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->GioiTinh}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Số điện thoại
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->SDT}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Dân tộc
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->DanToc}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Email
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->Email}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Địa chỉ
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->DiaChi}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Nơi sinh
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->NoiSinh}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Quê quán
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->QueQuan}}
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Đã vào đảng
                                        </div>
                                        <div class="col-lg-7">
                                          @if ($detail->DaVaoDang == 1)
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
                                            @if ($detail->DaVaoDang == 1)
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
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}
                            <a href="" style="color: black" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="mdi mdi-border-color" style="font-size:30px"></i></a>
                            {{-- <a href="" style="color: black" data-toggle="modal" data-target="#modalThongTin"><i class="mdi mdi-border-color" style="font-size:30px"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow-lg">
                <div class="card-header">
                    Thông tin chi tiết về chuyên môn
                </div>
                <div class="card-content">
                    <ul class="mt-2 ml-5">
                        <li class="mt-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    Chuyên môn
                                </div>
                                <div class="col-lg-7">
                                    {{$detail->chuyenmon->TenChuyenMon}}
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    Bộ môn
                                </div>
                                <div class="col-lg-7">
                                    {{$detail->bomon->TenBoMon}}
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    Đơn vị
                                </div>
                                <div class="col-lg-7">
                                    {{$detail->donvi->TenDonVi}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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
                                        {{$detail->trinhdochuyenmon->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Tin học
                                    </div>
                                    <div class="col-lg-7">
                                        {{$detail->tinhoc->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Chính trị
                                    </div>
                                    <div class="col-lg-7">
                                        {{$detail->chinhtri->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Ngoại ngữ 
                                    </div>
                                    <div class="col-lg-7">
                                        {{$detail->ngoaingu->TrinhDo}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    Thống kê Nhân viên
                </div>
                <div class="card-content">
                    <div class="col-lg-11">
                        <ul class="mt-2 ml-5">
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Tổng ngày làm 
                                    </div>
                                    <div class="col-lg-7">
                                        {{$countDayWork}}
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-5">
                                        Tổng giờ làm
                                    </div>
                                    <div class="col-lg-7">
                                        {{$totalTime[0]->tonggio}}
                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-2"></div> --}}
        <div class="col-lg-7">
            <div class="card shadow-lg">
                <div class="card-header">
                    Thống kê lương
                </div>
                <div class="card-content m-2">
                    <div class="col-lg-12">
                        <table  class="table mt-2 table-striped table-bordered w-auto" >
                            <thead class="text-center text-nowrap thead-light">
                                <tr>
                                    <td class="w-30">
                                        Tháng năm
                                    </td>
                                    <td class="w-10">
                                        Ngạch
                                    </td>
                                    <td class="w-10">
                                        Bậc
                                    </td>
                                    <td class="w-20">
                                        Tổng ngày làm
                                    </td>
                                    <td class="w-20">
                                        Tổng lương
                                    </td>
                                </tr>
                            </thead>   
                            <tbody>
                             @foreach ($salaryEmployees as $salary)
                                <tr>
                                    <td class="text-center">
                                        {{
                                        'Tháng '.Carbon\Carbon::parse($salary->Ngay)->format('m').' Năm '.Carbon\Carbon::parse($salary->Ngay)->format('Y')
                                        }}
                                    </td>
                                    <td class="text-center">{{$salary->bacluong->Id_Ngach}}</td>
                                    <td class="text-center">{{$salary->bacluong->TenBac}}</td>
                                    <td class="text-center">{{$salary->TongNgayLam}}</td>
                                    <td class="text-center">{{$salary->TongLuong}}</td>
                                </tr>
                            @endforeach
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    Các khóa học tham gia
                </div>
                <div class="m-2 card-content">
                    <table  class="table mt-2 table-striped table-bordered w-auto" >
                        <thead class="text-center text-nowrap thead-light">
                            <tr>
                                <td class="w-5">
                                    STT
                                </td>
                                <td class="w-30">
                                    Tên Khóa học
                                </td>
                                <td class="w-20">
                                    Thời Gian
                                </td>
                                <td class="w-20">
                                    Kết quả
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trains as $stt=> $train)
                            <tr>
                                <td class="text-center">
                                    {{++$stt}}
                                </td>
                                <td class="text-left">
                                    {{$train->daotao->TenDaoTao}}
                                </td>
                                <td class="text-center">
                                    {{Carbon\Carbon::parse($train->daotao->Ngay)->format('d-m-Y')}}
                                </td>
                                <td class="text-center">
                                    {{$train->KetQua}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow-lg">
                <div class="card-header">
                    Đánh giá nhân viên
                </div>
                <div class="card-content m-2">
                    <div class="col-lg-12">
                        <table  class="table mt-2 table-striped table-bordered w-auto" >
                            <thead class="text-center text-nowrap thead-light">
                            <tr>
                                <td class="w-20">
                                    Người đánh giá
                                </td>
                                <td class="w-40">
                                    Nội dung
                                </td>
                                <td class="w-20">
                                    Ngày
                                </td>
                                <td class="w-20">
                                    File
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluationOfEmployees as $evaluationOfEmployee)
                                    <tr>
                                        <td class="text-left">{{$evaluationOfEmployee->NguoiDanhGia}}</td>
                                        <td class="text-left">{!!$evaluationOfEmployee->NoiDung!!}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse($evaluationOfEmployee->Ngay)->format('d-m-Y')}}</td>
                                        <td class="text-left">
                                            @switch(pathinfo($evaluationOfEmployee->File, PATHINFO_EXTENSION))
                                            @case('')
                                                @break    
                                            @case('docx')
                                                <img src="{{asset('./icons/word.png')}}"style="height: 15px;width: 15px;" alt="word">
                                                @break
                                            @case('xlsx')
                                                <img src="{{asset('./icons/excel.png')}}"style="height: 15px;width: 15px;" alt="word">
                                                @break
                                            @default
                                                <img src="{{asset('./icons/file.png')}}" style="height: 15px;width: 15px;"alt="word">
                                                @break
                                        @endswitch
                                        <a target='_blank' style="color: black;" href='{{ asset('./folderEvalution/'.$evaluationOfEmployee->File)}}'>  {{$evaluationOfEmployee->File}}</a>
                                        </td>
                                        {{-- <td>{{$evaluationOfEmployee->File}}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        @if ($laudatoryEmployee->isEmpty())
                            <li class="mt-3"><p>Hiện tại nhân viên chưa đạt thành tựu</p></li>
                        @else
                            @foreach ($laudatoryEmployee as $laudatoryDetail)
                            <li class="mt-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p style="color: #616161;" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($laudatoryDetail->Ngay)->format('d/ m/ Y')}}</p>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="text-left" >   
                                         <?php 
                                             $string = preg_replace("/&nbsp;/",'', $laudatoryDetail->MoTa);
                                            echo $string;
                                         ?>
                                        </div>
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
                    Kỹ luật
                </div>
                <div class="card-content">
                    <ul class="ml-4">
                        @if ($disciplineEmployee->isEmpty())
                         <li class="mt-3"><p>Hiện tại nhân viên chưa bị kỹ luật</p></li>
                        @else
                            @foreach ($disciplineEmployee as $disciplineDetail)
                                <li class="mt-2">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p style="color: #616161;" ><i class="fa fa-circle-o"></i> {{ \Carbon\Carbon::parse($disciplineDetail->Ngay)->format('d/ m/ Y')}}</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="text-left" >
                                                <?php 
                                                    $string = preg_replace("/&nbsp;/",'', $disciplineDetail->MoTa);
                                                    echo $string;
                                                ?>
                                            </div>
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
</div>
<!-- Large modal -->
    {{-- start model thong tin --}}
    <form action="{{ route('update',['id'=>$detail->Id_NhanVien])}}" method="post">
    @csrf
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-content p-3 col-lg-12">
                <div class="flex-row d-flex justify-content-center mb-2">
                    <h2 class="text-info">Thông tin nhân viên: {{ Illuminate\Support\Str::lower($detail->Ho.' '.$detail->Ten)}} </h2>
                </div>
                <div class="form-row">
                    <div class="col-lg-12 mb-2">
                        <dt>Thông tin nhân viên</dt>
                    </div>
                    <div class="col-md-6 lg-3  mb-3 " style="display: flex">
                        <div class="col-md-6 lg-3  mb-3">
                            <label >Họ</label>
                            <input type="text" name="ho" class="form-control"  placeholder="Họ " value="{{$detail->Ho}}"  required>
                        </div>
                        <div class=" col-md-6 lg-3 ml-3">
                            <label >Tên</label>
                            <input type="text" name="ten" class="form-control"  placeholder="tên nhân viên" value="{{$detail->Ten}}"  required>
                        </div>
                    </div>
        
                    <div class="col-md-6 mb-3">
                        <label >Ngày sinh</label>
                        <input type="Date" class="form-control" placeholder="Ngày sinh" name="ngaysinh" value="{{$detail->NgaySinh}}"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Giới tính</label>
                        <select class="form-control" name="gioitinh">
                            <option value="{{$detail->GioiTinh}}">{{$detail->GioiTinh}}</option>
                            <option >---Chọn---</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Dân tộc</label>
                        <input type="text" class="form-control"placeholder="Dân tộc" value="{{$detail->DanToc}}" name="dantoc" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label >Số điện thoại</label>
                        <input type="text" class="form-control"placeholder="Số điện thoại" value="{{$detail->SDT}}" name="sdt" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{$detail->Email}}"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label >Nơi sinh</label>
                        <input type="text" class="form-control" placeholder="Nơi sinh" name="noisinh" value="{{$detail->NoiSinh}}"  required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>CMND</label>
                        <input type="number" class="form-control" placeholder="Chứng minh nhân dân" value="{{$detail->CMND}}" name="cmnd"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label >Địa chỉ</label>
                        <input type="text" class="form-control" placeholder="Địa chỉ"  name="diachi" value="{{$detail->DiaChi}}" required>
                       
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Quê quán</label>
                        <input type="text" class="form-control" placeholder="Quê quán" name="quequan" value="{{$detail->QueQuan}}"  required>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <dt>chức vụ / phòng ban</dt>
                </div>
                <div class="form-row">
                    <div class="col-md-6  mb-3">
                        <label >Chức vụ</label>
                        <select class="form-control" name="phongban">
                            <option value="{{$detail->chucvu->Id_ChucVu}}">{{$detail->chucvu->TenChucVu}}</option>
                            <option >--Chọn--</option>
                            @foreach ($listchucvu as $valuechucvu)
                                <option value="{{$valuechucvu->Id_ChucVu}}">{{$valuechucvu->TenChucVu}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label >Phòng ban</label>
                        <select class="form-control" name="chucvu">
                            <option value="{{$detail->phongban->Id_PhongBan}}">{{$detail->phongban->TenPhongBan}}</option>
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
                            <option value="{{$detail->trinhdochuyenmon->Id_TDChuyenMon}}">{{$detail->trinhdochuyenmon->TrinhDo}}</option>
                            <option >--Chọn--</option>
                            @foreach ($listtdchuyenmon as $valuetdcm)
                                <option value="{{$valuetdcm->Id_TDChuyenMon}}">{{$valuetdcm->TrinhDo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Trình độ tin học</label>
                        <select class="form-control" name="tinhoc">
                            <option value="{{$detail->tinhoc->Id_TinHoc}}">{{$detail->tinhoc->TrinhDo}}</option>
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
                            <option value="{{$detail->ngoaingu->Id_NgoaiNgu}}">{{$detail->ngoaingu->TrinhDo}}</option>
                            <option >--Chọn--</option>
                            @foreach ($listtdngoaingu as $valuengoaingu)
                                <option value="{{$valuengoaingu->Id_NgoaiNgu}}">{{$valuengoaingu->TrinhDo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Trình độ chính trị</label>
                        <select class="form-control" name="chinhtri">
                            <option value="{{$detail->chinhtri->Id_ChinhTri}}">{{$detail->chinhtri->TrinhDo}}</option>
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
                            <option value="{{$detail->donvi->Id_DonVi}}">{{$detail->donvi->TenDonVi}}</option>
                            <option >--Chọn--</option>
                            @foreach ($listdonvi as $valuedv)
                                <option value="{{$valuedv->Id_DonVi}}">{{$valuedv->TenDonVi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Bộ Môn</label>
                        <select class="form-control" name="bomon">
                            <option value="{{$detail->bomon->Id_BoMon}}">{{$detail->bomon->TenBoMon}}</option>
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
                            @if ($detail->DaVaoDang==1)
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
                            @if ($detail->DaVaoDang==1)
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
                        <input type="date" class="form-control"  value="{{$detail->BatDauCongTac}}" placeholder="Bắt đầu công tác" name="batdaucongtac"required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Chuyên môn đào tạo</label>
                        <select class="form-control" name="chuyenmon">
                            <option value="{{$detail->chuyenmon->Id_ChuyenMon}}">{{$detail->chuyenmon->TenChuyenMon}}</option>
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
                        <input type="date" class="form-control"  value="{{$detail->NgayVaoTruong}}" placeholder="" name="ngayvt"  required>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <dt>Khác</dt>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3 " >
                        <label >Tên Tài Khoản</label>
                        <input type="text" class="form-control" value="{{$detail->TenTk}}"  placeholder="Tên tài khoản" name="tentk"  required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Mật khẩu</label>
                        <input type="text" class="form-control" value="{{$detail->MatKhau}}"  placeholder="Mật khẩu" name="matkhau"  required>
                  
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Phân quyền</label>
                        <select class="form-control" name="phanquyen">
                            <option value="{{$detail->phanquyen->Id_PhanQuyen}}" >{{$detail->phanquyen->TenQuyen}}</option>
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
    </form>
    {{-- end model thong tin  --}}
@endforeach
@endsection
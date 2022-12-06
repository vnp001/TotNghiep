@extends('userindex')
@section('contentuser')

<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-4 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                </div>
                <div class="col-lg-3 mt-2 ml-5">
                    <h2 style="color: #593bdb">Thông tin cá nhân</h2>
                    
                </div>
                <div class="col-lg-4 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Thông tin cá nhân</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="mr-1 ml-1">
        @foreach ($datauser as $value)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content ml-2 mr-2 mt-3 mb-4">
                        <div class="row mt-1 mb-1">
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <img src="{{ asset('./images/'.$value->HinhAnh)}}" width="220" height="220" class="rounded-circle" alt="">
                                    </div>
                                    <div class="col-lg-7 mt-4" style="border-right: 2px dashed #ccc;">
                                        <h4 class="mt-2">{{$value->Ho.' '.$value->Ten}}</h4>
                                        <h7 class="">Phòng ban:{{' '.$value->phongban->TenPhongBan}}</h7>
                                        <h7 class="">Chức vụ:{{' '.$value->chucvu->TenChucVu}}</h7>
                                        <h5 class="mt-3">Mã nhân viên:{{' '.$value->Id_NhanVien}}</h5>
                                        <h7>Ngày vào trường:{{' '.\Carbon\Carbon::parse($value->NgayVaoTruong)->format('d-m-Y')}}</h7><br>
                                        <h7>Bắt đầu công tác:{{' '.\Carbon\Carbon::parse($value->BatDauCongTac)->format('d-m-Y')}}</h7>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <ul class="mt-2">
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
                            {{-- <li>
                                <div class="row">
                                    <div class="col-lg-5">
                                        Bắt đầu công tác
                                    </div>
                                    <div class="col-lg-7">
                                        {{\Carbon\Carbon::parse($value->BatDauCongTac)->format('d-m-Y')}}
                                    </div>
                                </div>
                            </li> --}}
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
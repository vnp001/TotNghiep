@extends('index')
@section('content')
<style>
    .a{
        font-size: 15px;
    }
    .b{
        font-size: 15px;
    }
</style>
                                {{-- NỘI DUNG TRANG HOME--}}
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <div style="display:flex;">
                <h3> Tổng quan </h3>
                <p class="mt-2 mb-0 ml-4">  Đồ án quản lý nhân sự Trường Đại Học Sư phạm Hồ Chí Minh</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Home</a></li>
                {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> --}}
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    
    {{-- START điểu kiện   --}}
@if (Session::has('welcome'))
    <div class="row">
        <div class="col-lg-3 col-sm-6 " style="margin-top: -25px;">
            <div class="page-titles shadow-lg">
                <div class="stat-digit font-weight-bold" style="color: #593bdb"><dt>{{ Session::get('welcome') }}</dt></div>
            </div>
        </div>
    </div>
@endif
@if (Session::has('comeback'))
    <div class="row">
        <div class="col-lg-3 col-sm-6 " style="margin-top: -25px;">
            <div class="page-titles shadow-lg">
                <div class="stat-digit" style="color: #593bdb"><dt>{{ Session::get('comeback') }}</dt></div>
            </div>
        </div>
    </div>
@endif
@if ( Session::has('success') )
<div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif


@if ( Session::has('error') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
@if ( Session::has('errorinput') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('errorinput') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
    {{-- END điểu kiện   --}}
    <div class="col-lg-12">
        <div class="d-flex flex-wrap">
            <div class="p-2 m-2">
                {{-- <div class="card"> --}}
                <!-- <h1>test</h1> -->
                <a href="{{ route('listemployee') }}" style="height: 120px; width: 250px; " class="shadow-lg btn btn-info">
                    <div style="display: flex;">
                            {{-- <div>
                                hien thi tong nhan vien
                            </div> --}}
                            <div  style="margin-top: 30px;margin-left: 5px;">
                                <span> Nhân viên</span>
                            </div>
                            <div style="margin-top: 20px;">
                                <i class="mdi mdi-account fa-3x" style="margin-left: 80px;"></i>
                                {{-- <img src="{{asset('./Images/user.png')}}"  alt="">   --}}
                            </div>
                    </div>
                    <div>
                            <p style="margin-top: -10px;">Danh sách nhân viên</p>
                    </div>
                </a>
            {{-- </div> --}}
        </div>
        <div class="p-2 m-2">
            {{-- <div class="card"> --}}
                <!-- <h1>test</h1> -->
                <a href="{{ route('create') }}" style="height: 120px; width: 250px; " class="shadow-lg btn btn btn-secondary">
                    <div style="display: flex;">
                            {{-- <div>
                                hien thi tong nhan vien
                            </div> --}}
                            <div  style="margin-top: 30px;margin-left: 5px;">
                                <span> Nhân viên</span>
                            </div>
                            <div style="margin-top: 20px;">
                                <i class="mdi mdi-account-plus fa-3x" style="margin-left: 80px;"></i>
                                {{-- <img src="{{asset('./Images/user.png')}}"  alt="">   --}}
                            </div>
                    </div>
                    <div>
                            <p style="margin-top: -10px;">Thêm nhân viên</p>
                    </div>
                </a>
            {{-- </div> --}}
        </div>
        <div class="p-2 m-2">
            {{-- <div class="card"> --}}
                <!-- <h1>test</h1> -->
                <a href="{{ route('exportlistemployee') }}" style="height: 120px; width: 250px;" class=" shadow-lg btn btn-success">
                    <!-- <form method="POST" action="xuatfiledanhsachNV.php"> -->
                    <div style="display: flex;">
                                <div>
                                    <p style=" font-size:20px"> </p>
                                </div>
                                <div  style="margin-top: 40px;margin-bottom: 20px;">
                                    <p style=" font-size:20px">Excel </p>
                                </div>
                                <div style="margin-top: 20px;">
                                    <i class="mdi mdi-file-excel fa-3x" style="margin-left: 80px;"></i>
                                    {{-- <img src="{{asset('./Images/excel.png')}}" style="margin-left: 80px;" alt="">   --}}
                                </div>
                                <!-- <input type="submit" name="export" class="btn btn-success" value="Xuất danh sách" /> -->
                        </div>
                        <div>
                                <p style="margin-top: -30px;">Danh sách nhân viên</p>
                        </div>
                    <!-- </form>  -->
                    </a> 
            {{-- </div> --}}
        </div>
        <div class="p-2 m-2">
            {{-- <div class=""> --}}
                <a href="{{ route('exportsalary')}}" style="height: 120px; width: 250px;" class=" shadow-lg btn btn-success">
                    <div style="display: flex;">
                            <div>
                                {{-- <p style=" font-size:20px"> Excel</p> --}}
                            </div>
                            <div  style="margin-top: 40px;margin-bottom: 20px;">
                                <p style=" font-size:20px">Excel </p>
                            </div>
                            <div style="margin-top: 20px;">
                                <i class="mdi mdi-file-excel fa-3x" style="margin-left: 80px;"></i>
                                {{-- <img src="{{asset('./Images/salary.png')}}"  alt="">   --}}
                            </div>
                    </div>
                    <div>
                            <p style="margin-top: -30px;">Danh sách lương nhân viên</p>
                    </div>  
                </a>    
            {{-- </div> --}}
        </div>
        <div class="p-2 m-2">
            <a href="" data-toggle="modal" data-target="#work" style="height: 120px; width: 250px;" class=" shadow-lg btn  btn-info">
                <div style="display: flex;">
                        <div>
                            <p style=" font-size:20px"> </p>
                        </div>
                        <div  style="margin-top: 40px;margin-bottom: 20px;">
                            <p>Họp</p>
                        </div>
                        <div style="margin-top: 20px;">
                            <i class="mdi mdi-pencil-box-outline fa-3x" style="margin-left: 100px;" ></i>
                            {{-- <img src="{{asset('./Images/salary.png')}}" style="margin-left: 80px;" alt="">   --}}
                        </div>
                </div>
                <div>
                        <p style="margin-top: -20px;">Tạo cuộc họp</p>
                </div>  
            </a>  
        </div>
        <div class="p-2 m-2">
            <a href="{{route('timekeeping')}}" style="height: 120px; width: 250px;" class=" shadow-lg btn btn-warning">
                <div style="display: flex;">
                        <div>
                            <p style=" font-size:20px"> </p>
                        </div>
                        <div  style="margin-top: 40px;margin-bottom: 20px;">
                            <p style="color:white;">Chấm Công</p>
                        </div>
                        <div style="margin-top: 20px;">
                            <i class="mdi mdi-clipboard-outline fa-3x" style="margin-left: 80px; color:white"> </i>
                            {{-- <img src="{{asset('./Images/salary.png')}}" style="margin-left: 80px;" alt="">   --}}
                        </div>
                </div>
                <div>
                        <p style="margin-top: -20px; color:white;">Chấm công nhân viên</p>
                </div>  
            </a>
        </div>
        <div class="p-2 m-2">
            <a href="{{route('train')}}" style="height: 120px; width: 250px;" class=" shadow-lg btn btn-danger">
                <div style="display: flex;">
                        <div>
                            <p style=" font-size:20px"> </p>
                        </div>
                        <div  style="margin-top: 40px;margin-bottom: 20px;">
                            {{-- <p>Xuất file</p> --}}
                            <p>Đào tạo</p>
                        </div>
                        <div style="margin-top: 20px;">
                            <i class="mdi mdi-library fa-3x" style="margin-left: 80px;"></i>
                            {{-- <img src="{{asset('./Images/salary.png')}}"  alt="">   --}}
                        </div>
                </div>
                <div>
                        <p style="margin-top: -20px;">Đào tạo nhân viên</p>
                </div>  
            </a>
        </div>
        <div class="p-2 m-2">
            <a href="{{ route('document')}}" style="height: 120px; width: 250px;" class=" shadow-lg btn btn-secondary">
                <div style="display: flex;">
                        <div>
                            <p style=" font-size:20px"> </p>
                        </div>
                        <div  style="margin-top: 40px;margin-bottom: 20px;">
                            <p>Văn bản</p>
                        </div>
                        <div style="margin-top: 20px;">
                                <i class="mdi mdi-file-document fa-3x" style="margin-left: 80px;"></i>
                            {{-- <img src="{{asset('./Images/salary.png')}}"  alt="">   --}}
                        </div>
                </div>
                <div>
                        <p style="margin-top: -20px;">Danh sách văn bản</p>
                </div>  
            </a>
        </div>
    </div> 
    {{-- End form  --}}

  
    <div class="row">
        <div class="Col-lg-6 mt-5 ml-3">
            <div class="card mt-4 shadow-lg">
                <div class="card-header">
                    Điểm danh hôm nay
                </div>
                <div class="card-content ml-2 mt-2 mr-2">
                    <table class="table table-striped table-bordered mb-3">
                        <thead class="text-center text-nowrap thead-light">
                            <tr>
                                <th class="w-5">Stt</th>
                                <th class="">nhân viên</th>
                                <th class="w-5">điểm danh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $stt=0;
                                ?>
                            @foreach ($employees as  $employee)
                                @if ($employee->Id_NhanVien == 1)
                                    
                                @else
                                <?php
                                   
                                        $dateNow= Carbon\Carbon::now()->format('Y-m-d');
                                
                                        $timeKeepings=App\Models\chamcong::where('Id_NhanVien','=',$employee->Id_NhanVien)
                                                                        ->where('Ngay','=',$dateNow)
                                                                        ->with('nhanvien')                      
                                                                        ->get();
                                    ?>
                                <tr>
                                    <td class="text-center a">
                                        {{++$stt}}
                                    </td>
                                    <td style="display: flex;" class="text-center" > 
                                        @if ($employee->HinhAnh == '')
                                            @if ($employee->GioiTinh == 'Nam')
                                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('./images/' . $employee->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                        <p class="ml-2 mt-2 a">
                                            <?php 
                                            echo $employee->Ho.' '.$employee->Ten;
                                        ?>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        @foreach ($timeKeepings as $timeKeeping)
                                            @if ($timeKeeping->GioVao =='00:00:00')
                                                <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                            @else
                                                <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                            @endif
                                        @endforeach
                                        {{-- @if ($timeKeepings[0]->GioVao =='00:00:00')
                                            <i class="mdi mdi-close" style="color: red;font-size: 30px;"></i>
                                        @else
                                            <i class="mdi mdi-check" style="color: green;font-size: 30px;"></i>
                                            
                                        @endif --}}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="Col-lg-2">            
        </div>
        <div class="Col-lg-2">
            <div class="card-body">
                    @include('pages/calendar')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <dt>Công việc</dt>
                </div>
                <div class="card-content ml-2 mr-2">
                   <div class="card mt-2">
                        <div class="card-header">
                            Công việc nhân viên
                        </div>
                        <div class="card-content mt-2 ml-2 mr-2">
                            <table class="table table-striped table-bordered mb-3">
                                <thead class="text-center text-nowrap thead-light">
                                    <tr>
                                        <th class="w-5">Stt</th>
                                        <th class="w-20">nhân viên</th>
                                        <th class="w-25">công việc</th>
                                        <th class="w-25">Thời gian</th>
                                        {{-- <th class="w-20">file</th> --}}
                                        <th class="w-10">Tiến độ</th>
                                        <th>Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sttnv=0;
                                        ?>
                                    @foreach ($works as $work)
                                        @if ($work->Id_NhanVien == null)
                                            
                                        @else
                                        <tr>
                                            <td class="text-center b">{{++$sttnv}}</td>
                                            <td>
                                                <div class=" d-flex align-items-center" >
                                                    @if ($work->nhanvien->HinhAnh == '')
                                                        @if ($work->nhanvien->GioiTinh == 'Nam')
                                                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                        @else
                                                            <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('./images/' . $work->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                    @endif
                                                    <p class="ml-2 b my-auto">
                                                    {{$work->nhanvien->Ho.' '.$work->nhanvien->Ten}}
                                                    </p>
                                                </div>
                                            </td>        
                                            <td class=" b">{!!$work->NoiDung!!}</td>
                                            <td class="text-center b">
                                                <dt>
                                                {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('m-d-Y h:m').'-->'.\Carbon\Carbon::parse($work->ThoiGianKT)->format('m-d-Y h:m')}}
                                                </dt>
                                            </td>
                                            <td class="text-center">
                                                @if ($work->TinhTrang == 0 || $work->TinhTrang == 3)
                                                    <dt style="font-size: 15px; color: black">
                                                        {{$work->TienDo}}
                                                    </dt>
                                                @endif
                                            </td>
                                            {{-- <td class="text-center b">
                                                @switch(pathinfo($work->File, PATHINFO_EXTENSION))
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
                                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$work->File)}}' class="b">  {{$work->File}}</a>
                                            </td> --}}
                                            <td class="text-center">
                                                @switch($work->TinhTrang)
                                                    @case(0)
                                                        <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                                        @break    
                                                    @case(1)
                                                        <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Chưa hoàn thành </span>
                                                        @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        @endif
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                   </div>
                   <div class="card">
                        <div class="card-header">
                            Công việc phòng ban
                        </div>
                        <div class="card-content mt-2 ml-2 mr-2">
                            <table class="table table-striped table-bordered mb-3">
                                <thead class="text-center text-nowrap thead-light">
                                    <tr>
                                        <th class="w-5">Stt</th>
                                        <th class="w-20">Phòng ban</th>
                                        <th class="w-25">công việc</th>
                                        <th class="w-30">Thời gian</th>
                                        <th class="w-10">Tiến độ</th>
                                        <th >Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sttpb=0;
                                        ?>
                                    @foreach ($works as $work)
                                        @if ($work->Id_PhongBan == null)
                                            
                                        @else
                                        <tr>
                                            <td class="text-center b">{{++$sttpb}}</td>
                                            <td class="b">
                                               {{$work->phongban->TenPhongBan}}
                                            </td>        
                                            {{-- <td class="b text-center">
                                                {{$work->phongban->NguoiQuanLy}}
                                            </td> --}}
                                            <td class="b">{!!$work->NoiDung!!}</td>
                                            <td class="text-center b">
                                                <dt>
                                                    {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('m-d-Y h:m').'-->'.\Carbon\Carbon::parse($work->ThoiGianKT)->format('m-d-Y h:m')}}
                                                </dt>
                                            </td>
                                            {{-- <td class="text-center b">
                                                @switch(pathinfo($work->File, PATHINFO_EXTENSION))
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
                                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$work->File)}}'>  {{$work->File}}</a>
                                            </td> --}}
                                            <td class="text-center">
                                                @if ($work->TinhTrang == 0 || $work->TinhTrang == 3)
                                                    <dt style="font-size: 15px; color: black">
                                                        {{$work->TienDo}}
                                                    </dt>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @switch($work->TinhTrang)
                                                    @case(0)
                                                        <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                                        @break    
                                                    @case(1)
                                                        <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Chưa hoàn thành</span>
                                                        @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        @endif
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <dt>
                        Danh sách lịch họp
                    </dt>
                </div>
                <div class="card-content mt-2 ml-2 mr-2">
                    <table class="table table-striped table-bordered mb-3">
                        <thead class="text-center text-nowrap thead-light">
                            <tr>
                                <th>Stt</th>
                                <th>Phòng ban</th>
                                <th>Thành phần</th>
                                <th>Địa điểm</th>
                                <th>Người chủ trì</th>
                                <th class="w-10">Ngày</th>
                                <th>Thời gian</th>
                                <th>Nội dung</th>
                                <th class="w-10">File</th>
                                <th>Tình trạng</th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meettings as $stt=> $meetting)
                            <tr>
                                <td class="text-center">{{++$stt}}</td>
                                {{-- <td>{{$meetting->phongban->TenPhongBan}}</td> --}}
                                <td>
                                    @if ($meetting->Id_PhongBan==null)
                                        Tất cả
                                    @else
                                    {{$meetting->phongban->TenPhongBan}}
                                    @endif
                                </td>
                                <td><dt>{{$meetting->ThanhPhan}}</dt></td>
                                <td class="text-center"><dt>{{$meetting->DiaDiem}}</dt></td>
                                <td>{{$meetting->nguoichutri->Ho.' '.$meetting->nguoichutri->Ten}}</td>
                                <td class="text-center"><dt>{{Carbon\Carbon::parse($meetting->Ngay )->format('d-m-Y')}}</dt></td>
                                <td class="text-center"><dt>{{Carbon\Carbon::parse($meetting->ThoiGian )->format('h:m')}}</dt></td>
                                <td>{!!$meetting->NoiDung!!}</td>
                                <td class="text-center">
                                    @switch(pathinfo($meetting->File, PATHINFO_EXTENSION))
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
                                <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$meetting->File)}}'>  {{$meetting->File}}</a>
                       
                                </td>
                                <td class="text-center">
                                    @if ($meetting->TinhTrang == 0)
                                        <dt>chưa họp</dt>
                                    @else
                                        <dt>Đã hoàn thành</dt>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="dropdown dropdown-action">
                                        <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                        <div class="dropdown-menu ">
                                            <button class="btn btn-secondary w-70 mt-2 ml-4" data-toggle="modal" data-target="#work-{{$meetting->Id}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>     
                                            <form action="{{ route('destroymeetting',['id'=>$meetting->Id])}}" method="post">
                                                @csrf
                                                    <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                {{-- modal  --}}
                                <div class="modal fade" id="work-{{$meetting->Id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    {{-- <div id="simpleModal" class="modal" tabindex="-1" role="dialog"> --}}
                                        <form action="{{route('updatemeetting',['id'=>$meetting->Id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa lịch họp</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">ngày</label>
                                                                <input type="date" class="form-control" value="{{$meetting->Ngay}}" name="ngayUD" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Thời gian</label>
                                                                <input type="time" class="form-control" value="{{$meetting->ThoiGian}}" name="thoigianUD" required>
                                                            </div>
                                                        </div> 
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Phòng ban </label>
                                                                <select id="remain-open" name="phongbanUD" class="form-control"  id="" required>
                                                                    <option value="" disabled>Mã phòng - Tên phòng ban</option>
                                                                    @if ($meetting->Id_PhongBan == null)
                                                                       <option value="" selected>Tất cả</option>
                                                                    @else
                                                                        @foreach ($departments as $department)
                                                                            @if ($department->Id_PhongBan==$meetting->Id_PhongBan)
                                                                               <option value="{{$department->Id_PhongBan}}" selected>{{$department->Id_PhongBan}} - {{$department->TenPhongBan}}</option>     
                                                                            @else
                                                                              <option value="{{$department->Id_PhongBan}}">{{$department->Id_PhongBan}} - {{$department->TenPhongBan}}</option>    
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                                           
                                                                </select>   
                                                            </div>
                                                            {{-- <div class="col-md-6 mb-3" >
                                                                <label for="">Nhân viên</label>
                                                                <input type="time" class="form-control" name="" id="" required>
                                                            </div> --}}
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Thành phần</label>
                                                                <input type="text" class="form-control" name="thanhphanUD" value="{{$meetting->ThanhPhan}}" required>
                                                                {{-- <textarea name="form-control" id="" required></textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Địa điểm</label>
                                                                <input type="text" class="form-control" name="diadiemUD" value="{{$meetting->DiaDiem}}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Người chủ trì</label>
                                                                <select id="remain-open" name="nguoichutriUD" class="form-control"  id="" required>
                                                                    <option value="">Mã nhân viên - Tên nhân viên</option>
                                                                    @foreach ($employees as $employee)
                                                                        @if ($employee->Id_NhanVien == $meetting->NguoiChuTri)
                                                                            <option value="{{$employee->Id_NhanVien}}" selected>{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                                        @else
                                                                            <option  value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                                        @endif
                                                                    @endforeach                                
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        {{-- <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">file</label>
                                                                <input type="file" class="form-control" name="file" required>
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>hoàn thành</label><br>
                                                                <div class="d-flex text-left mb-2 align-items-center">
                                                                    <div class="w-5">
                                                                        <input type="checkbox" name="tinhtrangUD"
                                                                        @if ($meetting->TinhTrang =='1')
                                                                            checked
                                                                        @endif
                                                                         id="cbphongban"  class="check" style="width: 1em; height: 1em;" required>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Nội dung</label>
                                                                <textarea name="noidungUD" class="form-control summernote"  id="" required>{{$meetting->NoiDung}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row justify-content-end mb-2">
                                                        <div class="w-25 mr-2"></div>
                                                        <div class="w-75 d-flex">
                                                            <button type="submit" class="btn btn-success w-100">Sửa</button>
                                                            <button type="submit" class="btn btn-info w-100 mr-2 ml-5" data-dismiss="modal">Thoát</button>
                                                        </div>
                                                        <div class="w-25 mr-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                   
                                {{-- modal end --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{asset('./vendor/pg-calendar/js/pignose.calendar.min.js')}}"></script> --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#simpleModal" data-backdrop="static" data-keyboard="false">Button 1</button> --}}
    
    <div class="modal fade" id="work" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- <div id="simpleModal" class="modal" tabindex="-1" role="dialog"> --}}
        <form action="{{route('createmeetting')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tạo lịch họp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- I love ASPSnippets! -->
                        {{-- <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="">Phong ban</label>
                                <input type="text" class="form-control" name="chude" required>
                            </div>
                        </div> --}}
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">ngày</label>
                                <input type="date" class="form-control" value="{{$dateNow}}" name="ngay" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Thời gian</label>
                                <input type="time" class="form-control" name="thoigian" required>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">Phòng ban </label>
                                <select id="remain-open" name="phongban" class="form-control"  id="" required>
                                    <option value="" disabled>Mã phòng - Tên phòng ban</option>
                                    <option value="">Tất cả</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->Id_PhongBan}}">{{$department->Id_PhongBan}} - {{$department->TenPhongBan}}</option>
                                    @endforeach                             
                                </select>
                            </div>
                            {{-- <div class="col-md-6 mb-3" >
                                <label for="">Nhân viên</label>
                                <input type="time" class="form-control" name="" id="" required>
                            </div> --}}
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="">Thành phần</label>
                                <input type="text" class="form-control" name="thanhphan" required>
                                {{-- <textarea name="form-control" id="" required></textarea> --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">Địa điểm</label>
                                <input type="text" class="form-control" name="diadiem" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Người chủ trì</label>
                                <select id="remain-open" name="nguoichutri" class="form-control"  id="" required>
                                    <option value="">Mã nhân viên - Tên nhân viên</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="">file</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="">Nội dung</label>
                                <textarea name="noidung" class="form-control summernote"  id="" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-end mb-2">
                        <div class="w-25 mr-2"></div>
                        <div class="w-75 d-flex">
                            <button type="submit" class="btn btn-success w-100">Tạo</button>
                            <button type="submit" class="btn btn-info w-100 mr-2 ml-5" data-dismiss="modal">Thoát</button>
                        </div>
                        <div class="w-25 mr-2"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
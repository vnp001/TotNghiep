@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Công việc</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Công việc</a></li>
              
            </ol>
        </div>
    </div>
    @if ( Session::has('success') )
    <div class="alert mb-4 alert-primary alert-dismissible alert-alt solid fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif


    @if ( Session::has('error') )
        <div class="alert mb-4 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    {{-- FORM --}}
    <form action="{{route('storework')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row" style="margin-top: -20px;">
            <div class="col-lg-12 shadow-lg">
                <div id="accordion-nine" class="accordion accordion-active-header shadow-lg">
                    <div class="accordion__item">
                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#active-header_collapseTwo">
                            <span class="accordion__header--icon"></span>
                            <h4 class="accordion__header--text">Công việc</h4>
                            <span class="accordion__header--indicator"></span>
                        </div>
                        <div id="active-header_collapseTwo" class="collapse accordion__body" data-parent="#accordion-nine">
                            <div class="accordion__body--text">                               
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Thời gian bắt đầu</label>
                                        <input type="datetime-local" name="ngaybatdau" class="form-control"  placeholder="Date" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Thời gian kết thúc</label>
                                        <input type="datetime-local" name="ngayketthuc" class="form-control"  placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Ngày</label>
                                        <input type="Date" name="ngay" value="{{$dateNow}}" class="form-control"  placeholder="Date"required>
                                    </div>
                                </div>  
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <div class="d-flex flex-row">
                                        <label>Nguời giao:</label>
                                            @foreach ($checkadmin as $Manager)                    
                                                @if ($Manager->HinhAnh == '')
                                                        @if ($Manager ->GioiTinh == 'Nam')
                                                        <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @else
                                                    <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @endif
                                                @else
                                                    <img class="ml-5" src="{{ asset('./images/' . $Manager->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @endif
                                                <p class="ml-3 mt-2">
                                                    {{
                                                        $Manager->Ho.' '.$Manager->Ten
                                                    }}
                                                </p>
                                                <input type="hidden" name="nguoigiao" value="{{$Manager->Id_NhanVien}}">
                                            @endforeach
                                        </div>
                                        {{-- <input type="hidden" name="nguoigiao" value="{{$Manager->Ho.' '.$Manager->Ten}}" class="form-control"  placeholder="Date"required> --}}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tùy chọn</label><br>
                                        <div class="d-flex text-left mb-2 align-items-center">
                                            <div class="w-5">
                                                <input type="radio" onclick="check()" id="cbphongban"  class="check" value="phongban"  name="checkchon" style="width: 1em; height: 1em;" required>
                                            </div>
                                            <div class="w-30 pl-2 mr-2">
                                                <label class="my-auto">Phòng ban</label>
                                            </div>
                                            <div class="w-5">
                                                <input type="radio" onclick="check()" class="check" id="cbnhanvien" value="nhanvien" name="checkchon" style="width: 1em; height: 1em;">
                                            </div>
                                            <div class="w-40 pl-2 mr-2">
                                                <label class="my-auto">Nhân viên</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div id="phongban" class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phòng ban</label>
                                        <select  name="phongban" class="form-control"  id="" >
                                            <option value="">Tên phòng ban - Trưởng phòng</option>
                                            @foreach ($Departments as $Department)
                                                <option value="{{$Department->Id_PhongBan}}">{{$Department->TenPhongBan.' - '.$Department->NguoiQuanLy}}</option>
                                            @endforeach
                                        </select>
                                    </div>                   
                                </div> 
                                <div id="nhanvien" class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nhân viên</label>
                                        <select  name="nhanvien" class="form-control"  id="" >
                                            <option value="">Mã nhân viên - Tên nhân viên</option>
                                            @foreach ($employees as $employee)
                                                @if($employee->Id_PhanQuyen=='1')
                                                    <option disabled value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                @else
                                                    <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>                   
                                </div> 
                             
                                <div class="form-row">  
                                    <div class="col-xl-12 form-group col-xxl-12">
                                    <div class="card-body">
                                        <label>Nội dung</label>
                                        <textarea name="noidung" id="" class="summernote"></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>File</label>
                                        <input type="file" name="filecongviec" class="form-control" placeholder="">
                                    </div>
                                </div> 
                                <button type="submit" style="margin-left: 500px; width:100px;height:50px;font-size: 20px;" class="btn  btn-secondary">Tạo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- END Form Kỹ luật --}}
   
            {{-- công việc phòng ban  --}}
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center">Danh sách công việc cho phòng ban</h4>
                </div>
                <div class="card-content m-2">
                    <table class="form-group  table table-striped table-bordered">
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-15">
                                Phòng đảm nhận 
                            </th>
                            <th class="w-10">
                                Ngày
                            </th>
                            <th class="w-35">
                                Thời gian
                            </th>
                            <th class="w-25">
                                Nội dung
                            </th>
                            <th class="w-20">
                                File
                            </th>
                            <th class="w-10">
                                Trạng thái
                            </th>
                            <th class="w-5">
                                
                            </th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php 
                                $stt=0;    
                        ?>
                        @foreach ($works as $workDepartment)
                            @if($workDepartment->Id_PhongBan != null && $workDepartment->TinhTrang == 1 )
                            <tr>
                                <td style="text-align: center">
                                    {{++$stt}}
                                </td>
                                <td class="text-left">
                                    {{$workDepartment->phongban->TenPhongBan}}
                                </td>                    
                                <td style="text-align: center">
                                    {{ \Carbon\Carbon::parse($workDepartment ->Ngay )->format('d-m-Y') }}
                                </td>
                                <td style="text-align: center">
                                    <dt>
                                    {{ \Carbon\Carbon::parse($workDepartment ->ThoiGianBD )->format('d-m-Y H:m').' --> '.\Carbon\Carbon::parse($workDepartment ->ThoiGianKT )->format('d-m-Y H:m') }}
                                    </dt>
                                </td>
                                <td class="">
                                    {!!$workDepartment ->NoiDung!!}
                                </td>
                                <td >
                                    @switch(pathinfo($workDepartment->File, PATHINFO_EXTENSION))
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
                                    <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$workDepartment->File)}}'>  {{$workDepartment->File}}</a>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                    {{-- @switch($workDepartment->TinhTrang)
                                        @case(0)
                                            <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                            @break    
                                        @case(1)
                                            <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                            @break
                                        @default
                                            <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Không hoàn thành</span>
                                            @break
                                    @endswitch --}}
                                </td>
                                <td class="text-center mr-3">
                                    <div class="dropdown dropdown-action">
                                        <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                        <div class="dropdown-menu ">
                                            <button class="btn btn-secondary w-70 mt-2 ml-4" data-toggle="modal" data-target="#modelphongban-{{$workDepartment->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>    
                                            <form action="{{ route('removework',['id'=>$workDepartment->Id_CongViec])}}" method="post">
                                                @csrf
                                                    <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        {{-- start model  --}}
                            <div class="modal fade" id="modelphongban-{{$workDepartment->Id_CongViec}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-content p-3 col-lg-12">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Sửa công việc </h2>
                                        </div>
                                        <form action="{{ route('updateworkderpartment',['id'=>$workDepartment->Id_CongViec])}}" method="post">
                                            @csrf
                                        <input type="hidden" name="idcvPB" value="{{$workDepartment->Id_CongViec}}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Thời gian bắt đầu</label>
                                                <input type="datetime-local" name="ngaybatdauPB" value="{{\Carbon\Carbon::parse($workDepartment ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($workDepartment ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                                            </div>
                                            <h1>
                                            </h1>
                                            <div class="form-group col-md-6">
                                                <label>Thời gian kết thúc</label>
                                                <input type="datetime-local" name="ngayketthucPB" value="{{\Carbon\Carbon::parse($workDepartment ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($workDepartment ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Ngày</label>
                                                <input type="Date" name="ngayPB" value="{{$workDepartment->Ngay}}" class="form-control"  placeholder="Date"required>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="d-flex flex-row"> 
                                                <label>Nguời giao</label>
                                                    @foreach ($checkadmin as $Manager)                    
                                                        @if ($Manager->HinhAnh == '')
                                                                @if ($Manager ->GioiTinh == 'Nam')
                                                                <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                        @else
                                                            <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                        @endif
                                                        @else
                                                            <img class="ml-5" src="{{ asset('./images/' . $Manager->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                        @endif
                                                        <p class="ml-3 mt-2">
                                                            {{
                                                                $Manager->Ho.' '.$Manager->Ten
                                                            }}
                                                        </p>
                                                       
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>  
                                        <div id="phongban" class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Phòng ban</label>
                                                <select  name="PB" class="form-control"  id="" >
                                                    <option value="">Tên phòng ban - Trưởng phòng</option>
                                                    @foreach ($Departments as $Department)
                                                        @if ($workDepartment->Id_PhongBan==$Department->Id_PhongBan)
                                                         <option selected value="{{$Department->Id_PhongBan}}">{{$Department->TenPhongBan.' - '.$Department->NguoiQuanLy}}</option>
                                                        @else
                                                            <option value="{{$Department->Id_PhongBan}}">{{$Department->TenPhongBan.' - '.$Department->NguoiQuanLy}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>                   
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Trạng thái </label><br>
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-5">
                                                        <input type="checkbox" name="ttPB"  
                                                        @if ($workDepartment->TinhTrang =='1')
                                                            checked
                                                        @endif
                                                         id="cbphongban"  class="check" value="phongban"  style="width: 1em; height: 1em;" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">  
                                            <div class="col-xl-12 form-group col-xxl-12">
                                            <div class="card-body">
                                                <label>Nội dung</label>
                                                <textarea name="noidungPB" id="" class="summernote">{{$workDepartment->NoiDung}}</textarea>
                                            </div>
                                            </div>
                                        </div>
                                     
                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                            <div class="w-25 mr-2"></div>
                                            <div class="w-75 d-flex">
                                                <button name="btn" class="btn btn-success w-40">Cập nhập</button>
                                                {{-- <input type="submit" name="btn" class="btn btn-success w-40" value="Cập nhập"> --}}
                                                <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </form>
                            {{-- end model   --}}
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                    {{-- công việc nhân viên làm  --}}
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center">Danh sách công việc cho nhân viên</h4>
                </div>
                <div class="card-content m-2">
                    <table class="form-group  table table-striped table-bordered"  >
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-20">
                                Nhân viên 
                            </th>
                            <th class="w-10">
                                Ngày
                            </th>
                            <th class="w-35">
                                Thời gian
                            </th>
                            <th class="w-25">
                                Nội dung
                            </th>
                            <th class="w-20">
                                File
                            </th>
                            <th class="w-10">
                                Trạng thái
                            </th>
                            <th class="w-5">
                               
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sott=0;    
                            ?>
                            @foreach ($works as $workEmployee)
                                @if($workEmployee->Id_NhanVien != null && $workEmployee->TinhTrang == 1)
                                <tr>
                                    <td style="text-align: center">
                                        {{++$sott}}
                                    </td>
                                    <td>
                                        <div class=" d-flex align-items-center" >
                                            <img src="{{ asset('./images/' . $workEmployee->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            <p class="ml-2 my-auto">
                                            {{$workEmployee->nhanvien->Ho.' '.$workEmployee->nhanvien->Ten}}
                                            </p>
                                        </div>
                                    </td>                    
                                    <td style="text-align: center">
                                        {{ \Carbon\Carbon::parse($workEmployee ->Ngay )->format('d-m-Y') }}
                                    </td>
                                    <td style="text-align: center">
                                        <dt>
                                        {{ \Carbon\Carbon::parse($workEmployee ->ThoiGianBD )->format('d-m-Y H:m').' --> '.\Carbon\Carbon::parse($workEmployee ->ThoiGianKT )->format('d-m-Y H:m') }}
                                        </dt>
                                    </td>
                                    <td class="">
                                        {!!$workEmployee ->NoiDung!!}
                                    </td>
                                    <td >
                                        @switch(pathinfo($workEmployee->File, PATHINFO_EXTENSION))
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
                                        <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$workEmployee->File)}}'>  {{$workEmployee->File}}</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                        {{-- @switch($workEmployee->TinhTrang)
                                            @case(0)
                                                <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                                @break    
                                            @case(1)
                                                <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                                @break
                                            @default
                                                <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Không hoàn thành</span>
                                                @break
                                        @endswitch --}}
                                    </td>
                                    <td class="text-center mr-3">
                                        <div class="dropdown dropdown-action">
                                            <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                            <div class="dropdown-menu ">
                                                <button class="btn btn-secondary w-70 mt-2 ml-4" data-toggle="modal" data-target="#modelnhanvien-{{$workEmployee->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>     
                                                <form action="{{ route('removework',['id'=>$workEmployee->Id_CongViec])}}" method="post">
                                                    @csrf
                                                        <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                {{-- start model --}}
                            
                            <div class="modal fade "  id="modelnhanvien-{{$workEmployee->Id_CongViec}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-content p-3 col-lg-12">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Sửa công việc</h2>
                                        </div>
                                        <form action="{{ route('updateworkemployee',['id'=>$workEmployee->Id_CongViec])}}" method="post">
                                            @csrf
                                            
                                            <input type="hidden" name="idnv" value="{{$workEmployee->Id_CongViec}}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Thời gian bắt đầu</label>
                                                <input type="datetime-local" name="ngaybatdauNV" value="{{\Carbon\Carbon::parse($workEmployee ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($workEmployee ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Thời gian kết thúc</label>
                                                <input type="datetime-local" name="ngayketthucNV" value="{{\Carbon\Carbon::parse($workEmployee ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($workEmployee ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Ngày</label>
                                                <input type="Date" name="ngayNV" value="{{$workEmployee->Ngay}}" class="form-control"  placeholder="Date"required>
                                            </div>
                                        </div>  
                                       
                                        <div id="nhanvien" class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nhân viên</label>
                                                <select  name="NV" class="form-control"  id="" >
                                                    {{-- <option  value="{{$workEmployee->nhanvien->Id_NhanVien}}">{{$workEmployee->nhanvien->Id_NhanVien.' - '.$workEmployee->nhanvien->Ho.' '.$workEmployee->nhanvien->Ten}}</option> --}}
                                                    <option value="">Mã nhân viên - Tên nhân viên</option>
                                                    @foreach ($employees as $employee)
                                                        @if($employee->Id_PhanQuyen =='1')
                                                            <option disabled value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                        @else
                                                            @if ($workEmployee->Id_NhanVien==$employee->Id_NhanVien)
                                                                <option selected value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>
                                                            @else
                                                                <option value="{{$employee->Id_NhanVien}}">{{$employee->Id_NhanVien}} - {{$employee->Ho}} {{$employee->Ten}}</option>                                                            
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>                   
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Trạng thái</label><br>
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-5">
                                                        <input type="checkbox" name="tinhtrangNV"
                                                        @if ($workEmployee->TinhTrang =='1')
                                                            checked
                                                        @endif
                                                         id="cbphongban"  class="check"  name="checkchon" style="width: 1em; height: 1em;" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">  
                                            <div class="col-xl-12 form-group col-xxl-12">
                                            <div class="card-body">
                                                <label>Nội dung</label>
                                                <textarea name="noidungNV" id="" class="summernote">{{$workEmployee->NoiDung}}</textarea>
                                            </div>
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
                            {{-- end model   --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        {{-- danh sách công việc phòng ban  đã hoàn thành  --}}
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center">Danh sách công việc phòng ban hoàn thành</h4>
                </div>
                <div class="card-content m-2">
                    <table class="form-group  table table-striped table-bordered" >
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-20">
                                Phòng ban
                            </th>
                            <th class="w-20">
                                Công việc
                            </th>
                            <th class="w-35">
                                Thời gian
                            </th>
                            <th class="w-20">
                                Mô tả
                            </th>
                            <th class="w-10">
                                Tiến độ
                            </th>
                            <th class="w-10">
                                Trạng thái
                            </th>
                            <th class="w-5">
                                
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sott=0;    
                            ?>
                            @foreach ($works as $derparmentDone)
                                @if($derparmentDone->Id_PhongBan != null)
                                    @if ($derparmentDone->TinhTrang == 0 || $derparmentDone->TinhTrang == 3)
                                    <tr>
                                        <td class="text-center">
                                            {{++$sott}}
                                        </td>
                                        <td>
                                            {{$derparmentDone->phongban->TenPhongBan}}
                                        </td>                    
                                        <td class="text-left">
                                            {!!$derparmentDone->NoiDung!!}
                                        </td>
                                        <td class="text-center">
                                            <dt>
                                            {{ \Carbon\Carbon::parse($workEmployee ->ThoiGianBD )->format('d-m-Y H:m').' --> '.\Carbon\Carbon::parse($workEmployee ->ThoiGianKT )->format('d-m-Y H:m') }}
                                            </dt>
                                        </td>
                                        <td class="text-left">
                                            {!!$workEmployee ->MoTa!!}
                                        </td>
                                        <td class="text-center">
                                            {{$derparmentDone->TienDo}}
                                        </td>
                                        <td class="text-center">
                                            @switch($derparmentDone->TinhTrang)
                                                @case(0)
                                                    <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                                    @break    
                                                {{-- @case(1)
                                                    <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                                    @break --}}
                                                @default
                                                    <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Không hoàn thành</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td class="text-center mr-3">
                                            <div class="dropdown dropdown-action">
                                                <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                                <div class="dropdown-menu ">
                                                    <button class="btn btn-secondary w-70 mt-2 ml-4" data-toggle="modal" data-target="#modeleditcongviecphongban-{{$derparmentDone->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>     
                                                    <form action="{{ route('removework',['id'=>$derparmentDone->Id_CongViec])}}" method="post">
                                                        @csrf
                                                            <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                                {{-- start model --}}
                                <div class="w-50 d-flex justify-content-end">
                                    <div class="modal fade" id="modeleditcongviecphongban-{{$derparmentDone->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                            {{-- START FORM --}}
                                            <form  method="post" action="{{route('editwork_admin',['id'=>$derparmentDone->Id_CongViec])}}">
                                                @csrf
                                                <div class="modal-content p-3" style="width: 550px;">
                                                    <div class="flex-row d-flex justify-content-center mb-2">
                                                        <h2 class="text-info">Sửa</h2>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <div class="d-flex flex-row"> 
                                                            <label>Nguời giao</label>
                                                                <img class="ml-5" src="{{ asset('./images/' . $derparmentDone->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                                <p class="ml-3 mt-2">{{ $derparmentDone->nguoigiao->Ho.' '.$derparmentDone->nguoigiao->Ten}}</p>   
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="d-flex flex-column w-auto mt-3">
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Ngày</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="date" name="ngayED" value="{{$derparmentDone->Ngay}}"  class="form-control"  />
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Thòi Gian BT</label>
                                                            </div>
                                                            <div class="w-75">
                                                               <input type="datetime-local" name="ngaybatdauED" value="{{\Carbon\Carbon::parse($derparmentDone ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($derparmentDone ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                        
                                                                {{-- <input type="datetime-local" name="ngaybatdau" class="form-control"  placeholder="Date" required> --}}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Thòi Gian KT</label>
                                                            </div>
                                                            <div class="w-75">
                                                                 <input type="datetime-local" name="ngayketthucED" value="{{\Carbon\Carbon::parse($derparmentDone ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($derparmentDone ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                        
                                                                {{-- <input type="datetime-local" name="ngayketthuc" class="form-control"  placeholder="Date" required> --}}
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Tiến độ</label>
                                                            </div>
                                                            <div class="w-75">
                                                                 <input type="number" name="tiendoED" value="{{$derparmentDone->TienDo}}" class="form-control">
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Tình trạng</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <select name="tinhtrangED"  class="form-control" id="">
                                                                    @if ($derparmentDone->TinhTrang == 0)
                                                                        <option selected value="0">Đã hoàn thành</option>
                                                                    @endif
                                                                    @if ($derparmentDone->TinhTrang == 1)
                                                                        <option selected value="1">Xử lý</option>
                                                                    @endif
                                                                    @if ($derparmentDone->TinhTrang == 3)
                                                                        <option selected value="3">Chưa hoàn thành</option>
                                                                    @endif
                                                                    <option value="1">Xử lý</option>
                                                                    <option value="0">Đã hoàn thành</option>
                                                                    <option value="3">Chưa hoàn thành</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="form-row mt-2">  
                                                                <div class="col-xl-12 form-group col-xxl-12">
                                                                    <div class="card-body">
                                                                        <label>Mô tả</label>
                                                                        <textarea name="motaED" id="" class="summernote">{{$derparmentDone->MoTa}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                            <div class="w-25 mr-2"></div>
                                                            <div class="w-75 d-flex">
                                                                <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                                <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                                <!-- <button id= "btnCreate" type="submit" class="btn btn-primary w-50" onclick="return validateInput()">Thêm</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            {{-- end model   --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- danh sách công việc phòng ban  đã hoàn thành  --}}
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center">Danh sách công việc nhân viên đã hoàn thành </h4>
                </div>
                <div class="card-content m-2 ">
                    <table class="form-group  table table-striped table-bordered" >
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-20">
                                nhân viên
                            </th>
                            <th class="w-20">
                                Công việc
                            </th>
                            <th class="w-35">
                                Thời gian
                            </th>
                            <th class="w-20">
                                Mô tả
                            </th>
                            <th class="w-10">
                                Tiến độ
                            </th>
                            <th class="w-10">
                                Trạng thái
                            </th>
                            <th class="w-5">
                                
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sott=0;    
                            ?>
                            @foreach ($works as $employeeDone)
                                @if($employeeDone->Id_NhanVien != null)
                                    @if ($employeeDone->TinhTrang == 0 || $employeeDone->TinhTrang == 3)
                                    <tr>
                                        <td class="text-center">
                                            {{++$sott}}
                                        </td>
                                        <td>
                                            <div class="flex d-flex flex-row">
                                                <img src="{{ asset('./images/' . $employeeDone->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                               <p class="ml-2 mt-2">{{$employeeDone->nhanvien->Ho.' '.$employeeDone->nhanvien->Ten}}</p>
                                            </div>
                                        </td>                    
                                        <td class="text-left">
                                            {!!$employeeDone->NoiDung!!}
                                        </td>
                                        <td class="text-center">
                                            <dt>
                                            {{ \Carbon\Carbon::parse($employeeDone ->ThoiGianBD )->format('d-m-Y H:m').' --> '.\Carbon\Carbon::parse($employeeDone ->ThoiGianKT )->format('d-m-Y H:m') }}

                                            </dt>
                                        </td>
                                        <td class="text-left">
                                            {!!$employeeDone ->MoTa!!}
                                        </td>
                                        <td class="text-center">
                                            {{$employeeDone->TienDo}}
                                        </td>
                                        <td class="text-center">
                                            @switch($employeeDone->TinhTrang)
                                                @case(0)
                                                    <span class="badge badge-pill badge-success text-white" style="font-size:15px">Hoàn thành</span>
                                                    @break    
                                                {{-- @case(1)
                                                    <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                                    @break --}}
                                                @default
                                                    <span class="badge badge-pill badge-danger text-white" style="font-size:15px">Không hoàn thành</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td class="text-center mr-3">
                                            <div class="dropdown dropdown-action">
                                                <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                                <div class="dropdown-menu ">
                                                    <button class="btn btn-secondary w-70 mt-2 ml-4" data-toggle="modal" data-target="#modelsuacongvienchonhanvien-{{$employeeDone->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>     
                                                    <form action="{{ route('removework',['id'=>$employeeDone->Id_CongViec])}}" method="post">
                                                        @csrf
                                                            <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                                {{-- start model --}}
                                <div class="w-50 d-flex justify-content-end">
                                    <div class="modal fade" id="modelsuacongvienchonhanvien-{{$employeeDone->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                            {{-- START FORM --}}
                                            <form  method="post" action="{{route('editwork_admin',['id'=>$employeeDone->Id_CongViec])}}">
                                                @csrf
                                                <div class="modal-content p-3" style="width: 550px;">
                                                    <div class="flex-row d-flex justify-content-center mb-2">
                                                        <h2 class="text-info">Sửa</h2>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <div class="d-flex flex-row"> 
                                                            <label>Nguời giao</label>
                                                                <img class="ml-5" src="{{ asset('./images/' . $employeeDone->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                                <p class="ml-3 mt-2">{{ $employeeDone->nguoigiao->Ho.' '.$employeeDone->nguoigiao->Ten}}</p>   
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="d-flex flex-column w-auto mt-3">
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Ngày</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="date" name="ngayED" value="{{$employeeDone->Ngay}}"  class="form-control"  />
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Thòi Gian BT</label>
                                                            </div>
                                                            <div class="w-75">
                                                               <input type="datetime-local" name="ngaybatdauED" value="{{\Carbon\Carbon::parse($employeeDone ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($employeeDone ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                        
                                                                {{-- <input type="datetime-local" name="ngaybatdau" class="form-control"  placeholder="Date" required> --}}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Thòi Gian KT</label>
                                                            </div>
                                                            <div class="w-75">
                                                                 <input type="datetime-local" name="ngayketthucED" value="{{\Carbon\Carbon::parse($employeeDone ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($employeeDone ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                        
                                                                {{-- <input type="datetime-local" name="ngayketthuc" class="form-control"  placeholder="Date" required> --}}
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Tiến độ</label>
                                                            </div>
                                                            <div class="w-75">
                                                                 <input type="number" name="tiendoED" value="{{$employeeDone->TienDo}}" class="form-control">
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Tình trạng</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <select name="tinhtrangED"  class="form-control" id="">
                                                                    @if ($employeeDone->TinhTrang == 0)
                                                                        <option selected value="0">Đã hoàn thành</option>
                                                                    @endif
                                                                    @if ($employeeDone->TinhTrang == 1)
                                                                        <option selected value="1">Xử lý</option>
                                                                    @endif
                                                                    @if ($employeeDone->TinhTrang == 3)
                                                                        <option selected value="3">Chưa hoàn thành</option>
                                                                    @endif
                                                                    <option value="1">Xử lý</option>
                                                                    <option value="0">Đã hoàn thành</option>
                                                                    <option value="3">Chưa hoàn thành</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="form-row mt-2">  
                                                                <div class="col-xl-12 form-group col-xxl-12">
                                                                    <div class="card-body">
                                                                        <label>Mô tả</label>
                                                                        <textarea name="motaED" id="" class="summernote">{{$employeeDone->MoTa}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                            <div class="w-25 mr-2"></div>
                                                            <div class="w-75 d-flex">
                                                                <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                                <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            {{-- end model   --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        document.getElementById("phongban").style.display = 'none';
        document.getElementById('nhanvien').style.display = 'none';
    }
    function check()
    {
        var cbphongban=document.getElementById("cbphongban");
        var cbnhanvien=document.getElementById("cbnhanvien");
        var inputphongban=document.getElementById("phongban");
        var inputnhanvien=document.getElementById("nhanvien");
        if(cbphongban.checked)
        {
            inputphongban.style.display="block";
            inputnhanvien.style.display="none";
        }
        else
        {
            inputnhanvien.style.display="block";
            inputphongban.style.display="none";
        }
    }
</script>
@endsection 
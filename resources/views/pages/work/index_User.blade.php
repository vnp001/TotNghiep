@extends('userindex')
@section('contentuser')
<style>
    td:hover {
        background-color: #f8f9fa;
    }
</style>

<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-5 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                </div>
                <div class="col-lg-4 mt-2">
                    <h2 style="color: #593bdb">Công việc</h2>
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Công việc</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-10 mt-3">
    <div class="row">
        <div class="col-lg-12" style="">
            <h4>Lịch họp trong tuần</h4>
            <table class="table shadow-lg  table-bordered" >
                <thead class="text-center " style="background-color: #5112d4;color:white;">
                <tr>
                    <th class="w-10">
                        Thứ ngày
                    </th>
                    <th class="w-10">
                        Thời gian
                        </th>
                    <th class="w-20">
                        Nội dung
                    </th>
                    <th class="w-20">
                        Thành phần
                    </th>
                    <th class="w-10">
                        Địa điểm
                    </th>
                    <th class="w-15">
                        File
                    </th>
                    <th class="w-20">
                        Chủ trì
                    </th>
                </tr>
                </thead>
                <tbody>
                    @for($i = $weekStartDate; $i <= $weekEndDate; $i->modify('+1 day'))
                        <?php   
                            $employees=App\Models\nhanvien::where(['Id_NhanVien'=> session()->get('user_id')])->get();
                            $count=App\Models\hop::where('Ngay','=',$i->format('Y-m-d'))
                                                ->count();
                            $calendarWork=App\Models\hop::where('Ngay','=',$i->format('Y-m-d'))
                                            ->with('nguoichutri')
                                            ->orderBy('ThoiGian', 'ASC')
                                            ->get();
                        ?>
                           <tr style="color: black;">
                            <td style="text-align: center" @if ($count!= null) rowspan="{{ $count }}"@endif>
                                <div >
                                    {{Carbon\Carbon::parse($i)->format('l')}}
                                </div>
                                <div >
                                    {{Carbon\Carbon::parse($i)->format('d-m-Y')}}
                                </div> 
                            </td>
                        @if ($count == null)
                            <td ></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @else
                            @foreach($calendarWork as $work)
                                @if($work->Id_PhongBan == null || $work->Id_PhongBan == $employees[0]->Id_PhongBan)
                                    <td class="text-center"><dt>{{\Carbon\Carbon::parse($work->ThoiGian)->format('H : m')}}</dt></td>
                                    <td class="text-left">{!!$work->NoiDung!!}</td>
                                    <td class="text-left">{{$work->ThanhPhan}}</td>
                                    <td class="text-center">{{$work->DiaDiem}}</td>
                                    <td class="text-center">
                                        @switch(pathinfo($work->File, PATHINFO_EXTENSION))
                                            @case('')
                                                @break
                                            @case('docx')
                                                <img src="{{asset('./icons/word.png')}}" alt="word" style="height: 15px;width: 15px;">
                                                @break
                                            @case('xlsx')
                                                <img src="{{asset('./icons/excel.png')}}" alt="word" style="height: 15px;width: 15px;">
                                                @break
                                            @case('csv')
                                                <img src="{{asset('./icons/excel.png')}}" alt="word" style="height: 15px;width: 15px;">
                                                @break
                                            @default
                                                <img src="{{asset('./icons/file.png')}}" alt="word" style="height: 15px;width: 15px;">
                                                @break
                                        @endswitch
                                        <a target='_blank' style="color: black;" href='{{ asset('./documents/'.$work->File)}}'>  {{$work->File}}</a>
                                    </td>
                                    <td style="text-align: center">{{$work->nguoichutri->Ho.' '.$work->nguoichutri->Ten}}</td>
                                @endif
                            </tr>
                            @endforeach
                        @endif 
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<div class="col-lg-2 col-sm-6  mt-5 " >
    <div class="card shadow-lg" style="border: 1px solid #3a5580;">
        <div class="card-header" style="background-color: #3a5580">
            <dt class="text-white">Nhân viên khen thưởng trong tháng</dt>
        </div>
        <div class="card-body" style="overflow-y:auto; height: 300px;">
            <ul>  
                @foreach ($employeeLaudatory as $laudatory)             
                <li class="mb-2"  style="font-size: 15px">
                    <div class="flex d-flex flex-row">
                        <img src="{{ asset('./images/' . $laudatory->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                        <p class="my-auto ml-1">
                            {{$laudatory->nhanvien->Ho.' '.$laudatory->nhanvien->Ten}}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>     
        </div>
    </div>
    <div class="card shadow-lg" style="border: 1px solid #3a5580;">
        <div class="card-header" style="background-color: #3a5580">
            <dt class="text-white">Nhân viên bị kỉ luật trong tháng</dt>
        </div>
        <div class="card-body" style="overflow-y:auto; height: 300px;">
            <ul>
                 @foreach ($employeeDiscipline as $discipline)
                 <li class="mb-2" style="font-size: 15px">
                    <div class="flex d-flex flex-row">
                        <img src="{{ asset('./images/' . $discipline->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                        <p class="my-auto ml-1">
                            {{$discipline->nhanvien->Ho.' '.$discipline->nhanvien->Ten}}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<?php
    $managerDerpartment=App\Models\phongban::where('NguoiQuanLy','=',session()->get('user_id'))
                    ->get();
    $checkManagerOfDerpartment=0;
    if($managerDerpartment->isEmpty())
        {
            $checkManagerOfDerpartment=0;
        }
    else
    {
        $checkManagerOfDerpartment=1;
    }
?> 
@if ($checkManagerOfDerpartment == 1)
    <div class="col-lg-12" style="">
        <div class="card shadow-lg">
            <div class="card-header">
                <dt>Công việc được giao</dt>
            </div>
            <div class="card-content m-2">
                <table class="table DTtable table-bordered" >
                    <thead class=" text-center  " style="background-color: #5112d4;color:white;">
                    <tr>
                        <th class="w-5 text-white">
                            Stt
                        </th>
                        <th class="w-25 text-white">
                            Thời Gian
                        </th>
                        <th class="w-25 text-white">
                            Nội dung 
                        </th>
                        <th class="w-20 text-white">
                            File 
                        </th>
                        {{-- <th class="w-10 text-white">
                            Tiến độ
                        </th> --}}
                        <th class="w-10 text-white">
                            Tình trạng
                        </th>
                        <th class="w-5">
                            
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sttcv=0 ?>
                        @foreach ($works as $work)                           
                              @if ($work->TinhTrang == 1 && $work->Id_PhongBan == $employees[0]->Id_PhongBan)                                
                                <tr>
                                    <td class="text-center">
                                        {{++$sttcv}}
                                    </td>
                                    <td class="text-center" style="color: ">
                                        <dt>
                                            {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('d-m-Y H:m')
                                            .' --> '.\Carbon\Carbon::parse($work->ThoiGianKT)->format('d-m-Y H:m')}}        
                                        </dt>
                                    </td>
                                    <td>
                                        {!!$work->NoiDung!!}
                                    </td>
                                    <td >
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
                                    </td>
                                    <td class="text-center">
                                        @if ($work->TinhTrang == 1)
                                            Đang xử lý
                                        @else
                                            đã hoàn thành
                                        @endif
                                    </td>
                                    <td class="text-center mr-3">
                                        <div class="dropdown dropdown-action">
                                            <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                            <div class="dropdown-menu ">
                                                <a href="" class="ml-4" style="color: black;"  data-toggle="modal" data-target="#DanhGia-{{$work->Id_CongViec}}"><i class="mdi mdi-wallet-travel"></i> Đánh giá</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <!-- START MODEL Giao việc-->
                                <div class="w-50 d-flex justify-content-end">
                                    <div class="modal fade" id="DanhGia-{{$work->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                            {{-- START FORM --}}
                                            <form  method="post" action="{{route('evaluatework_user',['id'=>$work->Id_CongViec])}}">
                                                @csrf
                                                <div class="modal-content p-3" style="width: 550px;">
                                                    <div class="flex-row d-flex justify-content-center mb-2">
                                                        <h2 class="text-info">Mô tả hoàn thành công việc</h2>
                                                    </div>
                                                    <input type="hidden" name="idloaivanban" class="form-control" />
                                                    <div class="d-flex flex-column w-auto mt-3">
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Phòng ban</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="text" name="phongban" disabled value="{{$work->phongban->TenPhongBan}}"  class="form-control"  />
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Đánh Giá HT</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="text" name="danhgiatd" placeholder="Đánh giá tiến độ công việc"  class="form-control"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-2">  
                                                            <div class="col-xl-12 form-group col-xxl-12">
                                                                <div class="card-body">
                                                                    <label>Mô tả</label>
                                                                    <textarea name="motatd" id="" class="summernote"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                            <div class="w-25 mr-2"></div>
                                                            <div class="w-75 d-flex">
                                                                <input type="submit" name="btn" class="btn btn-success w-40" value="Hoàn thành">
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
                            {{-- END MODAL --}}
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-12" style="">
        <div class="card shadow-lg">
            <div class="card-header">
                <div class="col text-left">
                    <dt>Danh sách đang xử lý công việc</dt>
                </div>
                <div class="col text-right">
                    <button class="btn btn-secondary w-20 h-20" data-toggle="modal" data-target="#GiaoViec"><i class="mdi mdi-wallet-travel"></i> Giao việc</button>
                </div>
            </div>
            <div class="card-content m-2">
                {{-- <h4>Công việc</h4> --}}
                <table class="table DTtable table-bordered" >
                    <thead class=" text-center  " style="background-color: #5112d4;color:white;">
                    <tr>
                        <th class="w-0 text-white">
                            Stt
                        </th>
                        <th class="w-20 text-white">
                            Nhân viên    
                        </th>
                        <th class="w-25 text-white">
                            Thời Gian
                        </th>
                        <th class="w-25 text-white">
                            Nội dung 
                        </th>
                        <th class="w-15 text-white">
                            File 
                        </th>
                        <th class="w-10 text-white">
                            Tình trạng
                        </th>
                        <th class="w-0">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sttnv=0?>
                        @foreach ($works as $stt => $work)
                            @foreach ($employeeOfDerpartments as $employeeOfDerpartment)
                                @if ($work->Id_NhanVien == $employeeOfDerpartment->Id_NhanVien)                                
                                    @if ( $work->TinhTrang == 1)
                                    <tr>
                                        <td class="text-center">
                                            {{++$sttnv}}
                                        </td>
                                        <td class="d-flex flex-row">
                                            @if ($work->nhanvien->HinhAnh == '')
                                                @if ($work ->nhanvien->GioiTinh == 'Nam')
                                                    <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @else
                                                    <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @endif
                                            @else
                                                <img src="{{ asset('./images/' . $work->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                            <p class="ml-2 mt-2">
                                                {{$work->nhanvien->Ho.' '.$work->nhanvien->Ten}}
                                        </p>
                                        </td>
                                        <td class="text-center">
                                            <dt>
                                            {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('d-m-Y H:m')
                                            .' --> '.\Carbon\Carbon::parse($work->ThoiGianKT)->format('d-m-Y H:m')}}
                                            </dt>
                                        </td>
                                        <td>
                                            {!!$work->NoiDung!!}
                                        </td>
                                        <td>
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
                                        </td>
                                        <td  class="text-center">
                                            <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                            {{-- @switch($work->TinhTrang)
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
                                                <div class="dropdown-menu flex-column">
                                                    <a href="" class="ml-4" style="color: black;" data-toggle="modal" data-target="#update-{{$work->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                    <a  style="color: black;" href="{{route('destroywork_user',['id'=>$work->Id_CongViec])}}"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                                       <!-- START MODEL Sửa công việc-->
                                       <div class="w-50 d-flex justify-content-end">
                                        <div class="modal fade" id="update-{{$work->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                                {{-- START FORM --}}
                                                <form  method="post" action="{{route('updatework_user',['id'=>$work->Id_CongViec])}}">
                                                    @csrf
                                                    <div class="modal-content p-3" style="width: 550px;">
                                                        <div class="flex-row d-flex justify-content-center mb-2">
                                                            <h2 class="text-info">Sửa công việc</h2>
                                                        </div>
                                                        {{-- <input type="hidden" name="idnv" value="{{$work->Id_CongViec}}" class="form-control" /> --}}
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="d-flex flex-row"> 
                                                                <label>Nguời giao</label>
                                                                    {{-- <p>{{$work->NguoiGiao}}</p> --}}
                                                                    <img class="ml-5" src="{{ asset('./images/'. $work->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                                    <p class="ml-3 mt-2">{{ $work->nguoigiao->Ho.' '.$work->nguoigiao->Ten}}</p> 
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="d-flex flex-column w-auto mt-3">
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">Nhân viên</label>
                                                                </div>
                                                                <div class="w-75">
                                                                    <select name="NV"  class="form-control" id="">
                                                                        <option value="">Nhân viên</option>
                                                                        @foreach ($employeeOfDerpartments as $employeeOfDerpartment)
                                                                        @if ($employeeOfDerpartment->Id_NhanVien == $work->Id_NhanVien)
                                                                            <option value="{{$employeeOfDerpartment->Id_NhanVien}}" selected>{{$employeeOfDerpartment->Ho.' '.$employeeOfDerpartment->Ten}}</option>
                                                                            
                                                                        @else
                                                                            <option value="{{$employeeOfDerpartment->Id_NhanVien}}">{{$employeeOfDerpartment->Ho.' '.$employeeOfDerpartment->Ten}}</option>  
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                    {{-- <input type="text" name="nhanvien"  class="form-control"  /> --}}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">Ngày</label>
                                                                </div>
                                                                <div class="w-75">
                                                                    <input type="date" name="ngayNV" value="{{$work->Ngay}}"  class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">Thòi Gian BT</label>
                                                                </div>
                                                                <div class="w-75">
                                                                   <input type="datetime-local" name="ngaybatdauNV" value="{{\Carbon\Carbon::parse($work ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($work ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">Thòi Gian KT</label>
                                                                </div>
                                                                <div class="w-75">
                                                                     <input type="datetime-local" name="ngayketthucNV" value="{{\Carbon\Carbon::parse($work ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($work ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>    
                                                                </div>
                                                            </div> 
                                                            {{-- <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Trạng thái</label><br>
                                                                    <div class="d-flex text-left mb-2 align-items-center">
                                                                        <div class="w-5">
                                                                            <input type="checkbox" name="tinhtrangNV"
                                                                            @if ($work->TinhTrang =='1')
                                                                                checked
                                                                            @endif
                                                                             id="cbphongban"  class="check"  name="checkchon" style="width: 1em; height: 1em;" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  --}}
                                                            <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">Tình trạng</label>
                                                                </div>
                                                                <div class="w-75">
                                                                    <select name="tinhtrangNV"  class="form-control" id="">
                                                                        @if ($work->TinhTrang == 0)
                                                                            <option selected value="0">Đã hoàn thành</option>
                                                                        @endif
                                                                        @if ($work->TinhTrang == 1)
                                                                            <option selected value="1">Xử lý</option>
                                                                        @endif
                                                                        @if ($work->TinhTrang == 3)
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
                                                                            <label>Nội dung</label>
                                                                            <textarea name="noidungNV" id="" class="summernote">{{$work->NoiDung}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="d-flex text-left mb-2 align-items-center">
                                                                <div class="w-25 pl-2 mr-2">
                                                                    <label class="my-auto">File Mô tả</label>s
                                                                </div>
                                                                <div class="w-75">
                                                                    <input type="file" name="filecongviec"  class="form-control"  />
                                                                </div>
                                                            </div> --}}
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
                            @endforeach
                                        <!-- START MODEL giao công việc-->
        <div class="w-50 d-flex justify-content-end">
            <div class="modal fade" id="GiaoViec" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                    {{-- START FORM --}}
                    <form  method="post" action="{{route('assignwork_user')}}">
                        @csrf
                        <div class="modal-content p-3" style="width: 550px;">
                            <div class="flex-row d-flex justify-content-center mb-2">
                                <h2 class="text-info">Giao Việc</h2>
                            </div>
                            <input type="hidden" name="phongban" value="" class="form-control" />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="d-flex flex-row"> 
                                    <label>Nguời giao</label>
                                        @foreach ($checkManager as $ManagerOfDerpartment)                    
                                            @if ($ManagerOfDerpartment->HinhAnh == '')
                                                    @if ($ManagerOfDerpartment ->GioiTinh == 'Nam')
                                                    <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                            @else
                                                <img class="ml-5" src="{{ asset('./images/' . $ManagerOfDerpartment->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                            <p class="ml-3 mt-2">
                                                {{
                                                    $ManagerOfDerpartment->Ho.' '.$ManagerOfDerpartment->Ten
                                                }}
                                            </p>
                                           <input type="hidden" value="{{$ManagerOfDerpartment->Id_NhanVien}}" name="nguoigiao">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-auto mt-3">
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Nhân viên</label>
                                    </div>
                                    <div class="w-75">
                                        <select name="nhanvien"  class="form-control" id="">
                                            <option value="">Nhân viên</option>
                                            @foreach ($employeeOfDerpartments as $employeeOfDerpartment)
                                                <option value="{{$employeeOfDerpartment->Id_NhanVien}}">{{$employeeOfDerpartment->Ho.' '.$employeeOfDerpartment->Ten}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="nhanvien"  class="form-control"  /> --}}
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Ngày</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="date" name="ngay" value="{{$timeNow}}"  class="form-control"  />
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Thòi Gian BT</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="datetime-local" name="ngaybatdau" class="form-control"  placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Thòi Gian KT</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="datetime-local" name="ngayketthuc" class="form-control"  placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="form-row mt-2">  
                                        <div class="col-xl-12 form-group col-xxl-12">
                                        <div class="card-body">
                                            <label>Nội dung</label>
                                            <textarea name="noidung" id="" class="summernote"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">File Mô tả</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="file" name="filecongviec"  class="form-control"  />
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                    <div class="w-25 mr-2"></div>
                                    <div class="w-75 d-flex">
                                        <input type="submit" name="btn" class="btn btn-success w-40" value="Giao việc">
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
            {{-- END MODAL --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

    <div class="col-lg-12" style="">
        <div class="card shadow-lg">
            <div class="card-header">
                <div class="col text-left">
                    <dt>Danh sách hoàn thành công việc</dt>
                </div>
            </div>
            <div class="card-content m-2">
                {{-- <h4>Công việc</h4> --}}
                <table class="table DTtable table-bordered" >
                    <thead class=" text-center  " style="background-color: #5112d4;color:white;">
                    <tr>
                        <th class="w-0 text-white">
                            Stt
                        </th>
                        <th class="w-20 text-white">
                            Nhân viên    
                        </th>
                        <th class="w-25 text-white">
                            Thời Gian
                        </th>
                        <th class="w-30 text-white">
                            Mô tả 
                        </th>
                        <th class="w-10 text-white">
                            Tiến độ
                        </th>
                        <th class="w-10 text-white">
                            Tình trạng
                        </th>
                        <th class="w-0">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sttnv=0?>
                        @foreach ($works as $stt => $work)
                            @foreach ($employeeOfDerpartments as $employeeOfDerpartment)
                                @if ($work->Id_NhanVien == $employeeOfDerpartment->Id_NhanVien)
                                    @if ($work->TinhTrang == 0 || $work->TinhTrang == 3 )
                                        <tr>
                                            <td class="text-center">
                                                {{++$sttnv}}
                                            </td>
                                            <td class="d-flex flex-row">
                                                @if ($work->nhanvien->HinhAnh == '')
                                                    @if ($work ->nhanvien->GioiTinh == 'Nam')
                                                        <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                    @else
                                                        <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('./images/' . $work->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                                @endif
                                                <p class="ml-2 mt-2">
                                                    {{$work->nhanvien->Ho.' '.$work->nhanvien->Ten}}
                                            </p>
                                            </td>
                                            <td class="text-center">
                                                <dt>
                                                {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('d-m-Y H:m')
                                                .' --> '.\Carbon\Carbon::parse($work->ThoiGianKT)->format('d-m-Y H:m')}}
                                                </dt>
                                            </td>
                                            <td>
                                                {!!$work->MoTa!!}
                                            </td>
                                            <td class="text-center">
                                                {{$work->TienDo}}
                                            </td>
                                            <td  class="text-center">
                                                @switch($work->TinhTrang)
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
                                                    <div class="dropdown-menu flex-column">
                                                        <a href="" class="ml-4" style="color: black;" data-toggle="modal" data-target="#edit-{{$work->Id_CongViec}}"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                        <a  style="color: black;" href="{{route('destroywork_user',['id'=>$work->Id_CongViec])}}"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>       
                                    @endif                                
                                @endif
                            @endforeach
         <!-- START MODEL sửa công việc danh sách đã hoàn thành-->
         <div class="w-50 d-flex justify-content-end">
            <div class="modal fade" id="edit-{{$work->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                    {{-- START FORM --}}
                    <form  method="post" action="{{route('editwork_user',['id'=>$work->Id_CongViec])}}">
                        @csrf
                        <div class="modal-content p-3" style="width: 550px;">
                            <div class="flex-row d-flex justify-content-center mb-2">
                                <h2 class="text-info">Sửa công việc</h2>
                            </div>
                            <input type="hidden" name="idnv" value="{{$work->Id_CongViec}}" class="form-control" />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="d-flex flex-row"> 
                                    <label>Nguời giao</label>
                                        <img class="ml-5" src="{{ asset('./images/' . $work->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        <p class="ml-3 mt-2">{{ $work->nguoigiao->Ho.' '.$work->nguoigiao->Ten}}</p>   
                                    </div>
                                </div>
                            </div> 
                            <div class="d-flex flex-column w-auto mt-3">
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Nhân viên</label>
                                    </div>
                                    <div class="w-75">
                                        <select name="NV"  class="form-control" id="">
                                            <option value="">Nhân viên</option>
                                            @foreach ($employeeOfDerpartments as $employeeOfDerpartment)
                                            @if ($employeeOfDerpartment->Id_NhanVien == $work->Id_NhanVien)
                                                <option selected value="{{$employeeOfDerpartment->Id_NhanVien}}" selected>{{$employeeOfDerpartment->Ho.' '.$employeeOfDerpartment->Ten}}</option>
                                            @else
                                                <option value="{{$employeeOfDerpartment->Id_NhanVien}}">{{$employeeOfDerpartment->Ho.' '.$employeeOfDerpartment->Ten}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Ngày</label>
                                    </div>
                                    <div class="w-75">
                                        <input type="date" name="ngayED" value="{{$work->Ngay}}"  class="form-control"  />
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Thòi Gian BT</label>
                                    </div>
                                    <div class="w-75">
                                       <input type="datetime-local" name="ngaybatdauED" value="{{\Carbon\Carbon::parse($work ->ThoiGianBD )->format('Y-m-d').'T'.\Carbon\Carbon::parse($work ->ThoiGianBD )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>

                                        {{-- <input type="datetime-local" name="ngaybatdau" class="form-control"  placeholder="Date" required> --}}
                                    </div>
                                </div>
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Thòi Gian KT</label>
                                    </div>
                                    <div class="w-75">
                                         <input type="datetime-local" name="ngayketthucED" value="{{\Carbon\Carbon::parse($work ->ThoiGianKT )->format('Y-m-d').'T'.\Carbon\Carbon::parse($work ->ThoiGianKT )->format('h:m:s')}}" class="form-control"  placeholder="Date" required>

                                        {{-- <input type="datetime-local" name="ngayketthuc" class="form-control"  placeholder="Date" required> --}}
                                    </div>
                                </div> 
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Tiến độ</label>
                                    </div>
                                    <div class="w-75">
                                         <input type="number" name="tiendoED" value="{{$work->TienDo}}" class="form-control">
                                    </div>
                                </div> 
                                <div class="d-flex text-left mb-2 align-items-center">
                                    <div class="w-25 pl-2 mr-2">
                                        <label class="my-auto">Tình trạng</label>
                                    </div>
                                    <div class="w-75">
                                        <select name="tinhtrangED"  class="form-control" id="">
                                            @if ($work->TinhTrang == 0)
                                                <option selected value="0">Đã hoàn thành</option>
                                            @endif
                                            @if ($work->TinhTrang == 1)
                                                <option selected value="1">Xử lý</option>
                                            @endif
                                            @if ($work->TinhTrang == 3)
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
                                                <textarea name="motaED" id="" class="summernote">{{$work->MoTa}}</textarea>
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
            {{-- END MODAL --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
@else
    <div class="col-lg-12" style="">
        <div class="card shadow-lg">
            <div class="card-header">
                <dt>Công việc được giao</dt>
            </div>
            <div class="card-content m-2">
                <table class="table DTtable table-bordered" >
                    <thead class=" text-center  " style="background-color: #5112d4;color:white;">
                    <tr>
                        <th class="w-5 text-white">
                            Stt
                        </th>
                        <th class="w-25 text-white">
                            Thời Gian
                        </th>
                        <th class="w-20 text-white">
                            Người giao
                        </th>
                        <th class="w-25 text-white">
                            Nội dung 
                        </th>
                        <th class="w-20 text-white">
                            File Mô tả công việc
                        </th>
                        <th class="w-10 text-white">
                            Tình trạng
                        </th>
                        <th class="w-5">
                            
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sttcv=0 ?>
                        @foreach ($works as $work)                           
                            {{-- @if ($work->TinhTrang == 1 && $work->Id_PhongBan == $employees[0]->Id_PhongBan)                                 --}}
                            @if ($work->TinhTrang == 1 && $work->Id_NhanVien == session()->get('user_id'))                                
                                <tr>
                                    <td class="text-center">
                                        {{++$sttcv}}
                                    </td>
                                    <td class="text-center">
                                        <dt>   {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('d-m-Y H:m')
                                            .' --> '.\Carbon\Carbon::parse($work->ThoiGianKT)->format('d-m-Y H:m')}}
                                        </dt>
                                    </td>
                                    <td class="text-left">
                                        <div class="flex d-flex flex-row">
                                            @if ($work->nguoigiao->HinhAnh == '')
                                            @if ($work ->nguoigiao->GioiTinh == 'Nam')
                                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('./images/' . $work->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                        <p class="ml-2 mt-2">
                                            {{$work->nguoigiao->Ho.' '.$work->nguoigiao->Ten}}
                                        </p>
                                        </div>
                                    </td>
                                    <td>
                                        {!!$work->NoiDung!!}
                                    </td>
                                    <td >
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
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Đang xử lý...</span>
                                    </td>
                                    <td class="text-center mr-3">
                                        <div class="dropdown dropdown-action">
                                            <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                            <div class="dropdown-menu ">
                                                <a href="" class="ml-4" style="color: black;"  data-toggle="modal" data-target="#nhanvienhoanthanh-{{$work->Id_CongViec}}"><i class="mdi mdi-wallet-travel"></i> Hoàn thành</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <!-- START MODEL Giao việc-->
                                <div class="w-50 d-flex justify-content-end">
                                    <div class="modal fade" id="nhanvienhoanthanh-{{$work->Id_CongViec}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                            {{-- START FORM --}}
                                            <form  method="post" action="{{route('completework_user',['id'=>$work->Id_CongViec])}}">
                                                @csrf
                                                <div class="modal-content p-3" style="width: 550px;">
                                                    <div class="flex-row d-flex justify-content-center mb-2">
                                                        <h2 class="text-info">Mô tả hoàn thành công việc</h2>
                                                    </div>
                                                    <input type="hidden" name="idloaivanban" class="form-control" />
                                                    <div class="d-flex flex-column w-auto mt-3">
                                                        {{-- <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Phòng ban</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="text" name="phongban" disabled value="{{$work->phongban->TenPhongBan}}"  class="form-control"  />
                                                            </div>
                                                        </div> --}}
                                                        <div class="d-flex text-left mb-2 align-items-center">
                                                            <div class="w-25 pl-2 mr-2">
                                                                <label class="my-auto">Đánh Giá TD</label>
                                                            </div>
                                                            <div class="w-75">
                                                                <input type="text" name="tiendocpl" placeholder="Đánh giá tiến độ công việc"  class="form-control"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-2">  
                                                            <div class="col-xl-12 form-group col-xxl-12">
                                                                <div class="card-body">
                                                                    <label>Mô tả</label>
                                                                    <textarea name="motacpl" id="" class="summernote"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                            <div class="w-25 mr-2"></div>
                                                            <div class="w-75 d-flex">
                                                                <input type="submit" name="btn" class="btn btn-success w-40" value="Hoàn thành">
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
                            {{-- END MODAL --}}
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="">
        <div class="card shadow-lg">
            <div class="card-header">
                <dt>Công việc đã hoàn thành</dt>
            </div>
            <div class="card-content m-2">
                <table class="table DTtable table-bordered" >
                    <thead class=" text-center  " style="background-color: #5112d4;color:white;">
                    <tr>
                        <th class="w-5 text-white">
                            Stt
                        </th>
                        <th class="w-25 text-white">
                            Thời Gian
                        </th>
                        <th class="w-20 text-white">
                            Người giao
                        </th>
                        <th class="w-25 text-white">
                            Công việc
                        </th>
                        <th class="w-15 text-white">
                            File Mô tả công việc
                        </th>
                        <th class="w-10 text-white">
                            Tiến độ
                        </th>
                        <th class="w-10 text-white">
                            Tình trạng
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sttcv=0 ?>
                        @foreach ($works as $work)                           
                            @if ($work->Id_NhanVien == session()->get('user_id'))                                
                                @if ($work->TinhTrang == 0 || $work->TinhTrang == 3)
                                <tr>
                                    <td class="text-center">
                                        {{++$sttcv}}
                                    </td>
                                    <td class="text-center">
                                        <dt>
                                            {{\Carbon\Carbon::parse($work->ThoiGianBD)->format('d-m-Y H:m')
                                            .' --> '.\Carbon\Carbon::parse($work->ThoiGianKT)->format('d-m-Y H:m')}}
                                        </dt>
                                    </td>
                                    <td class="text-left">
                                        <div class="flex d-flex flex-row">
                                            @if ($work->nguoigiao->HinhAnh == '')
                                            @if ($work ->nguoigiao->GioiTinh == 'Nam')
                                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('./images/' . $work->nguoigiao->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                        <p class="ml-2 mt-2">
                                            {{$work->nguoigiao->Ho.' '.$work->nguoigiao->Ten}}
                                        </p>
                                        </div>
                                    </td>
                                    <td>
                                        {!!$work->NoiDung!!}
                                    </td>
                                    <td >
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
                                    </td>
                                    <td class="text-center">
                                        {{
                                            $work->TienDo
                                        }}
                                    </td>
                                    <td class="text-center">
                                        @switch($work->TinhTrang)
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
                                        {{-- <span class="badge badge-pill badge-success text-white" style="font-size:15px">Đã hoàn thành</span> --}}
                                    </td>
                                </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>     
@endif
@endsection

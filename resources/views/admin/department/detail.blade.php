@extends('index')
@section('content')
<!-- Tiêu đề -->
<div class="mr-1 ml-1">    
<div class=" row page-titles shadow-lg mx-0">
    @foreach ($departments as $department) 
    <div class="col-sm-4">
        <h3>{{$department->TenPhongBan}}</h3>
    </div>
    <div class="col mt-2">
        <h4>Tổng nhân viên: {{$sumDepartment}}</h4>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('department')}}">Phòng ban</a></li>
            <li class="breadcrumb-item active"><a href="">{{$department->TenPhongBan}}</a></li>
            @endforeach
        </ol>
    </div>
</div>
<div class="row " style="margin-top: -25px; ">
    <div class="col-lg-12">
        <div class="card">
        <div class=" ml-2 mr-2 mt-2 " style="width: auto; margin-bottom:30px;" >
            <table class="form-group  table table-striped table-bordered" style="width: 1200px;" >
            <thead class="text-center text-nowrap thead-light">
            <tr>
                <th class="w-5">
                    STT
                </th>
                <th>
                    Nhân viên
                </th>
                <th class="w-5">
                    Mã NV
                </th>
                <th>
                    Giới tính
                </th>
                <th>
                    Chức vụ
                </th>
                <th>
                    Ngày vào trường
                </th>
                <th>
                    Bắt đầu công tác
                </th>
                <th>
                    Biên chế
                </th>
                <th>
                    Trạng thái
                </th>
            </tr>
            </thead>
        <tbody>
            <?php $stt=0?>
            @foreach ($employees as $employee)                
            <tr>
                <td class="text-center">
                    {{++$stt}}
                </td>
                {{-- <td style="text-align: center">
                    @if ($employee->HinhAnh == '')
                        @if ($employee ->GioiTinh == 'Nam')
                            <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                        @else
                            <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                        @endif
                    @else
                        <img src="{{ asset('./images/' . $employee ->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                    @endif
                </td> --}}
                <td>
                    <div class="d-flex flex-row">
                        @if ($employee->HinhAnh == '')
                            @if ($employee->GioiTinh == 'Nam')
                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                            @else
                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                            @endif
                        @else
                            <img src="{{ asset('./images/' . $employee->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                        @endif
                        <a class="ml-2 mt-2" href="{{ route('detailemployeeofdepart',['id'=>$employee->Id_NhanVien])}}" >{{$employee->Ho.' '.$employee->Ten}}</a>
                        
                        {{-- <p class="ml-2 mt-2">
                            
                        {{$employee->Ho.' '.$employee->Ten}}
                        </p> --}}
                    </div> 
                </td>
                <td style="text-align: center">
                    {{$employee->Id_NhanVien}}
                </td>
                <td style="text-align: center">
                    {{$employee->GioiTinh}}
                </td>
                <td style="text-align: center">
                    {{$employee->chucvu->TenChucVu}}
                </td>
                <td style="text-align: center">
                    {{\Carbon\Carbon::parse($employee->NgayVaoTruong )->format('d-m-Y')}}
                </td>
                <td style="text-align: center">
                    {{ \Carbon\Carbon::parse($employee->BatDauCongTac )->format('d-m-Y')}}
                </td>
                <td style="text-align: center">
                    @if ($employee->BienChe == 1)
                        <span class="badge badge-pill badge-success">Đã vào biên chế</span>
                    @else
                        <span class="badge badge-pill badge-danger">Chưa vào biên chế</span>
                    @endif
                </td>
                <td style="text-align: center">
                    @if ($employee->TrangThai == 1)
                        <span class="badge badge-pill badge-success">Đang hoạt động</span>
                    @else
                        <span class="badge badge-pill badge-danger">Ngừng hoạt động</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
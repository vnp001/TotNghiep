@extends('index')
@section('content')
                                {{-- NỘI DUNG TRANG EMPLOYEE--}}
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <div style="display:flex;">
                <h3>Trình độ/Chức vụ </h3>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">nhân viên</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">trình độ</a></li>
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    <div class="row ml-1 " style="margin-top: -25px">
        <div class="card w-auto">
            <div class=" ml-2 mr-2" style="margin-bottom:30px;" >
                <table class="table table-striped table-bordered" style="width: 1220px;" >
                <thead class="text-center text-nowrap thead-light">
                <tr>
                    <th class="w-5">
                        STT
                     </th>
                    <th class="">
                        Ảnh
                     </th>
                    <th class="w-5">
                        Mã NV
                    </th>
                    <th class="w-20">
                        Họ Tên
                    </th>
                    <th class="w-15">
                        Chức vụ
                    </th>
                    <th class="">
                        Trình độ ngoại ngữ
                    </th>
                    <th class="w-10">
                        Trình độ chuyên môn
                    </th>
                    <th>
                        Trình độ tin học
                    </th>
                    <th class="w-10">
                        Trình độ chính trị
                    </th>
                </tr>
                </thead>
            <tbody>
                @foreach($listdegree as $stt => $value)
                <tr>
                    <td style="text-align: center">
                        {{++$stt}}
                    </td>
                    <td style="text-align: center">
                        @if ($value ->HinhAnh == '')
                            @if ($value ->GioiTinh == 'Nam')
                                <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                            @else
                                <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                            @endif
                        @else
                            <img src="{{ asset('./images/' . $value ->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                        @endif
                    </td>
                    <td style="text-align: center">{{$value ->Id_NhanVien }}</td>
                    <td class="align-middle text-left " >{{$value ->Ho }} {{$value ->Ten }}</td>
                    <td style="text-align: center">
                        {{-- @foreach ($value->chucvu as $valuechucvu) --}}
                           {{$value->chucvu->TenChucVu}}
                        {{-- @endforeach --}}
                    </td>
                    <td style="text-align: center">
                        {{$value->ngoaingu->TrinhDo}}
                    </td>
                    <td style="text-align: center">
                        {{$value->trinhdochuyenmon->TrinhDo}}
                    </td>
                    <td style="text-align: center">
                        {{$value->tinhoc->TrinhDo}}
                    </td>
                    <td style="text-align: center">
                        {{$value->chinhtri->TrinhDo}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>    
</div>
@endsection
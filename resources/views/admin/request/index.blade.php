@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3> xủ lý yêu cầu</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('request')}}">yêu cầu</a></li>
                {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> --}}
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    <div class="row ml-1 " style="margin-top: -25px">
        <div class="col-lg-12">
            <div class="card">
                <table class="table table-striped table-bordered ml-2 mb-2 mr-2 mt-2" style="width: 100%;" >
                    <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                STT
                            </th>
                            <th class="w-5">
                                Hỉnh ảnh
                            </th>
                            <th class="w-15">
                                nhân viên
                            </th>
                            <th class="w-15">
                                phòng
                            </th>
                            <th class="w-10">
                                yêu cầu
                            </th>
                            <th class="w-25">
                                Mô tả
                            </th>
                            <th class="w-10">
                                Ngày
                            </th>
                            <Th class="w-5">
                                Tình trạng
                            </Th>
                            <th class="w-0">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listRequest as $stt => $value)
                        
                        <tr>
                            <td class="text-center">
                                {{++$stt}}
                            </td>
                            <td style="text-align: center">
                                    @if ($value->nhanvien->HinhAnh == '')
                                        @if ($valuenhanvien ->GioiTinh == 'Nam')
                                            <img src="{{ asset('./Images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                                        @else
                                            <img src="{{ asset('./Images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                                        @endif
                                        @else
                                            <img src="{{ asset('./Images/'. $value->nhanvien->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                                    @endif
                                {{-- {{$value->Id_NhanVien}} --}}
                            </td>
                            <td class="text-left">
                                {{$value->nhanvien->Ho.' '.$value->nhanvien->Ten}}
                            </td>
                            <td class="text-left">
                                {{$value->nhanvien->phongban->TenPhongBan}}
                            </td>
                            <td class="text-lèt">
                                {{$value->loaiyeucau->TenLoaiYeuCau}}
                            </td>
                            <td class="text-left">
                                {!!$value->MoTa!!}
                            </td>
                            <td class="text-center">
                                {{\Carbon\Carbon::parse($value->Ngay)->format('d-m-Y')}}
                            </td>
                            <td style="text-align: center">
                                @switch($value->TinhTrang)
                                    @case(0)
                                        <span class="badge badge-pill badge-warning text-white" style="font-size:15px">Chưa duyệt...</span>
                                        @break
                                    @case(1)
                                        <span class="badge badge-pill badge-success text-white" style="font-size:15px">Đã xử lý</span>
                                        @break
                                    @default
                                        <span class="badge badge-pill badge-danger text-white" style="font-size:15px">không duyệt</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center mr-3">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-center">
                                        <form action="{{ route('agreerequest',['id'=>$value->Id_YeuCau])}}" method="POST">
                                        @csrf 
                                            <input type="hidden" name="dongy" value="{{$value->Id_NhanVien}}">
                                            <button class="btn btn-success w-70 ml-4"><i class="mdi mdi-check"></i> Duyệt</button>   
                                        </form>                             
                                       <form action="{{ route('removerequest',['id'=>$value->Id_YeuCau])}}" method="POST">
                                        @csrf
                                            <input type="hidden" name="tuchoi" value="{{$value->Id_NhanVien}}">
                                            <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> không duyệt</button>
                                        </form>
                                    </div>
                                </div>
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
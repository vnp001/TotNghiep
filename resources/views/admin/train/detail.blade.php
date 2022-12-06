@extends('index')
@section('content')
@foreach ($detailtrains as $detail)
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Đào tạo: {{ Illuminate\Support\Str::lower($detail->TenDaoTao)}}</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('train')}}">Đào tạo</a></li>
                <li class="breadcrumb-item active" ><a href="">Chi tiết</a></li>
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
                        <div class="col-lg-6 ml-5">
                            <div class="row">
                                <div class="col-lg-8 mt-3" style="border-right: 2px dashed #ccc;">
                                    <h4 class="mt-2">Tên đào tạo:{{' '.$detail->TenDaoTao}}</h4>
                                    <h5 class="mt-3">Loại đào tạo:{{' '.$detail->loaidaotao->TenLoaiDaoTao}}</h5>
                                    <button class="btn btn-secondary w-70 ml-4" data-toggle="modal" data-target="#modaladd">Thêm nhân viên</button>                                 
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 w-auto ml-2">
                            <ul class="mt-2">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Ngày Bắt đầu
                                        </div>
                                        <div class="col-lg-7">
                                            {{' '.\Carbon\Carbon::parse($detail->NgayBatDau)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Ngày Kết Thúc
                                        </div>
                                        <div class="col-lg-7">
                                            {{' '.\Carbon\Carbon::parse($detail->NgayKetThuc)->format('d-m-Y')}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Chi phí
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->ChiPhi}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Nơi đào tạo
                                        </div>
                                        <div class="col-lg-7">
                                            {{$detail->NoiTaoDao}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            Tình trạng
                                        </div>
                                        <div class="col-lg-7">
                                            @switch($detail->TinhTrang)
                                            @case(0)
                                                <span class="badge badge-pill badge-dark">Kết thúc</span>
                                                @break
                                            @case(1)
                                                <span class="badge badge-pill badge-success">Đang mở</span>                                    
                                                @break
                                            @default
                                                
                                        @endswitch
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
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    Nhân viên tham gia
                </div>
                <div class="card-content m-2">
                    <table class="table table-striped table-bordered">
                        <thead class="text-center text-nowrap thead-light">
                        <tr>
                            <th class="w-5">
                                Stt
                            </th>
                            <th class="w-20">
                                Nhân viên
                            </th>
                            <th class="w-20">
                                Đào tạo
                            </th>
                            <th class="w-20">
                                Thời gian
                            </th>
                            <th class="w-10">
                                Kết quả
                            </th>
                            <th class="w-30">
                                Ghi chú
                            </th>
                            <th class="w-5">
    
                            </th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach ($resulTrains as $stt => $result)
                            <tr>
                                <td style=" text-align: center ">
                                    {{++$stt}}
                                </td>
                                <td>
                                    <div class="d-flex flex-row">
                                        @if ($result->nhanvien->HinhAnh == '')
                                            @if ($result->nhanvien->GioiTinh == 'Nam')
                                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('./images/' . $result->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                        <p class="ml-2 mt-2">
                                        {{$result->nhanvien->Ho.' '.$result->nhanvien->Ten}}
                                        </p>
                                    </div> 
                                </td>
                                <td>
                                    {{$result->daotao->TenDaoTao}}
                                </td>
                                <td class="text-center">
                                    {{
                                    \Carbon\Carbon::parse($result->daotao->NgayBatDau)->format('d-m-Y').' --> '.\Carbon\Carbon::parse($result->daotao->NgayKetThuc)->format('d-m-Y')
                                    }}
                                    </td>
                                <td class="text-center">
                                    @switch($result->KetQua)
                                        @case('Đậu')
                                            <span class="badge badge-pill badge-success " style="height: 30px;width: 100px;font-size: 15px;">Đậu</span>
                                            @break
                                        @case('Rớt')
                                            <span class="badge badge-pill badge-dark" style="height: 30px;width: 100px;font-size: 15px;">Rớt</span>                                    
                                            @break
                                        @default
                                            
                                    @endswitch
                                </td>
                                <td>
                                    {!!$result->GhiChu!!}
                                </td>
                                <td  style=" text-align: center ">
                                    <div class="dropdown dropdown-action">
                                        <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-center">
                                            <button  data-toggle="modal" data-target="#modalEdit-{{$result->Id_KetQuaDT}}" class="btn btn-success w-70 ml-4">Cập nhập kết quả</button>                                 
                                            <form  action="{{ route('destroyresults', ['id'=>$result->Id_KetQuaDT]) }}">
                                            @csrf
                                                <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <!-- START MODEL SỬA -->
                        <div class="w-50 d-flex justify-content-end">
                            <div class="modal fade" id="modalEdit-{{$result->Id_KetQuaDT}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                    {{-- START FORM --}}
                                    <form  method="post" action="{{ route('updateresults',['id'=>$result->Id_KetQuaDT])}}">
                                        @csrf
                                        <div class="modal-content p-3" style="width: 550px;">
                                            <div class="flex-row d-flex justify-content-center mb-2">
                                                <h2 class="text-info">Cập nhập kết quả</h2>
                                            </div>
                                            <input type="hidden" name="idketquadaotao" class="form-control" required value="{{$result->Id_KetQuaDT}}"/>
                                            <div class="d-flex flex-column w-auto mt-3">
                                                {{-- <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-25 pl-2 mr-2">
                                                        <label class="my-auto">Tên đào tạo</label>
                                                    </div>
                                                    <div class="w-75">
                                                        <input type="text" name="daotaoUD" required class="form-control" value="{{$typeoftrain->TenLoaiDaoTao}}" />
                                                    </div>
                                                </div> --}}
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-25 pl-2 mr-2">
                                                        <label class="my-auto">Nhân viên</label>
                                                    </div>
                                                    <div class="w-75">
                                                        <select required name="nhanvienUD" class="form-control" id="">
                                                            <option value="{{$result->Id_NhanVien}}">{{$result->nhanvien->Ho.' '.$result->nhanvien->Ten}}</option>
                                                        </select>
                                                        {{-- <input type="text" name="loaidaotaoUD"  value="{{$typeoftrain->TenLoaiDaoTao}}" /> --}}
                                                    </div>
                                                </div>
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-25 pl-2 mr-2">
                                                        <label class="my-auto">Đào tạo</label>
                                                    </div>
                                                    <div class="w-75">
                                                        <select required name="daotaoUD" class="form-control" id="">
                                                            <option value="{{$result->Id_DaoTao}}">{{$result->daotao->TenDaoTao}}</option>
                                                        </select>
                                                        {{-- <input type="text" name="loaidaotaoUD" required class="form-control" value="{{$typeoftrain->TenLoaiDaoTao}}" /> --}}
                                                    </div>
                                                </div>
                                                <div class="d-flex text-left mb-2 align-items-center">
                                                    <div class="w-25 pl-2 mr-2">
                                                        <label class="my-auto">Kết quả</label>
                                                    </div>
                                                    <div class="w-75">
                                                        <select required name="ketquaUD" class="form-control" id="">
                                                            <option value="">Kết quả</option>
                                                            <option value="Đậu">Đậu</option>
                                                            <option value="Rớt">Rớt</option>
                                                        </select>
                                                        {{-- <input type="text" name="loaidaotaoUD" required class="form-control" value="{{$typeoftrain->TenLoaiDaoTao}}" /> --}}
                                                    </div>
                                                </div >
                                                <div class="form-row" >
                                                    <div class="col-lg-12">
                                                        <div class="card-body">
                                                            <label>Ghi chú</label>
                                                            <textarea  class="summernote"  name="ghichuUD">{{$result->GhiChu}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                    <div class="w-25 mr-2"></div>
                                                    <div class="w-75 d-flex">
                                                        <input type="submit" name="btn" class="btn btn-success w-40" value="Cập nhập">
                                                        <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                        <!-- <button id= "btnCreate" type="submit" class="btn btn-primary w-50" onclick="return validateInput()">Thêm</button> -->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- @endforeach --}}
                            </div>
                            {{-- END MODAL  --}}
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- START MODEL thêm -->
  <div class="w-50 d-flex justify-content-end">
    <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
            {{-- START FORM --}}
            <form  method="post" action="{{ route('addEmployeeTrain')}}">
                @csrf
                <div class="modal-content p-3" style="width: 550px;">
                    <div class="flex-row d-flex justify-content-center mb-2">
                        <h2 class="text-info">Thêm nhân viên</h2>
                    </div>
                    <input type="hidden" name="addiddaotao" class="form-control" required value="{{$detail->Id_DaoTao}}"/>
                    <div class="d-flex flex-column w-auto mt-3">
                        <div class="d-flex text-left mb-2 align-items-center">
                            <div class="w-25 pl-2 mr-2">
                                <label class="my-auto">Nhân viên</label>
                            </div>
                            <div class="w-75">
                                <select required name="addnhanvien" class="form-control" id="">
                                    <option value="">nhân viên</option>
                                    @foreach ($addEmployees as $addEmployee)
                                        @if ($addEmployee->Id_NhanVien == '1')
                                            <option value="{{$addEmployee->Id_NhanVien}}" disabled>{{$addEmployee->Ho.' '.$addEmployee->Ten}}</option>                                         
                                        @else
                                            <option value="{{$addEmployee->Id_NhanVien}}">{{$addEmployee->Ho.' '.$addEmployee->Ten}}</option>
                                            
                                        @endif                                                            
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="loaidaotaoUD"  value="{{$typeoftrain->TenLoaiDaoTao}}" /> --}}
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end my-0 mt-4">
                            <div class="w-25 mr-2"></div>
                            <div class="w-75 d-flex">
                                <input type="submit" name="btn" class="btn btn-success w-40" value="Thêm nhân viên">
                                <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                <!-- <button id= "btnCreate" type="submit" class="btn btn-primary w-50" onclick="return validateInput()">Thêm</button> -->
                            </div>
                        </div>
                </div>
            </div>
        </form>
        {{-- @endforeach --}}
    </div>
    {{-- END MODAL  --}}
@endforeach
@endsection
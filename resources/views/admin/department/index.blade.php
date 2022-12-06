@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Phòng ban</h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Phòng ban</a></li>
                {{-- <li class="breadcrumb-item active"><a href="{{route('typedoc')}}">loại văn bản</a></li> --}}
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

    {{-- FORM loại đào tạo--}}
    <div class="row " style="margin-top: -25px">
       <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{ route('storedepart')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Phòng ban</label>
                                <input type="text" class="form-control" name="tenphongban" value="" placeholder="Tên phòng ban" required>
                            </div> 
                            <div class="form-group col-md-12">
                                <select name="nguoiquanly"class="form-control" id="">
                                    <option value="">chọn</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->Id_NhanVien}}">{{$employee->Ho.' '.$employee->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>                   
                        </div>
                        <button type="submit" style="margin-left: 300px; width:100px;height:40px;font-size: 20px;" class="btn  btn-primary">Tạo</button>
                    </form>
                </div>
            </div>   
       </div>
       <div class="col-lg-7">
           <div class="card shadow-lg">
               <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="text-center text-nowrap thead-light">
                    <tr>
                        <th class="w-5">
                            Mã
                        </th>
                        <th class="">
                            Tên phòng ban
                        </th>
                        <th>
                            Trưởng phòng 
                        </th>
                        <th class="w-0">
                        </th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td style=" text-align: center ">
                                {{$department->Id_PhongBan}}
                            </td>
                            <td>
                                <a href="{{route('detaildepart',['id'=>$department->Id_PhongBan])}}">{{$department->TenPhongBan}}</a>
                            </td>
                            <td>
                                <div class="d-flex flex-row">
                                    @if ( $department->NguoiQuanLy != null)                                        
                                        @if ($department->truongphong->HinhAnh == '')
                                            @if ($department->truongphong->GioiTinh == 'Nam')
                                                <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @else
                                                <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('./images/' . $department->truongphong->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                        <p class="ml-2 mt-2">
                                        {{$department->truongphong->Ho.' '.$department->truongphong->Ten}}
                                        </p>
                                    @endif
                                </div> 
                            </td>
                            <td  style=" text-align: center ">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-center">
                                        <button  data-toggle="modal" data-target="#modalEdit-{{$department->Id_PhongBan}}" class="btn btn-success w-70 ml-4"><i class="fa fa-pencil m-r-5"></i> Sửa</button>                                 
                                        <form  action="{{ route('destroydepart', ['id'=>$department->Id_PhongBan]) }}">
                                        @csrf
                                        <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <!-- START MODEL SỬA PHÒNG BAN-->
                    <div class="w-50 d-flex justify-content-end">
                        <div class="modal fade" id="modalEdit-{{$department->Id_PhongBan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                {{-- START FORM --}}
                                <form  method="post" action="{{ route('updatedepart',['id'=>$department->Id_PhongBan])}}">
                                    @csrf
                                    <div class="modal-content p-3" style="width: 550px;">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Sửa loại đào tạo</h2>
                                        </div>
                                        <input type="hidden" name="idloaivanban" class="form-control" required value="{{$department->Id_PhongBan}}"/>
                                        <div class="d-flex flex-column w-auto mt-3">
                                            <div class="d-flex text-left mb-2 align-items-center">
                                                <div class="w-25 pl-2 mr-2">
                                                    <label class="my-auto">Tên phòng ban</label>
                                                </div>
                                                <div class="w-75">
                                                    <input type="text" name="editenphongban" required class="form-control" value="{{$department->TenPhongBan}}" />
                                                </div>
                                            </div>
                                            <div class="d-flex text-left mb-2 align-items-center">
                                                <div class="w-25 pl-2 mr-2">
                                                    <label class="my-auto">Trưởng phòng</label>
                                                </div>
                                                <div class="w-75">
                                                    <select name="editnguoiquanly" id="remain-open"class="form-control" required>
                                                        <option value="{{$department->NguoiQuanLy}}">{{$department->NguoiQuanLy}}</option>
                                                        <option value="">chọn</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{$employee->Id_NhanVien}}">{{$employee->Ho.' '.$employee->Ten}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="text" name="tenloaivanban"  class="form-control" value="{{$department->TenPhongBan}}" /> --}}
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
                            {{-- @endforeach --}}
                        </div>
                        {{-- END MODAL PHÒNG BAN --}}
                        @endforeach
                </tbody>
                </table>
               </div>
           </div>
       </div>
    </div>
    {{-- END Form PHÒNG BAN--}}
      
</div>
@endsection 
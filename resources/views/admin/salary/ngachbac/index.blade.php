@extends('index')
@section('content')
<!-- Tiêu đề -->
<div class="mr-1 ml-1">    
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>
                Danh sách ngạch và bậc lương
            </h3>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">danh sách</a></li>
                {{-- <li class="breadcrumb-item active"><a href="{{route('laudatory')}}">khen thưởng</a></li> --}}
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
<div class="col-lg-12">
    {{-- <div class="card">
        <div class="card-body"> --}}
            <div id="accordion-nine" class="shadow-lg accordion accordion-active-header shadow-lg">
                <div class="accordion__item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#active-header_collapseOne">
                            <span class="accordion__header--icon"></span>
                            <h4 class="accordion__header--text">Thêm ngạch bậc</h4>
                            <span class="accordion__header--indicator"></span>
                        </div>
                    </div>
                    <div id="active-header_collapseOne" class="collapse accordion__body show" data-parent="#accordion-nine">
                        <div class="accordion__body--text"> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tùy chọn</label><br>
                                    <div class="d-flex text-left mb-2 align-items-center">
                                        <div class="w-5">
                                            <input type="radio"  onclick="check()" id="cbphongban"  class="check" value="phongban"  name="checkchon" style="width: 1em; height: 1em;" required>
                                        </div>
                                        <div class="w-30 pl-2 mr-2">
                                            <label class="my-auto">Thêm ngạch</label>
                                        </div>
                                        <div class="w-5">
                                            <input type="radio" onclick="check()" class="check" id="cbnhanvien" value="nhanvien" name="checkchon" style="width: 1em; height: 1em;">
                                        </div>
                                        <div class="w-40 pl-2 mr-2">
                                            <label class="my-auto">Thêm bậc</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="phongban" class="form-row">
                                <form action="{{route('storengach')}}" method="post">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label>Mã Ngạch</label>
                                        <input type="text" class="form-control" value="{{$sumNgach+1}}" placeholder="Mã ngạch" name="mangach" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tên ngạch</label>
                                        <input type="text" class="form-control" name="tenngach" placeholder="Tên ngạch" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Mô tả</label>
                                        <textarea name="mota" id="" class="summernote" placeholder="Mô tả"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col">
                                            <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Thêm</button>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </form>              
                            </div> 
                            <div id="nhanvien" class="form-row">
                                <form action="{{route('storebac')}}" method="post">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label>Ngạch</label>
                                            <select name="ngach" class="form-control" id="">
                                                <option value="">Mã ngạch -- Tên ngạch</option>
                                                @foreach ($listngachs as $listngach)
                                                    <option value="{{$listngach->Id}}">{{$listngach->MaNgach.' -- '.$listngach->Ngach }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Chức vụ</label>
                                        <select name="chucvu" class="form-control" id="">
                                            <option value="">chức vụ -- hệ số phụ cấp</option>
                                            @foreach ($positions as $position)
                                                <option value="{{$position->Id_ChucVu}}">{{$position->TenChucVu.' -- '.$position->HeSoPhuCap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group col-md-6">
                                            <label>Tên bậc</label>
                                            <input type="text" placeholder="tên bậc"  class="form-control" name="tenbac">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group col-md-6">
                                            <label>Lương cơ bản</label>
                                            <input type="text" placeholder="Lương cơ bản" class="form-control" name="luongcoban">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Hệ số lương</label>
                                            <input type="text" placeholder="hệ số lương"  class="form-control" name="hesoluong">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col">
                                            <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Thêm</button>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </form>                    
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div> --}}
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    Danh sách ngạch
                </div>
                <div class="m-2 card-content">
                    <table class=" table table-striped table-bordered">
                        <thead class="text-center text-nowrap " style="background-color: #e9ecef">
                            <tr>
                                <td class="w-5">
                                    Stt
                                </td>
                                <td class="w-5">
                                    Mã ngạch
                                </td>
                                <td class="w-40">
                                    Tên ngạch
                                </td>
                                <td class="w-50">
                                    Mô tả
                                </td>
                                <td class="w-0">
                                    
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ngachs as $stt=> $ngach)
                                <tr>
                                    <td class="text-center">
                                        {{++$stt}}
                                    </td>
                                    <td class="text-center">
                                        {{$ngach->MaNgach}}
                                    </td>
                                    <td class="text-left">
                                        {{$ngach->Ngach}}
                                    </td>
                                    <td class="text-left">
                                        {{-- {{$ngach->MoTa}} --}}
                                        {!!$ngach->MoTa!!}
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_ngach-{{$ngach->Id}}"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                <a class="dropdown-item" href="{{route('destroyngach',['id'=>$ngach->Id])}}"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    <!-- START MODEL lương-->
                                        <div class="w-50 d-flex justify-content-end">
                                            <div class="modal fade" id="edit_ngach-{{$ngach->Id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                                    {{-- START FORM --}}
                                                    <form  method="post" action="{{route('updatengach',['id'=>$ngach->Id])}}">
                                                        @csrf
    
                                                        <div class="modal-content p-3" style="width: 550px;">
                                                            <div class="flex-row d-flex justify-content-center mb-2">
                                                                <h2 class="text-info">Sửa ngạch</h2>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                                <div class="w-15 pl-2 mr-2">
                                                                    <label class="my-auto">Mã ngạch</label>
                                                                </div>
                                                                <div class="w-70">
                                                                    <input type="text" name="mangachUD" value="{{$ngach->MaNgach}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                                <div class="w-15 pl-2 mr-2">
                                                                    <label class="my-auto">Tên ngạch</label>
                                                                </div>
                                                                <div class="w-70">
                                                                    <input type="text" name="tenngachUD" value="{{$ngach->Ngach}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-row mt-2">  
                                                                <div class="col-xl-12 form-group col-xxl-12">
                                                                    <div class="card-body">
                                                                        <label>Mô tả</label>
                                                                        <textarea name="motaUD" id="" class="summernote">{{$ngach->MoTa}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                                    <div class="w-10 mr-2"></div>
                                                                    <div class="w-75 d-flex">
                                                                        <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                                        <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    {{-- END FORM --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODEL -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    Danh sách bậc
                </div>
                <div class="m-2 card-content">
                    <table class="form-group  table table-striped table-bordered">
                        <thead class="text-center text-nowrap "style="background-color: #e9ecef">
                            <tr>
                                <td class="w-5">Stt</td>
                                <td class="w-40">Tên ngạch</td>
                                <td class="w-10">Bậc</td>
                                <td class="w-10">Chức vụ</td>
                                <td class="w-10">Hệ số phụ cấp</td>
                                <td class="w-10">Hệ số lương</td>
                                <td class="w-10">Lương cơ bản</td>
                                <td class="w-0"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bacs as $stt=> $bac)
                                <tr>
                                    <td class="text-center">{{++$stt}}</td>
                                    {{-- <td class="text-center">{{$bac->ngach->MaNgach}}</td> --}}
                                    <td class="text-left">{{$bac->ngach->Ngach}}</td>
                                    <td class="text-center">{{$bac->TenBac}}</td>
                                    <td class="text-center">{{$bac->chucvu->TenChucVu}}</td>
                                    <td class="text-center">{{$bac->chucvu->HeSoPhuCap}}</td>
                                    <td class="text-center">{{$bac->HeSoLuong}}</td>
                                    <td class="text-center">{{$bac->LuongCoBan}}</td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_bac-{{$bac->Id}}"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                <a class="dropdown-item" href="{{route('destroybac',['id'=>$bac->Id])}}"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    <!-- START MODEL bac-->
                                    <div class="w-50 d-flex justify-content-end">
                                        <div class="modal fade" id="edit_bac-{{$bac->Id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                                {{-- START FORM --}}
                                                <form  method="post" action="{{route('updatebac',['id'=>$bac->Id])}}">
                                                    @csrf
                                                    <div class="modal-content p-3" style="width: 550px;">
                                                        <div class="flex-row d-flex justify-content-center mb-2">
                                                            <h2 class="text-info">Sửa Bậc</h2>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                            <div class="w-15 pl-2 mr-2">
                                                                <label class="my-auto">ngạch</label>
                                                            </div>
                                                            <div class="w-70">
                                                                <select name="ngachUD" class="form-control" id="">
                                                                    <option value="">Mã ngạch -- Tên ngạch</option>
                                                                    @foreach ($listngachs as $listngach)
                                                                    @if ($bac->Id_Ngach == $listngach->Id)
                                                                        <option selected value="{{$listngach->Id}}">{{$listngach->MaNgach.' -- '.$listngach->Ngach }}</option>
                                                                    @else
                                                                        <option value="{{$listngach->Id}}">{{$listngach->MaNgach.' -- '.$listngach->Ngach }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                            <div class="w-15 pl-2 mr-2">
                                                                <label class="my-auto">chức vụ</label>
                                                            </div>
                                                            <div class="w-70">
                                                                <select name="chucvuUpdate" class="form-control" id="">
                                                                    <option value="">chức vụ -- hệ số phụ cấp</option>
                                                                    @foreach ($positions as $position)
                                                                        @if ($bac->Id_ChucVu == $position->Id_ChucVu)
                                                                            <option selected value="{{$position->Id_ChucVu}}">{{$position->TenChucVu.' -- '.$position->HeSoPhuCap }}</option>
                                                                        @else
                                                                            <option value="{{$position->Id_ChucVu}}">{{$position->TenChucVu.' -- '.$position->HeSoPhuCap }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                            <div class="w-15 pl-2 mr-2">
                                                                <label class="my-auto">Tên bậc</label>
                                                            </div>
                                                            <div class="w-70">
                                                                <input type="text" class="form-control" name="tenbacUD" value="{{$bac->TenBac}}" id="">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                            <div class="w-15 pl-2 mr-2">
                                                                <label class="my-auto">Hệ số lương</label>
                                                            </div>
                                                            <div class="w-70">
                                                                <input type="text" class="form-control" name="hesoluongUD" value="{{$bac->HeSoLuong}}" id="">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex text-left mb-2 mt-4 align-items-center">
                                                            <div class="w-15 pl-2 mr-2">
                                                                <label class="my-auto">Lương cơ bản</label>
                                                            </div>
                                                            <div class="w-70">
                                                                <input type="text" class="form-control" name="luongcobanUD" value="{{$bac->LuongCoBan}}" id="">
                                                            </div>
                                                        </div>
                                                            <div class="d-flex flex-row justify-content-end my-0 mt-4">
                                                                <div class="w-10 mr-2"></div>
                                                                <div class="w-75 d-flex">
                                                                    <input type="submit" name="btn" class="btn btn-success w-40" value="Sửa">
                                                                    <input type="submit" class="btn btn-info w-40 mr-2 ml-5" data-dismiss="modal" value="Đóng">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                {{-- END FORM --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODEL -->
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
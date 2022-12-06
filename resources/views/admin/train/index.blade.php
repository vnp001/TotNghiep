@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Đào tạo</h3>
        </div>
      
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Đào tạo</a></li>
                {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li> --}}
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
    @if ( Session::has('success') )
        <div class="alert mb-4 alert-primary solid alert-right-icon alert-dismissible fade show">
            <span><i class="mdi mdi-account-search"></i></span>
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button> {{ Session::get('success') }}
        </div>
    @endif


    @if ( Session::has('error') )
        <div class="alert mb-4 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
   
      
    <div class="row ml-1 mr-1 " style="margin-top: -20px;">
        <div class="col-lg-12 ">
            <form action="{{ route('stroretrain')}}" method="POST" >
                @csrf
                <div id="accordion-nine" class="accordion accordion-active-header shadow-lg">
                    <div class="accordion__item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#active-header_collapseOne">
                            <span class="accordion__header--icon"></span>
                            <h4 class="accordion__header--text">Tạo khóa đào tạo</h4>
                            <span class="accordion__header--indicator"></span>
                        </div>
                    </div>
                    <div id="active-header_collapseOne" class="collapse accordion__body show" data-parent="#accordion-nine">
                        <div class="accordion__body--text"> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Tên đào tạo</label>
                                    <input type="text" name="tendaotao" placeholder="Tên đào tạo" class="form-control">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Loại đào tạo</label>
                                    <select name="loaidaotao" class="form-control" id="">
                                        <option value=""> chọn loại đào tạo</option>
                                        @foreach ($typeOfTrains as $typeOfTrain)
                                            <option value="{{$typeOfTrain->Id_LoaiDaoTao}}" >{{$typeOfTrain->TenLoaiDaoTao}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="" class="form-control"> --}}
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Ngày bắt đầu</label>
                                    <input type="date" class="form-control" name="ngaybatdau" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Người kết thúc</label>
                                    <input type="date" class="form-control" name="ngayketthuc" required>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Chi phí</label>
                                    <input type="number" class="form-control" name="chiphi" placeholder="Chi phí" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nơi đào tạo</label>
                                    <input type="text" class="form-control" placeholder="Nơi đào tạo" name="noidaotao">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <label>Nội dung</label>
                                        <textarea  class="summernote" required name="noidung"></textarea>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-5"></div>
                                <div class="col">
                                    <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Tạo khóa học</button>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 ml-1 mr-1 mt-4">
        <div class="card shadow-lg">
            <div class="card-content">
                <table class="table table-striped table-bordered w-auto dataTable no-footer ml-1 mr-1 mt-2" >
                    <thead class="text-center text-nowrap thead-light">
                    <tr>
                        <th class="w-5">
                            STT
                        </th>
                        <th class="w-15">
                            Tên đào tạo
                         </th>
                        <th class="w-15">
                            Loại
                        </th>
                        <th class="w-25">
                            Thời gian
                        </th>
                        <th class="w-5">
                           Chi phí
                        </th>
                        <th  class="w-20">
                            Nội dung
                        </th>
                        <th class="w-15">
                            Nơi đào tạo
                        </th>
                        <th class="w-5">
                            Tình trạng
                        </th>
                        <th class="w-5">
                           
                        </th>
                    </tr>
                    </thead>
                    <tbody >
                        @foreach ($trains as $stt=> $train)
                            <tr>
                                <td class="text-center">{{++$stt}}</td>
                                <td>
                                    <a href="{{route('detailtrain',['id'=>$train->Id_DaoTao])}}">{{$train->TenDaoTao}}</a>
                                </td>
                                <td>{{$train->loaidaotao->TenLoaiDaoTao}}</td>
                                <td class="text-center">
                                    {{
                                    \Carbon\Carbon::parse($train->NgayBatDau)->format('d-m-Y').' --> '.\Carbon\Carbon::parse($train->NgayKetThuc)->format('d-m-Y')
                                    }}
                                    </td>
                                <td class="text-center"> {{$train->ChiPhi}}</td>
                                <td>{!!$train->NoiDung!!}</td>
                                <td>{{$train->NoiDaoTao}}</td>
                                <td class="text-center">
                                    @switch($train->TinhTrang)
                                        @case(0)
                                            <span class="badge badge-pill badge-dark">Kết thúc</span>
                                            @break
                                        @case(1)
                                            <span class="badge badge-pill badge-success">Đang mở</span>                                    
                                            @break
                                        @default
                                            
                                    @endswitch
                                </td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-center">
                                            <button class="btn btn-success w-70 ml-4" data-toggle="modal" data-target="#modalEdit-{{$train->Id_DaoTao}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>                                 
                                            <form action="{{ route('destroytrain',['id'=>$train->Id_DaoTao])}}" >
                                            @csrf
                                            <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             <!-- START MODEL ĐÀO TẠO-->
                    <div class="w-50 d-flex justify-content-end">
                        <div class="modal fade" id="modalEdit-{{$train->Id_DaoTao}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered justify-content-center w-auto">
                                {{-- START FORM --}}
                                <form  method="post" action="{{ route('updatetrain',['id'=>$train->Id_DaoTao])}}">
                                    @csrf
                                    <div class="modal-content p-3" style="width: 550px;">
                                        <div class="flex-row d-flex justify-content-center mb-2">
                                            <h2 class="text-info">Sửa đào tạo</h2>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Tên đào tạo</label>
                                                <input type="text" name="tendaotaoUD" value="{{$train->TenDaoTao}}" placeholder="Tên đào tạo" class="form-control">
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Loại đào tạo</label>
                                                <select name="loaidaotaoUD" class="form-control" id="">
                                                    <option value=""> chọn loại đào tạo</option>
                                                    @foreach ($typeOfTrains as $typeOfTrain)
                                                        @if ($typeOfTrain->Id_LoaiDaoTao == $train->Id_LoaiDaoTao)
                                                            <option value="{{$typeOfTrain->Id_LoaiDaoTao}}" selected>{{$typeOfTrain->TenLoaiDaoTao}}</option>
                                                        @else
                                                            <option value="{{$typeOfTrain->Id_LoaiDaoTao}}" >{{$typeOfTrain->TenLoaiDaoTao}}</option>

                                                        @endif
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" name="" class="form-control"> --}}
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Ngày bắt đầu</label>
                                                <input type="date" class="form-control" value="{{$train->NgayBatDau}}" name="ngaybatdauUD" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Người kết thúc</label>
                                                <input type="date" class="form-control" value="{{$train->NgayKetThuc}}" name="ngayketthucUD" required>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Chi phí</label>
                                                <input type="text" class="form-control" name="chiphiUD" value="{{$train->ChiPhi}}" placeholder="Chi phí" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Nơi đào tạo</label>
                                                <input type="text" class="form-control" value="{{$train->NoiDaoTao}}" placeholder="Nơi đào tạo" name="noidaotaoUD">
                                            </div>
                                        </div>  
                                        <div class="form-row mt-3">
                                            <div class="col-md-6">
                                                <input type="checkbox" 
                                                @if ($train->TinhTrang == 1)
                                                    checked
                                                @endif 
                                                 placeholder="tình trạng" name="tinhtrangUD" >
                                                <label>Tình trạng</label>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="card-body">
                                                    <label>Nội dung</label>
                                                    <textarea  class="summernote"  name="noidungUD">{{$train->NoiDung}}</textarea>
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
    
@endsection
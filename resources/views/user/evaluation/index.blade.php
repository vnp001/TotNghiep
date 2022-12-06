@extends('userindex')
@section('contentuser')
<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-3 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                </div>
                <div class="col-lg-4 mt-2 ml-5">
                    <h2 style="color: #593bdb">Đánh giá theo dõi nhân viên</h2>
                </div>
                <div class="col-lg-4 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">đánh giá</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4" style="margin-top: 20px">
    <div class="row">
        @if ( Session::has('success') )
            <div class="alert alert-primary solid alert-right-icon alert-dismissible fade show">
                <span><i class="mdi mdi-account-search"></i></span>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button> {{ Session::get('success') }}
            </div>
        @endif
        
        
        @if ( Session::has('error') )
            <div class="alert alert-danger solid alert-dismissible fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form action="{{ route('storeevaluation_user')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5>Đánh giá nhân viên</h5>
                </div>
                <div class="card-content m-2">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Nhân viên bị Đánh giá</label>
                            <select id="remain-open" class="form-control" name="nhanvien">
                                <option value="">Mã nhân viên - Tên nhân viên</option>
                                @foreach ($employyeeOfDerpantments as $employyee)
                                    @if ($employyee->Id_NhanVien == $Manager[0]->NguoiQuanLy)
                                        <option disabled value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                    @else
                                        <option value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Ngày</label>
                            <input type="date" class="form-control" value="{{$dateNow}}" name="ngay" required>
                        </div>
                        <div class="col-md-6">
                            <label>Người đánh giá</label>
                            <select id="remain-open" class="form-control" name="nguoidanhgia" >
                                <option value="">Tên người đánh giá</option>
                                @foreach ($Manager as $Managers)
                                    <option value="{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}">{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Hình thức</label>
                            <input type="text" class="form-control" name="hinhthuc" placeholder="Hình thức đánh giá" required>
                        </div>
                        <div class="col-md-6">
                            <label>File</label>
                            <input type="file" class="form-control" name="filedanhgia">
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
                    {{-- <div class="form-row mt-2 ml-2" style="display: flex">
                        <label class="my-auto mr-3"> Nhân viên :</label>
                        @foreach ($employyeeOfDerpantments as $employyeeOfDerpantment)                    
                            @if ($employyeeOfDerpantment->HinhAnh == '')
                                    @if ($employyeeOfDerpantment ->GioiTinh == 'Nam')
                                    <img class="ml-5" src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                            @else
                                <img class="ml-5" src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                            @endif
                            @else
                                <img class="ml-5" src="{{ asset('./images/' . $employyeeOfDerpantment->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                            @endif
                            <p class="ml-3 mt-2">
                                <?php 
                                echo $employyeeOfDerpantment->Ho.' '.$employyeeOfDerpantment->Ten;
                            ?>
                            </p>    
                        @endforeach
                    </div>
                    <div class="d-flex flex-column w-auto mt-3">
                        <div class="d-flex text-left mb-2 align-items-center">
                            <div class="w-25 pl-2 mr-2">
                                <label class="my-auto">Báo cáo</label><b class="text-danger"> * </b>:
                            </div>
                            <div class="w-75">
                                <select name="loaiyeucau" id="remain-open"class="form-control"required>
                                    <option value="">Loại yêu cầu</option>
                                    @foreach ($typeOfRequests as $typeOfRequest)
                                        <option value="{{$typeOfRequest->Id_LoaiYeuCau}}">{{$typeOfRequest->TenLoaiYeuCau}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-20 pl-2 mr-2">
                                <label class="my-auto ml-5">Ngày :</label>
                            </div>
                            <div class="w-70">
                                <input type="date" name="" disabled value="{{$dateNow}}" class="form-control" required value="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 form-group col-xxl-12" required>
                        <div class="card-body">
                            <label>Mô tả</label>
                            <textarea  class="summernote" name="mota"></textarea>
                        </div>
                    </div> --}}
                    <div class="row justify-content-center mb-4">
                        <button type="submit" style=" width:150px;height:50px;font-size: 20px;" class="btn  btn-primary">Đánh giá</button>            
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card shadow-lg">
        <div class="card-header">
            Danh sách theo dỗi đánh giá nhân viên
        </div>
        <div class="card-content ml-2 mr-2 mt-3 mb-4">
            <table  class="DTtable table table-striped table-bordered ml-2" >
            {{-- <table class="table DTtable table-striped table-bordered ml-2" > --}}
                <thead class="text-center text-nowrap "style="background-color: #008bcd;">
                    <tr>
                        <th class="w-5 text-white">
                            STT
                        </th>
                        <th class="w-5 text-white">
                            Mã NV
                        </th>
                        <th class="w-15 text-white">
                            Tên nhân viên
                        </th>
                        <th class="w-10 text-white">
                           Ngày
                        </th>
                        <th class="w-15 text-white">
                            Người Đánh giá
                        </th>
                        <th  class="w-20 text-white">
                            Nội dung
                        </th>
                        <th class="w-15 text-white">
                            Hình thức
                        </th>
                        <th class="w-20 text-white">
                            File
                        </th>
                        <th class="w-5 text-white">
                           
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employyeeOfDerpantments as $employyeeOfDerpantment)
                        <?php
                             $evaluations=App\Models\danhgia::where('NhanVien','=',$employyeeOfDerpantment->Id_NhanVien)
                                                ->with('nhanvien')
                                                ->get();
                            $stt= 0;
                        ?>
                        <tr>
                        @foreach ($evaluations as $evaluation)
                            <td class="text-center">
                                {{++$stt}}
                            </td>
                            <td class="text-center">
                                {{$evaluation->NhanVien}}
                            </td>
                            <td>
                                <div class="d-flex flex-row">
                                    @if ($evaluation->nhanvien->HinhAnh == '')
                                        @if ($evaluation->nhanvien->GioiTinh == 'Nam')
                                            <img src="{{ asset('./images/man.jpg')}}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @else
                                            <img src="{{ asset('./images/woman.jpg')}}" style="width:50px;height:50px;border-radius: 50%;" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('./images/' . $evaluation->nhanvien->HinhAnh) }}"  style="width:50px;height:50px;border-radius: 50%;" alt="">
                                    @endif
                                    <p class="ml-2 mt-2">{{$evaluation->nhanvien->Ho.' '.$evaluation->nhanvien->Ten}}</p>
                                </div> 
                            </td>
                            <td class="text-center">{{\Carbon\Carbon::parse($evaluation->Ngay)->format('m-d-Y')}}</td>
                            <td>
                                {{$evaluation->NguoiDanhGia}}
                            </td>
                            <td>{!!$evaluation->NoiDung!!}</td>
                            <td>{{$evaluation->HinhThuc}}</td>
                            <td class="text-center">
                             @switch(pathinfo($evaluation->File, PATHINFO_EXTENSION))
                                @case(null)
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
                                 <a target='_blank' style="color: black;" href='{{ asset('./folderEvalution/'.$evaluation->File)}}'>  {{$evaluation->File}}</a>
                             </td>
                             <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#"  style="color: black;font-size: 30px;" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-center">
                                      
                                        <button class="btn btn-success w-70 ml-4" data-toggle="modal" data-target="#edit-{{$evaluation->Id_DanhGia}}"><i class="fa fa-pencil m-r-5"></i> Sửa</button>                                 
                                       
                                        <form action="{{ route('destroyevaluation_user',['id'=>$evaluation->Id_DanhGia])}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger w-70 mt-2 ml-4"><i class="fa fa-trash-o m-r-5"></i> Xóa</button>
                                        </form>
                                    </div>
                                </div>
                           </td>
                        </tr>

                        {{-- start model  --}}
                        <div class="modal fade" id="edit-{{$evaluation->Id_DanhGia}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-content p-3 col-lg-12">
                                    <div class="flex-row d-flex justify-content-center mb-2">
                                        <h2 class="text-info">Sửa đánh giá nhân viên </h2>
                                    </div>
                                    <form action="{{ route('updateevaluation_user',['id'=>$evaluation->Id_DanhGia])}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Nhân viên bị Đánh giá</label>
                                                <select id="remain-open" class="form-control" name="nhanvien">
                                                    <option value="">Mã nhân viên - Tên nhân viên</option>
                                                    @foreach ($employyeeOfDerpantments as $employyee)
                                                        @if ($employyee->Id_NhanVien == $Manager[0]->NguoiQuanLy)
                                                            <option disabled value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                                        @else
                                                            @if ($employyee->Id_NhanVien == $evaluation->NhanVien)
                                                                <option selected value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                                            @else
                                                                <option value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Ngày</label>
                                                <input type="date" class="form-control" value="{{$evaluation->Ngay}}" name="ngay" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Người đánh giá</label>
                                                <select id="remain-open" class="form-control" name="nguoidanhgia" >
                                                    <option value="">Tên người đánh giá</option>
                                                    @foreach ($Manager as $Managers)
                                                        <?php
                                                            $nameManager=$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten;
                                                        ?>
                                                        @if ($nameManager == $evaluation->NguoiDanhGia)
                                                            <option  selected value="{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}">{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}</option>    
                                                        @else
                                                            <option value="{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}">{{$Managers->truongphong->Ho.' '.$Managers->truongphong->Ten}}</option>     
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Hình thức</label>
                                                <input type="text" class="form-control" value="{{$evaluation->HinhThuc}}" name="hinhthuc" placeholder="Hình thức đánh giá" required>
                                            </div>
                                        </div>  
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="card-body">
                                                    <label>Nội dung</label>
                                                    <textarea  class="summernote" required name="noidung">{{$evaluation->NoiDung}}</textarea>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection
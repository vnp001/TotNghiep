@extends('index')
@section('content')
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-6 p-md-0">
            <h3>Đánh giá nhân viên</h3>
        </div>
      
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('evaluation')}}">Đánh giá</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sửa</a></li>
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
  


    @if ( Session::has('error') )
        <div class="alert mb-4 alert-danger solid alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
   
      @foreach ($evaluations as $evaluation)
          
    <div class="row ml-1 mr-1 " style="margin-top: -20px;">
        <div class="col-lg-12">
            <div class="card">
                <div class="mt-3 ml-2 mr-2 mb-3">
                    <form action="{{ route('updateevaluation',['id'=>$evaluation->Id_DanhGia])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Nhân viên bị Đánh giá</label>
                                <select id="remain-open" class="form-control" name="nhanvien">
                                    <option value="{{$evaluation->NhanVien}}">{{$evaluation->NhanVien.' - '.$evaluation->nhanvien->Ho.' '.$evaluation->nhanvien->Ten}}</option>
                                    <option value="">Mã nhân viên - Tên nhân viên</option>
                                    @foreach ($employyees as $employyee)
                                        @if ($employyee->Id_PhanQuyen == '1')
                                            <option disabled value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                        @else
                                            <option value="{{$employyee->Id_NhanVien}}">{{$employyee->Id_NhanVien.' - '.$employyee->Ho.' '.$employyee->Ten}}</option>  
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="form-row mt-3">
                            <div class="col-md-6">
                                <label>Ngày</label>
                                <input type="date" class="form-control" value="{{$evaluation->Ngay}}" name="ngay" required>
                            </div>
                            <div class="col-md-6">
                                <label>Người đánh giá</label>
                                <select  class="form-control" name="nguoidanhgia" >
                                    <option value="{{$evaluation->NguoiDanhGia}}">{{$evaluation->NguoiDanhGia}}</option>
                                    <option value="">Tên người đánh giá</option>
                                    @foreach ($employyees as $employyee)
                                        @if ($employyee->Id_PhanQuyen == '1')
                                            <option value="{{$employyee->Ho.' '.$employyee->Ten}}">{{$employyee->Ho.' '.$employyee->Ten}}</option>    
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
                            {{-- <div class="col-md-6">
                                <label>File</label>
                                <input type="file" class="form-control"  value="{{$evaluation->File}}" name="filedanhgia">
                            </div> --}}
                        </div>  
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <label>Nội dung</label>
                                    <textarea  class="summernote" required name="mota">{{$evaluation->NoiDung}}</textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col">
                                <button type="submit" style="width:200px;height:50px;font-size: 20px;" class="btn  btn-primary">Sửa</button>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
@endsection
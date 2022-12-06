@extends('index')
@section('content')
                                {{-- NỘI DUNG TRANG EMPLOYEE--}}
<div class="mr-1 ml-1">
    <!-- Tiêu đề -->
    <div class=" row page-titles shadow-lg mx-0">
        <div class="col-sm-4">
            <h3>Danh sách  nhân viên </h3>
        </div>
        <div class="col mt-2">
            <h4>Tổng nhân viên: {{$tongnhanvien}}</h4>
        </div>
        <div class="col mt-2">
            <h4>Nhân viên nam: {{$nhanviennam}}</h4>
        </div>
        <div class="col mt-2">
            <h4>Nhân viên nữ: {{$nhanviennu}}</h4>
        </div>
        <div class="col-sm-2 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listemployee')}}">nhân viên</a></li>
                <li class="breadcrumb-item active"><a href="">danh sách</a></li>
            </ol>
        </div>
    </div>
     <!-- End tiêu đề -->
    <!-- form hiển thị dữ liệu -->
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
    <div class="col-lg-12 ">
        <div class="card ">
            <div class=" ml-2 mr-2" style="margin-bottom:30px;" >
                {{-- <div id="tableID" ></div> --}}
                <table  class="table mt-2 table-striped table-bordered w-auto" >
                    <thead class="text-center text-nowrap thead-light">
                    <tr>
                        <th class="w-5">
                            STT
                        </th>
                        <th class="w-15">
                            Ảnh
                         </th>
                        <th class="w-10">
                            Mã NV
                        </th>
                        <th class="w-40">
                            Họ Tên
                        </th>
                        <th class="w-15">
                            Số điện thoại
                        </th>
                        <th class="w-20">
                            Quyền
                        </th>
                        <th  class="w-30">
                            Email
                        </th>
                        <th class="w-20">
                            Trạng thái
                        </th>
                        <th class="w-20">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                <tbody >
                    @foreach($listemployee as $stt => $employee)
                    <tr>
                        <td style="text-align: center">
                            {{++$stt}}
                        </td>
                        <td style="text-align: center">
                            @if ($employee ->HinhAnh == '')
                                @if ($employee ->GioiTinh == 'Nam')
                                    <img src="{{ asset('./images/man.jpg')}}"  style="height: 90px;width: 90px" alt="">
                                @else
                                    <img src="{{ asset('./images/woman.jpg')}}" style="height: 90px;width: 90px" alt="">
                                @endif
                            @else
                                <img src="{{ asset('./images/' . $employee ->HinhAnh) }}"  style="height: 90px;width: 90px" alt="">
                            @endif
                        </td>
                        <td style="text-align: center">{{$employee ->Id_NhanVien }}</td>
                        <td class="align-middle text-left  "><a href="/admin/employee/detail/{{$employee->Id_NhanVien}}"> {{$employee ->Ho.' '.$employee ->Ten }}</a></td>
                        <td style="text-align: center">{{$employee ->SDT }}</td>
                        <td style="text-align: center">
                            {{$employee->phanquyen->TenQuyen}}                        
                        </td>
                        
                        <td class="align-middle text-left " >{{$employee ->Email }}</td>
                        <td style="text-align: center">
                            @if ($employee->TrangThai == 1)
                                <span class="badge badge-pill badge-success">Đang hoạt động</span>
                            @else
                                <span class="badge badge-pill badge-danger">Ngừng hoạt động</span>
                            @endif
                        </td>
                        <td  style=" text-align: center ">
                            <div style="display: flex">
                                @method('DELETE')
                                 @csrf
                                <a href="{{ route('deleteemployee',['id'=>$employee->Id_NhanVien])}}" class="btn btn-danger">Xóa</a>
                                <a href="{{ route('updateemployee',['id'=>$employee->Id_NhanVien])}}" class="btn btn-info ml-2" >Sửa</a>
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

</div>


<script type="text/javascript">
    // setInterval(function(){
    //     $('#tableID').load('/admin/employee/dataemployee');
    //     }, 500);
</script>

@endsection

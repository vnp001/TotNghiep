{{-- <table id="tableID" class="table table-striped table-bordered w-auto" >
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
        <td class="align-middle text-left  "><a href="{{ route('detailemployee',['id'=>$employee->Id_NhanVien])}}" style="color: black;"> {{$employee ->Ho.' '.$employee ->Ten }}</a></td>
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
</table>  --}}

<div class="row">
    <div class="col-lg-12 " style="margin-top: -25px">
        <div class="card ">
            <div class=" ml-2 mr-2" style="margin-bottom:30px;" >
                <table  class="table table-striped table-bordered w-auto" >
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
            <tbody id="tableID">
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
                    <td class="align-middle text-left  "><a href="/admin/employee/detail/{{$employee->Id_NhanVien}}" style="color: black;"> {{$employee ->Ho.' '.$employee ->Ten }}</a></td>
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
            <div id="error">

            </div>
            </div>
        </div>
    </div> 
</div>
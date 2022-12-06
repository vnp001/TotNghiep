@extends('index')
@section('content')
<div class=" row page-titles shadow-lg mx-0">
    {{-- <div class="col-sm-6 p-md-0">
        <h3>Chi tiết văn bản</h3>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('document')}}">văn bản</a></li>
            <li class="breadcrumb-item active"><a href="">chi tiết</a></li>
        </ol>
    </div>
    <div class="col-sm-5">
        @foreach ($doc as $docdetail)
        <form action="/admin/document/exportword/{{$docdetail->Id_VanBan}}" >
            <button type="submit" class="btn btn-primary">export document</button>
        </form>
    </div> --}}
    @foreach ($doc as $docdetail)
    <div class="col-lg-5">
        <h3>{{$docdetail->TenVanBan}}</h3>
    </div>
    <div class="col-lg-4">
        <form action="/admin/document/exportword/{{$docdetail->Id_VanBan}}" >
            <button type="submit" class="btn btn-primary">export document</button>
        </form>
    </div>
    <div class="col-lg-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('document')}}">văn bản</a></li>
            <li class="breadcrumb-item active"><a href="">{{$docdetail->TenVanBan}}</a></li>
        </ol>
    </div>
</div>
    <div class="container " >
        <div class="card shadow-lg">
            <div class="row mt-4">
            <div class="col ml-2">
                    <div> <h4>BỘ GIÁO VÀ ĐÀO TẠO</h4></div>
                    <div id="tieudetruong"><h4>TRƯỜNG ĐẠI HỌC SƯ PHẠM THÀNH PHỐ HCM</h4></div>     
                    <div style=" margin-top: 15px;"><span>Số:  {{$docdetail->soVB}}/TB-DHQN</span></div>          
            </div>
            <div class="col">
                    <div><h4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h4></div>
                    <div id="tieudedoclap"><h4>Độc Lập - Tự Do - Hạnh Phúc</h4></div>
                    <!-- <div><h4>Bình Định, Ngày 09 tháng 10 năm 2021</h4></div> -->  
                    <div><p>HCM,ngày {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('d')}} tháng {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('m')}} năm {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('Y')}}</p></div>
            </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                </div>
                <div class="col">
                    <h4>{{$docdetail->TenVanBan}}</h4>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="container">
                    <p>
                        {!! $docdetail->NoiDung !!}
                    </p>
            </div>
            <div class="row mt-5">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4 mb-5">
                        <h4 class="ml-3">Người kí</h4>
                        <h5 class="ml-5">{{$docdetail->nhanvien->Ten}}</h5>
                        <h5>{{$docdetail->nhanvien->Ho.' '.$docdetail->nhanvien->Ten}}</h5>
                    </div>
            </div>
        </div>
</div>
    @endforeach

    
@endsection
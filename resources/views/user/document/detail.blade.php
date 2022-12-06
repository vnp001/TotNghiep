@extends('userindex')
@section('contentuser')
@foreach ($doc as $docdetail)    
<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-4 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                </div>
                <div class="col-lg-3 mt-2 ml-5">
                    <h2 style="color: #593bdb">Chi tiết văn bản</h2>
                </div>
                <div class="col-lg-4 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('docuser')}}">văn bản</a></li>
                                <li class="breadcrumb-item active"><a href="">chi tiết</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="d-flex justify-content-end mr-5 ">
        <form action="{{route('exportword_user',['id'=>$docdetail->Id_VanBan])}}" >
            @csrf
            <button class="btn btn-success"><i style="font-size: 2em" class=" ml-2 mdi mdi-arrow-down-bold-circle-outline"></i> Tải xuống</button>
        </form>
    </div>
</div>
    <div class="container " >
        <div class="card shadow-lg">
            <div class="row mt-4">
            <div class="col ml-2">
                    <div> <h4>BỘ GIÁO VÀ ĐÀO TẠO</h4></div>
                    <div id="tieudetruong"><h4>TRƯỜNG ĐẠI HỌC QUY NHƠN</h4></div>     
                    <div style=" margin-top: 15px;"><span>Số:  {{$docdetail->soVB}}/TB-DHQN</span></div>          
            </div>
            <div class="col">
                    <div><h4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h4></div>
                    <div id="tieudedoclap"><h4>Độc Lập - Tự Do - Hạnh Phúc</h4></div>
                    <!-- <div><h4>Bình Định, Ngày 09 tháng 10 năm 2021</h4></div> -->  
                    <div><p>Bình Định,ngày {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('d')}} tháng {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('m')}} năm {{\Carbon\Carbon::parse($docdetail ->Ngay )->format('Y')}}</p></div>
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
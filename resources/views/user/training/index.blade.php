@extends('userindex')
@section('contentuser')
<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-5 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                   
                </div>
                <div class="col-lg-4 mt-2">
                    <h2 style="color: #593bdb">Danh sách đào tạo</h2>
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Đào tạo</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4" >
    <div class="row">
        @if ( Session::has('success') )
            <div class="shadow-lg alert alert-primary solid alert-right-icon alert-dismissible fade show">
                <span><i class="mdi mdi-account-search"></i></span>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button> {{ Session::get('success') }}
            </div>
        @endif
        
        
        @if ( Session::has('error') )
            <div class="shadow-lg alert alert-danger solid alert-dismissible fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
    </div>
</div>
    <div class="col-lg-12">
        <div class="card shadow-lg">
            <div class="card-header">
                <h4>
                    Các khóa đào tạo    
                </h4>
            </div>
            <div class="card-content m-2">
                <table id="table" class="DTtable table table-striped table-bordered ml-2" >
                    <thead  class="text-center text-nowrap" style="background-color: #5112d4;color:white;">
                    <tr >
                        <th class="w-5 text-white">
                            STT
                        </th>
                        <th class="w-15 text-white">
                            Tên đào tạo
                            </th>
                        <th class="w-5 text-white">
                            Mã ĐT
                        </th>
                        <th class="w-15 text-white">
                            Loại đào tạo
                        </th>
                        <th class="w-15 text-white">
                            Thời gian
                        </th>
                        <th class="w-20 text-white">
                            Nội dung
                        </th>
                        <th class="w-15 text-white">
                            Nơi đào tạo
                        </th>
                        <th class="w-30 text-white">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
                        $now=\Carbon\Carbon::now();
                        $dateNow=\Carbon\Carbon::parse($now)->format('Y-m-d')    
                    ?>
                    @foreach ($trains  as $stt => $train)
                    <?php
                     $checkJoin=App\Models\ketquadaotao::where('Id_NhanVien','=',session()->get('user_id'))
                            ->where('Id_DaoTao','=',$train->Id_DaoTao)
                            ->with('daotao')
                            ->get();
                    $check=0;
                    if($checkJoin->isEmpty())
                        {
                            $check=0;
                        }
                    else
                    {
                        $check=1;
                    }
                    ?> 
                    @if ($train->NgayBatDau > $dateNow)
                        <tr>
                            <td style="text-align: center">
                                {{++$stt}}
                            </td>
                            <td>
                                {{$train->TenDaoTao}}
                            </td>
                            <td style="text-align: center">
                                {{$train->Id_DaoTao}}
                            </td>
                            <td>
                                {{$train->loaidaotao->TenLoaiDaoTao}}
                            </td>
                            <td style="text-align: center">
                                <p>{{\Carbon\Carbon::parse($train->NgayBatDau)->format('d/m/Y').' -> '.\Carbon\Carbon::parse($train->NgayBatDau)->format('d/m/Y')}}</p>
                            </td>
                            <td>
                                {!!$train->NoiDung!!}
                            </td>
                            <td>
                                {{$train->NoiDaoTao}}
                            </td>
                            <td style="text-align: center">
                                @if ($check == 0)
                                    <form action="{{route('registtraininguser')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$train->Id_DaoTao}}" name="khoadaotao">
                                        <button class="btn btn-primary w-100 text-white" >
                                            <dt>Đăng kí</dt>
                                    </button>
                                @else
                                    @foreach ($checkJoin as $check)
                                        <form action="{{route('removerigistryuser',['id'=>$check->Id_KetQuaDT])}}" method="post">
                                            @csrf
                                            {{-- <input type="hidden" value="{{$train->Id_DaoTao}}" name="khoadaotao"> --}}
                                            <button class="btn btn-warning text-white w-100" >
                                                <dt>Hủy đăng kí</dt>
                                        </button>
                                    @endforeach         
                                @endif                  
                            </td> 
                        </tr>
                    @endif
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
   </div>

   <div class="col-lg-12 mt-5">
        <div class="card shadow-lg">
            <div class="card-header">
                <h4>
                    Các khóa học đã tham gia 
                </h4>
            </div>
            <div class="card-content m-2">
                <table  class="DTtable table table-striped table-bordered ml-2" >
                    <thead class="text-center text-nowrap "style="background-color: #008bcd;">
                    <tr>
                        <th class="w-5 text-white">
                            STT
                        </th>
                        <th class="w-15 text-white">
                            Tên đào tạo
                            </th>
                        <th class="w-5 text-white">
                            Mã ĐT
                        </th>
                        <th class="w-15 text-white">
                            Loại đào tạo
                        </th>
                        <th class="w-20 text-white">
                            Thời gian
                        </th>
                        <th class="w-25 text-white">
                            Nội dung
                        </th>
                        <th class="w-20 text-white">
                            Nơi đào tạo
                        </th>
                        <th class="w-20 text-white">
                            Kết quả
                        </th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($resuftTrains  as $stt => $resuftTrain)
                    <tr>
                        <td style="text-align: center">
                            {{++$stt}}
                        </td>
                        <td>
                            {{$resuftTrain->daotao->TenDaoTao}}
                        </td>
                        <td style="text-align: center">
                            {{$resuftTrain->daotao->Id_DaoTao}}
                        </td>
                        <td>
                            {{$resuftTrain->daotao->loaidaotao->TenLoaiDaoTao}}
                        </td>
                        <td style="text-align: center">
                            <p>{{\Carbon\Carbon::parse($resuftTrain->daotao->NgayBatDau)->format('d/m/Y').' -> '.\Carbon\Carbon::parse($resuftTrain->daotao->NgayBatDau)->format('d/m/Y')}}</p>
                        </td>
                        <td>
                            {!!$resuftTrain->daotao->NoiDung!!}
                        </td>
                        <td>
                            {{$resuftTrain->daotao->NoiDaoTao}}
                        </td>
                        <td>
                            @switch($resuftTrain->KetQua)
                            @case('Đậu')
                                <span class="badge badge-pill badge-success " style="height: 30px;width: auto;font-size: 15px;">Đậu</span>
                                @break
                            @case('Rớt')
                                <span class="badge badge-pill badge-dark" style="height: 30px;width: auto;font-size: 15px;">Rớt</span>                                    
                                @break
                            @default
                                <span class="badge badge-pill badge-info" style="height: 30px;width: auto;font-size: 15px;">Chưa cập nhập</span>                                    
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
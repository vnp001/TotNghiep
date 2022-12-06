@extends('userindex')
@section('contentuser')
<style>
    #vanban {
    width:300px ;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
    }
    .vanbana:hover 
    {
        background-color: #f8f9fa;
    }
</style>

<div class="col-lg-12">
    <div class="card page-titles shadow-lg" style="height: 90px;">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-5 ml-3" >
                    <a href="#" onclick="history.back()"> <i class="mdi mdi-arrow-left-bold-circle-outline" style="font-size: 3em;"></i></a>
                   
                </div>
                <div class="col-lg-4 mt-2">
                    <h2 style="color: #593bdb">Danh sách văn bản</h2>
                </div>
                <div class="col-lg-2 ml-5">
                    <div class="page-titles">
                        <div class=" p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('trangchuuser')}}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">văn bản</a></li>
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
<div class="col-lg-12 ">
    <form action="{{route('searchdoc_user')}}" method="post">
    @csrf
    <div class="flex d-flex  flex-row   justify-content-end ">
        <div class=" mb-4 card col-lg-6">
            <div style="display: flex" class="m-2">
                @if ($search == 1)
                    <div class=" w-50 mr-2">
                        <select name="thang" class="form-control" required>
                            <option  value="">Chọn tháng</option>
                              @for($i=1;$i<=12;$i++)
                                @if ($monthsearch == $i)
                                  <option selected value="<?php echo $i?>">Tháng <?php echo $i?></option>  
                                @else
                                  <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                                @endif
                            @endfor
                          </select>
                    </div>
                    <div class="w-50 mr-2">
                        <select class="form-control" name="nam" required>
                            <option  value="">Chọn năm</option>
                            @for($year = (int)date('Y'); 1900 <= $year; $year--)
                              @if ($yearsearch == $year)
                                <option selected value="<?php echo $year?>">Năm <?php echo $year;?></option>
                              @else
                                  <option value="<?php echo $year?>">Năm <?php echo $year;?></option>
                              @endif
                            @endfor
                           </select>
                    </div>
                @else
                    <div class=" w-50 mr-2">
                        <select name="thang" class="form-control" required>
                            <option  value="">Chọn tháng</option> 
                            @for($i=1;$i<=12;$i++)
                                <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                            @endfor
                        </select>
                    </div>
                    <div class="w-50 mr-2">
                        <select class="form-control" name="nam" required>
                            <option  value="">Chọn năm</option>
                            @for($year = (int)date('Y'); 1900 <= $year; $year--)
                                <option value="<?php echo $year?>">Năm <?php echo $year;?></option>
                            @endfor
                        </select>
                    </div>
                @endif
                <div class="w-20">
                    <button class="btn btn-secondary"><i class="mdi mdi-magnify"></i> Tìm kiếm</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    @if ($search == 1)
    <div class="col-lg-12">
        <div class="card" style="background-color: #fff">
            <h3 class="mt-2 text-center  mb-4">Kết quả tìm kiếm</h3>
            <div class="d-flex flex-wrap">
                @foreach ($resulsDoc as $resuls)
                        <a class="vanbana" style=" text-decoration: none;" href="{{route('detail_user',['id'=>$resuls->Id_VanBan])}}">
                            <div class="card shadow-lg ml-5 ">
                                <img src="{{ asset('./documents/' . $resuls->HinhAnh) }}" style="height: 150px;width: 300px;" alt="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="ml-1">{{$resuls->TenVanBan}}</h4>
                                        <div class="pt-3 ml-1 pb-3 pl-0 pr-0 text-left">
                                            <div id="vanban" style="color: #6b6767;">
                                                {!!$resuls->NoiDung!!}
                                            </div>
                                            {{-- <p class="b text-left ml-3">{!! $document->NoiDung!!}</p> --}}
                                        </div>
                                        <span class="mb-2 ml-3" style="color: #6b6767;">Ngày: {{ \Carbon\Carbon::parse($resuls->Ngay)->format('d-m-Y')}}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                @endforeach 
            </div>
        </div>
    </div>
    @endif
  
    <div class="d-flex flex-wrap ">
        {{-- start văn bản --}}
        @foreach ($documents as $document)
        <a class="vanbana" style=" text-decoration: none;" href="{{route('detail_user',['id'=>$document->Id_VanBan])}}">
            <div class="card shadow-lg ml-5 ">
                <img src="{{ asset('./documents/' . $document->HinhAnh) }}" style="height: 150px;width: 300px;" alt="">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="ml-1">{{$document->TenVanBan}}</h4>
                        <div class="pt-3 ml-1 pb-3 pl-0 pr-0 text-left">
                            <div id="vanban" style="color: #6b6767;">
                                {!!$document->NoiDung!!}
                            </div>
                            {{-- <p class="b text-left ml-3">{!! $document->NoiDung!!}</p> --}}
                        </div>
                        <span class="mb-2 ml-3" style="color: #6b6767;">Ngày: {{ \Carbon\Carbon::parse($document->Ngay)->format('d-m-Y')}}</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        {{-- end văn bản --}}
    </div>
</div>
@endsection
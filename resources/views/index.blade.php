
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Trang Chủ </title>
    <link rel="icon" href="{{ asset('./images/cntt_ico_n.png') }}" type="image/x-icon" />
    <link href="{{ asset('./css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('./vendor/select2/css/select2.min.css') }}"> --}}
    <!-- Pick date -->
    {{-- <link rel="stylesheet" href="{{ asset('./vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('./vendor/pickadate/themes/default.date.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Summernote -->
    <link href="{{ asset('./vendor/summernote/summernote.css') }}" rel="stylesheet">

</head>

<body>
    
    <div id="main-wrapper">
        <!-- Nav -->
        <div class="nav-header">
            
            <a href="{{route('trangchu')}}" class="brand-logo w-100 justify-content-center p-0">
                <img class="logo-abbr mr-2" src="{{ asset('/images/Logo_HCMUP.png') }}" alt="">
                <span class="brand-title w-auto my-auto mx-0 text-nowrap"> DHSPHCM </span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
      
        <!-- header  -->
        @include('pages/header')
        <!-- sidebar  -->
        @include('pages/slidebar')
        <!-- content body  -->
        <div class="content-body" style="margin-top: -30px;">
            <!-- row -->

            <div class="">
                {{-- viết ở đây phần nội dung --}}
                @yield('content')
            </div>
        </div>
        <!-- Footer  -->
        @include('pages/footer')

    </div>
    {{-- script --}}
    {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
   
    
    <!-- Required vendors -->
    <script src="{{ asset('./vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('./js/quixnav-init.js') }}"></script>
    <script src="{{ asset('./js/custom.min.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}

    {{-- <script src="{{ asset('./vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('./vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script> --}}
   
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>   --}}

      <!-- Data table  -->
    <script src="{{ asset('./vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./js/plugins-init/datatables.init.js') }}"></script>
    {{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> --}}

    <!-- Summernote -->
   <script src="{{ asset('./vendor/summernote/js/summernote.min.js') }}"></script>
   <!-- Summernote init -->
   <script src="{{ asset('./js/plugins-init/summernote-init.js') }}"></script>
   
   {{-- SELECT --}}
   {{-- <script src="{{ asset('./vendor/select2/js/select2.full.min.js') }}"></script>
   <script src="{{ asset('./js/plugins-init/select2-init.js') }}"></script> --}}
    
    <script>
        $('.table').DataTable({
            ordering: false,
            pagingType: 'full_numbers',
            lengthMenu: [[5, 10, 25, 50, -1], [5,10, 25, 50, "Tất cả"]],
            "language": {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ hàng",
                "infoEmpty": "Không có dữ liệu",
                "infoFiltered": "(Tìm từ _MAX_ hàng)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ ",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "Tìm kiếm",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "first": "",
                    "last": "",
                    "next": "Sau",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    </script>
</body>

</html>
 
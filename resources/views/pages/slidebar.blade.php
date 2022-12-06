<div class="quixnav">
    <div class="quixnav-scroll">
  
        <ul class="metismenu" id="menu">
                <li>
                    <a class="" href="{{route('trangchu')}}" >
                    <i class="fa fa-home" aria-hidden="true"></i><span class="nav-text">Home</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Nhân viên</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('listemployee')}}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
                        <li><a href="{{route('listdegree')}}"><i class="fa fa-circle-o"></i> Trình độ/Chức vụ</a></li>
                        <li><a href="{{route('department')}}"><i class="fa fa-circle-o"></i> Phòng ban</a></li>
                        <li><a href="{{route('create')}}"><i class="fa fa-circle-o"></i> Thêm nhân viên</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="{{ route('request')}}" aria-expanded="false">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span class="nav-text">
                        Danh sách yêu cầu
                        </span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon icon-app-store" aria-hidden="true"></i><span class="nav-text">Khen thưởng - kỹ luật</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('laudatory')}}"><i class="fa fa-circle-o"></i>Khen thưởng</a></li>
                        <li><a href="{{ route('discipline')}}"><i class="fa fa-circle-o"></i>Kỷ luật</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i><span class="nav-text">Đào tạo</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('train')}}"><i class="fa fa-circle-o"></i> Danh sách đào tạo</a></li>
                        <li><a href="{{ route('typeoftraining')}}"><i class="fa fa-circle-o"></i> Loại đào tạo</a></li>
                        <li><a href="{{ route('trainingresults')}}"><i class="fa fa-circle-o"></i> Kết quả khóa học</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="{{ route('timekeeping')}}" aria-expanded="false">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span class="nav-text">
                        Chấm công
                        </span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('workadmin')}}" aria-expanded="false">
                    <i class="mdi mdi-calendar-blank"></i>
                    <span class="nav-text">
                       Công việc
                        </span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('evaluation')}}" aria-expanded="false">
                    <i class="mdi mdi-account-box-outline"></i>
                    <span class="nav-text">
                        Đánh giá
                    </span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-usd" aria-hidden="true"></i>
                        <span class="nav-text">Lương</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('salary')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                        <li><a href="{{route('levelofsalary')}}"><i class="fa fa-circle-o"></i>Ngạch - Bậc</a></li>
                        {{-- <li><a href="{{route('department')}}"><i class="fa fa-circle-o"></i> Phòng ban</a></li>
                        <li><a href="{{route('create')}}"><i class="fa fa-circle-o"></i> Thêm nhân viên</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a class="" href="{{ route('salary')}}" aria-expanded="false">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span class="nav-text">
                       Lương
                        </span>
                    </a>
                </li> --}}
                <!-- START LƯƠNG  -->

                <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Quản lý lương</span></a>
                    <ul aria-expanded="false">
                        <li><a  href="trangchu.php?require=bangchamcong.php"><i class="fa fa-circle-o"></i> Bảng chấm công</a></li>
                        <li><a  href="trangchu.php?require=bangluong.php" ><i class="fa fa-circle-o"></i> Lương</a></li>
                    </ul>
                </li> -->
                <!-- END LƯƠNG -->
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i><span class="nav-text">Quản lý văn bản</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('document')}}"><i class="fa fa-circle-o"></i> Danh sách văn bản</a></li>
                        <li><a href="{{ route('typedoc')}}"><i class="fa fa-circle-o"></i> Loại văn bản</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="{{ route('tailieu')}}" aria-expanded="false">
                        <i class="mdi mdi-file-document-box"></i>
                    <span class="nav-text">
                       Tài liệu
                        </span>
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('chat_admin')}}" aria-expanded="false">
                    <i class="mdi mdi-message-text-outline"></i>
                    <span class="nav-text">
                       Chat
                        </span>
                    </a>
                </li>
            </ul>
    </div>


</div>
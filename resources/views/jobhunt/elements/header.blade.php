<header class="{{$class}}">
    <div class="menu-sec">
        <div class="container">
            @if (session('recruitInfo'))                
                <div class="btns-profiles-sec">
                    <span><img src="{{ asset('frontend/images/resource/profile.jpg') }}" alt="" />{{ session('recruitInfo')['username']}} <i class="la la-angle-down"></i></span>
                    <ul>
                        <li><a href="{{route('recruit/profile') }}" title=""><i class="la la-file-text"></i>Hồ sơ công ty</a></li>
                        <li><a href="{{route('job/manager-job-frontend') }}" title=""><i class="la la-briefcase"></i>Quản lý công việc</a></li>
                        <li><a href="{{route('job/form-add-job') }}" title=""><i class="la la-file-text"></i>Thêm công việc</a></li>
                        <li><a href="{{route('recruit/list-candidate') }}" title=""><i class="la la-lock"></i>Quản lý ứng viên</a></li>
                        <li><a href="{{route('recruit/list-candidate') }}" title=""><i class="la la-lock"></i>Đổi mật khẩu</a></li>
                        <li><a href="{{route('home/logout') }}" title=""><i class="la la-unlink"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            @elseif(session('candidateInfo'))
                <div class="btns-profiles-sec">
                    <span><img src="{{ asset('frontend/images/resource/profile.jpg') }}" alt="" />{{ session('candidateInfo')['username']}} <i class="la la-angle-down"></i></span>
                    <ul>
                        <li><a href="{{route('candidate/profile') }}" title=""><i class="la la-file-text"></i>Hồ sơ cá nhân</a></li>
                        <li><a href="{{route('candidate/manager-job-applied') }}" title=""><i class="la la-briefcase"></i>Công việc đã nhận</a></li>
                        <li><a href="#" title=""><i class="la la-file-text"></i>Công việc đã lưu</a></li>
                        <li><a href="#" title=""><i class="la la-lock"></i>Đổi mật khẩu</a></li>
                        <li><a href="{{route('home/logout') }}" title=""><i class="la la-unlink"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            @else
            <div class="logo">
                <a href="index.html" title="">
                    <img class="hidesticky" src="{{ asset('frontend/images/resource/logo.png') }}" alt="" />
                    <img class="showsticky" src="{{ asset('frontend/images/resource/logo10.png') }}" alt="" />
                </a>
            </div>
            <div class="btn-extars">
                <ul class="account-btns">
                    <li class="signup-popup">
                        <a href="{{ route('home/register')}}"><i class="la la-key"></i> Đăng ký</a>
                    </li>
                    <li class="signin-popup">
                        <a href="{{ route('home/login')}}"><i class="la la-external-link-square"></i> Đăng nhập</a>
                    </li>
                </ul>
            </div>
            @endif
            <nav>
                <ul>
                    <li><a href="{{ route('home')}}" title="">Trang chủ</a></li>
                    <li><a href="{{ route('home/list-job')}}" title="">Danh sách công việc</a></li>
                    <li><a href="#" title="">Bài viết</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

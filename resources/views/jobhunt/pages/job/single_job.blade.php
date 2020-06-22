@php
    use App\Helpers\URL as URL;
    $title = $item['title'];
    $address = $item['address'];
    $postDate = $item['post_date'];
    $expirationDate = $item['expiration_date'];
    $description = $item['description'];
    $required = $item['required'];
    $benefit = $item['benefit'];
    $salary = $item['salary'];
    $level = $item['level'];
    $position = $item['position'];
    $experience = $item['experience'];
    $gender = ($item['gender'] == 1) ? "Nam" : "Nữ";
    $linkApplied = URL::appliedJobURL($item['id']);
@endphp
@extends('jobhunt.main') 
@section('content')
@include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Chi tiết công việc</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                 <div class="col-lg-8 column">
                     <div class="job-single-sec">
                         <div class="job-single-head">
                             <div class="job-thumb"> <img src="images/resource/sj.png" alt="" /> </div>
                             <div class="job-head-info">
                                 <h4>{{ $title }}</h4>
                                 <span>{{ $address }}</span>
                                 <p><i class="la la-calendar-o"></i> {{ $postDate }} </p>
                                 <p><i class="la la-calendar-o"></i> {{ $expirationDate }} </p>
                             </div>
                         </div><!-- Job Head -->
                         <div class="job-details">
                             <h3>Mô tả công việc</h3>
                             {!! $description !!}
                             <h3>Yêu cầu</h3>
                             {!! $required !!}
                             <h3>Quyền lợi</h3>
                             {!! $benefit !!}
                         </div>
                         {{-- <div class="recent-jobs">
                             <h3>Recent Jobs</h3>
                             <div class="job-list-modern">
                                 <div class="job-listings-sec no-border">
                                    <div class="job-listing wtabs">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l1.png" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>Massimo Artemisis</span>
                                            <div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
                                        </div>
                                        <div class="job-style-bx">
                                            <span class="job-is ft">Full time</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                            <i>5 months ago</i>
                                        </div>
                                    </div>                                    
                                </div>
                             </div>
                         </div> --}}
                     </div>
                 </div>
                 <div class="col-lg-4 column">
                     <a class="apply-thisjob" href="{{ $linkApplied }}" title=""><i class="la la-paper-plane"></i>Apply for job</a>
                     <div class="job-overview">
                         <h3>Tổng quan về công việc</h3>
                         <ul>
                             <li><i class="la la-money"></i><h3>Mức lương</h3><span>{{$salary }}</span></li>
                             <li><i class="la la-mars-double"></i><h3>Giới tính</h3><span>{{ $gender }}</span></li>
                             <li><i class="la la-thumb-tack"></i><h3>Cấp độ nghề nghiệp</h3><span>{{ $level }}</span></li>
                            <li><i class="la la-puzzle-piece"></i><h3>Vị trí tuyển</h3><span>{{$position }}</span></li>
                             <li><i class="la la-shield"></i><h3>Kinh nghiệm</h3><span>{{$experience }}</span></li>
                         </ul>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>
@endsection
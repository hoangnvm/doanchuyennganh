@extends('jobhunt.main') @section('content') @include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <div class="container">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlape">
    <div class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cand-single-user">
                         <div class="can-detail-s">
                             <div class="cst"><img src="images/resource/es1.jpg" alt="" /></div>
                             <h3>{!!$item['fullname'] !!}</h3>
                         </div>
                     </div>
                     <ul class="cand-extralink">
                         <li><a href="#about" title="">Giới thiệu</a></li>
                         <li><a href="#education" title="">Học vấn</a></li>
                         <li><a href="#experience" title="">Kinh nghiệm</a></li>
                     </ul>
                     <div class="cand-details-sec">
                         <div class="row">
                             <div class="col-lg-8 column">
                                 <div class="cand-details" id="about">
                                     <h2>Giới thiệu về bản thân</h2>
                                     {!! $item['about'] !!}
                                     <div class="edu-history-sec" id="education">
                                         <h2>Trình độ học vấn</h2>
                                         <div class="edu-history">
                                            {!! $item['academic_level'] !!}
                                         </div>
                                     </div>
                                     <div class="edu-history-sec" id="experience">
                                         <h2>Kinh nghiệm làm việc</h2>
                                         <div class="edu-history style2">
                                            {!! $item['experience'] !!}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-4 column">
                                 <div class="job-overview">
                                     <h3>Job Overview</h3>
                                     <ul>
                                         <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
                                         <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
                                         <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
                                         <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
                                         <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
                                         <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
                                     </ul>
                                 </div><!-- Job Overview -->
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
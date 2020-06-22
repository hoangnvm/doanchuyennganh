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
                        <h3>Chào mừng {{ $item['username'] }} trở lại</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block no-padding">
        <div class="container">
            <div class="row no-gape">
                @include('jobhunt.partials.candidate_menu_left')
                <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="profile-title" id="mp">
                            <h3>Hồ sơ cá nhân</h3>
                    
                        </div>                        
                        @include('jobhunt.pages.candidate.form_profile')
                        @include('jobhunt.pages.candidate.form_contact')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
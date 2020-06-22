@extends('jobhunt.main') @section('content') @include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Welcome Tera Planer</h3>
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
                @include('jobhunt.partials.recruit_menu_left')
                
                @if (isset($item['id']))
                    @include('jobhunt.pages.job.form_info')
                @else
                    @include('jobhunt.pages.job.form_add')         
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
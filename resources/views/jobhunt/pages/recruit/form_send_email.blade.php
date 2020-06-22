@extends('jobhunt.main')
@php
                use App\Helpers\Template as Template;
                use App\Helpers\FormTemplate as FormTemplate;


                $elements = [
                    [
                        'label'     => 'Tên',
                        'element'   => Form::text('name', null),
                        'class'     => 'col-lg-6'
                    ],
                    [
                        'label'     => 'Nội dung',
                        'element'   => Form::text('content', null),
                        'class'     => 'col-lg-6'
                    ],
                    [
                        
                        'element'   => 'Gửi',
                        'type'      => 'btn-submit',
                        'class'     => 'col-lg-12'
                    ]
                ];
            @endphp
@section('content')
@include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Chào mừng trở lại</h3>
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
                <div class="col-lg-9 profile-form-edit">              
                        {{ Form::open([
                                'method' => 'post',
                                'url' => route("$controllerName/send-email"),
                                'accept-charset' => 'UTF-8',
                                'enctype' => 'multipart/form-data',
                                'id' => 'main-form'
                            ]) }}
                            {!! FormTemplate::showFrontend($elements) !!}
                        {!! Form::close() !!}
                </div> 
            </div>   
        </div>    
    </div>     
</section>
@endsection
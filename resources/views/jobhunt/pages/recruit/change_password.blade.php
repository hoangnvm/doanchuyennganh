@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formCkeditorAttr = config('myconf.template.form_ckeditor');
    @$inputHiddenID      =  Form::hidden('id', $item['id']);
    $elements = [
        [
            'label'     => 'Password',
            'element'   => Form::password('password'),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Nhập lại password',
            'element'   => Form::password('password_confirmation'),
            'class'     => 'col-lg-12'
        ],                
        [
            'element'   => $inputHiddenID  . 'Cập Nhật',
            'type'      => 'btn-submit',
            'class'     => 'col-lg-12'
        ]
    ];
    
@endphp
@extends('jobhunt.main') @section('content') @include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Quản lý mật khẩu</h3>
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
                <div class="col-lg-9 column">
                    <div class="profile-form-edit">              
                            {{ Form::open([
                                    'method' => 'post',
                                    'url' => route("$controllerName/change-password-recruit-post"),
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
    </div>
</section>
@endsection
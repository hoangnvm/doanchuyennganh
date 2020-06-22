@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formCkeditorAttr = config('myconf.template.form_ckeditor');

    @$inputHiddenID      =  Form::hidden('id', $item['id']);


    $companySizeValue = [
        'default'   => 'Quy mô công ty',
        '1'    => config('myconf.template.company_size.1.name'),
        '2'  => config('myconf.template.company_size.2.name'),
        '3'  => config('myconf.template.company_size.3.name'),
        '4'    => config('myconf.template.company_size.4.name'),
        '5'  => config('myconf.template.company_size.5.name'),
        '6'  => config('myconf.template.company_size.6.name'),
        '7'    => config('myconf.template.company_size.7.name'),
        '8'  => config('myconf.template.company_size.8.name')
    ];

    $professionValue = [
        'default'   => 'Ngành nghề',
        '1'    => config('myconf.template.profession.1.name'),
        '2'  => config('myconf.template.profession.2.name'),
        '3'  => config('myconf.template.profession.3.name')
    ];
    $careerValue = [
        'default'   => 'Ngành nghề',
        '1'    => config('myconf.template.career.1.name'),
        '2'  => config('myconf.template.career.2.name'),
        '3'  => config('myconf.template.career.3.name'),
        '4'    => config('myconf.template.career.4.name'),
        '5'  => config('myconf.template.career.5.name'),
        '6'  => config('myconf.template.career.6.name'),
        '7'    => config('myconf.template.career.7.name'),
        '8'  => config('myconf.template.career.8.name'),
        '9'  => config('myconf.template.career.9.name'),
        '10'    => config('myconf.template.career.10.name'),
        '11'  => config('myconf.template.career.11.name'),
        '12'  => config('myconf.template.career.12.name'),
        '13'    => config('myconf.template.career.13.name'),
        '14'  => config('myconf.template.career.14.name'),
        '15'  => config('myconf.template.career.15.name')
    ];

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID     =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);
    $inputHiddenLogo   =  Form::hidden('logo_current', $item['logo']);
    $inputHiddenCoverImage   =  Form::hidden('cover_image_current', $item['cover_image']);
    $elements = [
        [
            'label'     => 'Logo công ty',
            'element'   => Form::file('logo'),
            'class'     => 'col-lg-12',
            'logo'     => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['logo'], @$item['usename']) : null,
            'type'      => 'logo'
        ],
        [
            'label'     => 'Ảnh bìa',
            'element'   => Form::file('cover_image'),
            'class'     => 'col-lg-12',
            'cover_image'     => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['cover_image'], @$item['usename']) : null,
            'type'      => 'cover_image'
        ],
        [
            'label'     => 'Tên công ty',
            'element'   => Form::text('company_name', @$item['company_name']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Ngành nghề',
            'element'   => Form::select('career_id', $careerValue, @$item['career_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Thời gian thành lập',
            'element'   => Form::date('founded_year', @$item['register_date'], ['class' => 'form-control', 'id'=>'datetimepicker']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Quy mô công ty',
            'element'   => Form::select('company_size_id' ,$companySizeValue, @$item['company_size_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Mô tả công ty',
            'element'   => Form::textArea('company_name', @$item['company_name'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            
            'element'   => $inputHiddenTask . $inputHiddenID  . $inputHiddenAvatar . $inputHiddenLogo . $inputHiddenCoverImage . 'Cập Nhật',
            'type'      => 'btn-submit',
            'class'     => 'col-lg-12'
        ]
    ];
@endphp
<div class="profile-form-edit">              
        {{ Form::open([
                'method' => 'post',
                'url' => route("$controllerName/save"),
                'accept-charset' => 'UTF-8',
                'enctype' => 'multipart/form-data',
                'id' => 'main-form'
            ]) }}
            {!! FormTemplate::showFrontend($elements) !!}
        {!! Form::close() !!}
</div> 
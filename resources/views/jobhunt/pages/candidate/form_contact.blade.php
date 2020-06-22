@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;
    
    $formCkeditorAttr = config('myconf.template.form_ckeditor');
    @$inputHiddenID      =  Form::hidden('id', $item['id']);

    $salaryValue = [
        'default'   => 'Mức lương',
        '1'    => config('myconf.template.salary.1.name'),
        '2'  => config('myconf.template.salary.2.name'),
        '3'  => config('myconf.template.salary.3.name'),
        '4'  => config('myconf.template.salary.4.name'),
        '5'  => config('myconf.template.salary.5.name')
    ];

    $experienceValue = [
        'default'   => 'Kinh nghiệm',
        '1'    => config('myconf.template.experience.1.name'),
        '2'  => config('myconf.template.experience.2.name'),
        '3'  => config('myconf.template.experience.3.name'),
        '4'  => config('myconf.template.experience.4.name'),
        '5'  => config('myconf.template.experience.5.name'),
        '6'  => config('myconf.template.experience.6.name'),
        '7'  => config('myconf.template.experience.7.name')
    ];

    $genderValue = [
        'default'   => 'Giới tính',
        '1'    => config('myconf.template.gender.1.name'),
        '2'  => config('myconf.template.gender.2.name'),
        '3'  => config('myconf.template.gender.3.name')
    ];

    $typeValue = [
        'default'   => 'Thể loại',
        '1'    => config('myconf.template.type.1.name'),
        '2'  => config('myconf.template.type.2.name')
    ];

    $levelValue = [
        'default'   => 'Trình độ',
        '1'    => config('myconf.template.level.1.name'),
        '2'  => config('myconf.template.level.2.name')
    ];

    $workTypeValue = [
        'default'   => 'Hình thức làm việc',
        '1'    => config('myconf.template.work_type.1.name'),
        '2'  => config('myconf.template.work_type.2.name'),
        '3'    => config('myconf.template.work_type.3.name'),
        '4'  => config('myconf.template.work_type.4.name'),
        '5'    => config('myconf.template.work_type.5.name')
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

    $cityValue = [
        'default'   => 'Tỉnh/Thành phố',
        '1'    => config('myconf.template.city.1.name'),
        '2'  => config('myconf.template.city.2.name'),
        '3'  => config('myconf.template.city.3.name')
    ];

    $districtValue = [
        'default'   => 'Quận/Huyện',
        '1'    => config('myconf.template.district.1.name'),
        '2'  => config('myconf.template.district.2.name'),
        '3'  => config('myconf.template.district.3.name')
    ];

    $wardValue = [
        'default'   => 'Phường/Xã',
        '1'    => config('myconf.template.ward.1.name'),
        '2'  => config('myconf.template.ward.2.name'),
        '3'  => config('myconf.template.ward.3.name')
    ];

    $inputHiddenTask     =  Form::hidden('task', 'edit');

    $elements = [        
        [
            'label'     => 'Số điện thoại',
            'element'   => Form::text('phone', @$item['phone']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Email',
            'element'   => Form::text('email', @$item['email']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Facebook',
            'element'   => Form::text('facebook', @$item['facebook']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Google',
            'element'   => Form::text('google', @$item['google']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Tỉnh/Thành phố',
            'element'   => Form::select('city_id' ,$cityValue, @$item['city_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Quận/Huyện',
            'element'   => Form::select('district_id' ,$districtValue, @$item['district_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Phường/Xã',
            'element'   => Form::select('ward_id' ,$wardValue, @$item['ward_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Địa chỉ',
            'element'   => Form::text('address', @$item['address']),
            'class'     => 'col-lg-6'
        ],
        [
            
            'element'   => $inputHiddenTask . $inputHiddenID  . 'Cập Nhật',
            'type'      => 'btn-submit',
            'class'     => 'col-lg-12'
        ]
    ];
@endphp
<div class="contact-edit">        
    <h3>Thông tin liên hệ</h3>      
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
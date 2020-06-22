@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formCkeditorAttr = config('myconf.template.form_ckeditor');
    @$inputHiddenTask      =  Form::hidden('task', 'edit');    
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


    $inputHiddenID     =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);

    $elements = [
        [
            'label'     => 'Avatar',
            'element'   => Form::file('avatar'),
            'class'     => 'col-lg-12',
            'avatar'     => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['avatar'], @$item['usename']) : null,
            'type'      => 'avatar'
        ],
        [
            'label'     => 'Tên đầy đủ',
            'element'   => Form::text('fullname', @$item['fullname']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Tuổi',
            'element'   => Form::text('age', @$item['age']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Giới tính',
            'element'   => Form::select('gender' ,$genderValue, @$item['gender'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Công việc',
            'element'   => Form::select('career_id' ,$careerValue, @$item['career_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Mức lương mong đợi',
            'element'   => Form::select('salary_id' ,$salaryValue, @$item['salary_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Kinh nghiệm',
            'element'   => Form::select('experience_id' ,$experienceValue, @$item['experience_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Trình độ',
            'element'   => Form::select('level_id' ,$levelValue, @$item['level_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Hình thức làm việc',
            'element'   => Form::select('work_type_id' ,$workTypeValue, @$item['work_type_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Mô tả bản thân',
            'element'   => Form::textArea('about', @$item['about'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Trình độ học vấn',
            'element'   => Form::textArea('academic_level', @$item['academic_level'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Mô tả kinh nghiệm',
            'element'   => Form::textArea('experience', @$item['experience'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            
            'element'   => $inputHiddenTask . $inputHiddenID  . $inputHiddenAvatar . 'Cập Nhật',
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
@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');
    $formCkeditorAttr = config('myconf.template.form_ckeditor');

    $statusValue = [
        'default'   => 'Select status',
        '1'    => config('myconf.template.status.1.name'),
        '0'  => config('myconf.template.status.0.name')
    ];

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
    ];

    $typeValue = [
        'default'   => 'Thể loại',
        '0'    => config('myconf.template.type.0.name'),
        '1'    => config('myconf.template.type.1.name')
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

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID       =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);

    $elements = [
        [
            'label'     => Form::label('username', 'Tên đăng nhập', $formLabelAttr  ),
            'element'   => Form::text('username', $item['username'], $formInputAttr)
        ],
        [
            'label'     => Form::label('avatar', 'Avatar',    $formLabelAttr),
            'element'   => Form::file('avatar',  $formInputAttr),
            'avatar'    => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['avatar'], @$item['username']): null,
            'type'      => 'avatar'
        ],  
        [
            'label'     => Form::label('fullname', 'Tên đầy đủ', $formLabelAttr  ),
            'element'   => Form::text('fullname', $item['fullname'], $formInputAttr)
        ],
        [
            'label'     => Form::label('age', 'Tuổi', $formLabelAttr  ),
            'element'   => Form::text('age', $item['age'], $formInputAttr)
        ],
        [
            'label'     => Form::label('gender', 'Giới tính',  $formLabelAttr  ),
            'element'   => Form::select('gender' ,$companySizeValue, $item['gender'],   $formInputAttr)
        ],
        [
            'label'     => Form::label('career_id', 'Ngành nghề',  $formLabelAttr  ),
            'element'   => Form::select('career_id' ,$careerValue, $item['career_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('salary_id', 'Mức lương',  $formLabelAttr  ),
            'element'   => Form::select('salary_id' ,$salaryValue, $item['salary_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('experience_id', 'Kinh nghiệm',  $formLabelAttr  ),
            'element'   => Form::select('experience_id' ,$experienceValue, $item['experience_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('level_id', 'Trình độ',  $formLabelAttr  ),
            'element'   => Form::select('level_id' ,$levelValue, $item['level_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('work_type_id', 'HT làm việc',  $formLabelAttr  ),
            'element'   => Form::select('work_type_id' ,$workTypeValue, $item['work_type_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('about', 'Mô tả bản thân', $formLabelAttr  ),
            'element'   => Form::textarea('about', $item['about'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('academic_level', 'Trình độ học vấn', $formLabelAttr  ),
            'element'   => Form::textArea('academic_level', $item['academic_level'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('experience', 'Mô tả kinh nghiệm', $formLabelAttr  ),
            'element'   => Form::textarea('experience', $item['experience'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('status', 'Status',  $formLabelAttr  ),
            'element'   => Form::select('status' ,$statusValue, $item['status'] ,  $formInputAttr)
        ],   
        [
            'element'   => $inputHiddenTask .$inputHiddenID . $inputHiddenAvatar .  Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-7 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Company Info'])
        <!--form-->
        <div class="x_content">                   
            {{ Form::open([
                    'method' => 'post',
                    'url' => route("$controllerName/save-candidate-backend"),
                    'accept-charset' => 'UTF-8',
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'main-form'
                ]) }}
                {!! FormTemplate::show($elements) !!}
            {!! Form::close() !!}

        </div>
        <!--end-form-->
    </div>
</div> 
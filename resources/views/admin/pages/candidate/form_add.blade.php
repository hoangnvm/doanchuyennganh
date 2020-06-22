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
        '3'  => config('myconf.template.city.3.name'),
        '4'    => config('myconf.template.city.4.name'),
        '5'  => config('myconf.template.city.5.name'),
        '6'  => config('myconf.template.city.6.name'),
        '7'    => config('myconf.template.city.7.name'),
        '8'  => config('myconf.template.city.8.name'),
        '9'  => config('myconf.template.city.9.name'),
        '10'    => config('myconf.template.city.10.name'),
        '11'  => config('myconf.template.city.11.name'),
        '12'  => config('myconf.template.city.12.name'),
        '13'    => config('myconf.template.city.13.name'),
        '14'  => config('myconf.template.city.14.name'),
        '15'  => config('myconf.template.city.15.name'),
        '16'    => config('myconf.template.city.16.name'),
        '17'  => config('myconf.template.city.17.name'),
        '18'  => config('myconf.template.city.18.name'),
        '19'    => config('myconf.template.city.19.name'),
        '20'  => config('myconf.template.city.20.name'),
        '21'  => config('myconf.template.city.21.name'),
        '22'    => config('myconf.template.city.22.name'),
        '23'  => config('myconf.template.city.23.name'),
        '24'  => config('myconf.template.city.24.name'),
        '25'  => config('myconf.template.city.25.name'),
        '26'    => config('myconf.template.city.26.name'),
        '27'  => config('myconf.template.city.27.name'),
        '28'  => config('myconf.template.city.28.name'),
        '29'  => config('myconf.template.city.29.name'),
        '30'  => config('myconf.template.city.30.name'),
        '31'  => config('myconf.template.city.31.name'),
        '32'    => config('myconf.template.city.32.name'),
        '33'  => config('myconf.template.city.33.name'),
        '34'  => config('myconf.template.city.34.name'),
        '35'  => config('myconf.template.city.35.name'),
        '36'    => config('myconf.template.city.36.name'),
        '37'  => config('myconf.template.city.37.name'),
        '38'  => config('myconf.template.city.38.name'),
        '39'  => config('myconf.template.city.39.name'),
        '40'  => config('myconf.template.city.40.name'),
        '41'  => config('myconf.template.city.41.name'),
        '42'    => config('myconf.template.city.42.name'),
        '43'  => config('myconf.template.city.43.name'),
        '44'  => config('myconf.template.city.44.name'),
        '45'  => config('myconf.template.city.45.name'),
        '46'    => config('myconf.template.city.46.name'),
        '47'  => config('myconf.template.city.47.name'),
        '48'  => config('myconf.template.city.48.name'),
        '49'  => config('myconf.template.city.49.name'),
        '50'  => config('myconf.template.city.50.name'),
        '51'  => config('myconf.template.city.51.name'),
        '52'    => config('myconf.template.city.52.name'),
        '53'  => config('myconf.template.city.53.name'),
        '54'  => config('myconf.template.city.54.name'),
        '55'  => config('myconf.template.city.55.name'),
        '56'    => config('myconf.template.city.56.name'),
        '57'  => config('myconf.template.city.57.name'),
        '58'  => config('myconf.template.city.58.name'),
        '59'  => config('myconf.template.city.59.name'),
        '60'  => config('myconf.template.city.60.name'),
        '61'  => config('myconf.template.city.61.name'),
        '62'    => config('myconf.template.city.62.name'),
        '63'  => config('myconf.template.city.63.name'),
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
    $inputHiddenTask     =  Form::hidden('task', 'add');

    $elements = [
        [
            'label'     => Form::label('username', 'Tên đăng nhập', $formLabelAttr  ),
            'element'   => Form::text('username', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('avatar', 'Avatar',    $formLabelAttr),
            'element'   => Form::file('avatar',  $formInputAttr),
            'avatar'    => null,
            'type'      => 'avatar'
        ],  
        [
            'label'     => Form::label('password', 'Mật khẩu',    $formLabelAttr  ),
            'element'   => Form::password('password', $formInputAttr)
        ],
        [
            'label'     => Form::label('password_confirmation', 'Nhập lại mật khẩu', $formLabelAttr  ),
            'element'   => Form::password('password_confirmation', $formInputAttr)
        ],
        [
            'label'     => Form::label('fullname', 'Tên đầy đủ', $formLabelAttr  ),
            'element'   => Form::text('fullname', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('age', 'Tuổi', $formLabelAttr  ),
            'element'   => Form::text('age', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('gender', 'Giới tính',  $formLabelAttr  ),
            'element'   => Form::select('gender' ,$genderValue, null,   $formInputAttr)
        ],
        [
            'label'     => Form::label('career_id', 'Ngành nghề',  $formLabelAttr  ),
            'element'   => Form::select('career_id' ,$careerValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('salary_id', 'Mức lương',  $formLabelAttr  ),
            'element'   => Form::select('salary_id' ,$salaryValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('experience_id', 'Kinh nghiệm',  $formLabelAttr  ),
            'element'   => Form::select('experience_id' ,$experienceValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('level_id', 'Trình độ',  $formLabelAttr  ),
            'element'   => Form::select('level_id' ,$levelValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('work_type_id', 'HT làm việc',  $formLabelAttr  ),
            'element'   => Form::select('work_type_id' ,$workTypeValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('about', 'Mô tả bản thân', $formLabelAttr  ),
            'element'   => Form::textarea('about', null, $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('academic_level', 'Trình độ học vấn', $formLabelAttr  ),
            'element'   => Form::textArea('academic_level', null, $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('experience', 'Mô tả kinh nghiệm', $formLabelAttr  ),
            'element'   => Form::textarea('experience', null, $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('status', 'Status',  $formLabelAttr  ),
            'element'   => Form::select('status' ,$statusValue, null ,  $formInputAttr)
        ],   

        [
            'label'     => Form::label('phone', 'Số điện thoại', $formLabelAttr  ),
            'element'   => Form::text('phone', null,   $formInputAttr  )
        ],
        [
            'label'     => Form::label('email', 'Email', $formLabelAttr  ),
            'element'   => Form::text('email', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('facebook', 'Facebook', $formLabelAttr  ),
            'element'   => Form::text('facebook', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('google', 'Google', $formLabelAttr  ),
            'element'   => Form::text('google', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('city_id', 'Tỉnh/Thành phố',  $formLabelAttr  ),
            'element'   => Form::select('city_id' ,$cityValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('district_id', 'Quận/Huyện',  $formLabelAttr  ),
            'element'   => Form::select('district_id' ,$districtValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('ward_id', 'Phường/Xã',  $formLabelAttr  ),
            'element'   => Form::select('ward_id' ,$wardValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('address', 'Địa chỉ', $formLabelAttr  ),
            'element'   => Form::text('address', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('cv', 'CV đính kèm',    $formLabelAttr),
            'element'   => Form::file('cv',  $formInputAttr),
            'cv'    => null,
            'type'      => 'cv'
        ],  
        [
            'element'   => $inputHiddenTask . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Add'])
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
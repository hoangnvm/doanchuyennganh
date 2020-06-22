@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

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

    $workTypelValue = [
        'default'   => 'Hình thức làm việc',
        '1'    => config('myconf.template.work_type.1.name'),
        '2'  => config('myconf.template.work_type.2.name'),
        '3'    => config('myconf.template.work_type.3.name'),
        '4'  => config('myconf.template.work_type.4.name'),
        '5'    => config('myconf.template.work_type.5.name')
    ];

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID     =  Form::hidden('id', $item['id']);

    $elements = [
        [
            'label'     => 'Tên công việc',
            'element'   => Form::text('title', $item['title']),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Ngành nghề',
            'element'   => Form::select('career_id' ,$careerValue, $item['career_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Nơi làm việc',
            'element'   => Form::text('work_place', $item['work_place']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Vị trí cần tuyển',
            'element'   => Form::text('position', $item['position']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Số lượng',
            'element'   => Form::text('amount', $item['amount']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Mức lương',
            'element'   => Form::select('salary_id' ,$salaryValue, $item['salary_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Trình độ',
            'element'   => Form::select('level_id' ,$levelValue, $item['level_id'],   ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Kinh nghiệm',
            'element'   => Form::select('experience_id' ,$experienceValue, $item['experience_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Hình thức làm việc',
            'element'   => Form::select('work_type_id' ,$workTypelValue, $item['work_type_id'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Giới tính',
            'element'   => Form::select('gender' ,$genderValue, $item['gender'], ['class' => 'chosen']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Ngày hết hạn',
            'element'   => Form::date('expiration_date', $item['expiration_date'], ['class' => 'form-control', 'id'=>'datetimepicker']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Mô tả',
            'element'   => Form::textArea('description', $item['description'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Yêu cầu công việc',
            'element'   => Form::textArea('required', $item['required'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Quyền lợi',
            'element'   => Form::textArea('benefit', $item['benefit'], $formCkeditorAttr),
            'class'     => 'col-lg-12'
        ],
        [
            'label'     => 'Số điện thoại',
            'element'   => Form::text('phone_contact', @$item['phone_contact']),
            'class'     => 'col-lg-6'
        ],
        [
            'label'     => 'Email',
            'element'   => Form::text('email_contact', @$item['email_contact']),
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
            'element'   => $inputHiddenTask . $inputHiddenID . 'Đăng tin tuyển dụng',
            'type'      => 'btn-submit',
            'class'     => 'col-lg-12'
        ]
    ];
@endphp

<div class="col-lg-9 column">
    <div class="padding-left">
        <div class="profile-title">
            <h3>Post a New Job</h3>
        </div>
        <div class="profile-form-edit contact-edit">            
            {{ Form::open([
                'method' => 'post',
                'url' => route("$controllerName/save-job-frontend"),
                'accept-charset' => 'UTF-8',
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal form-label-left',
                'id' => 'main-form'
            ]) }}
                {!! FormTemplate::showFrontend($elements) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
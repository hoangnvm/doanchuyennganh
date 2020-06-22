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
        '3'  => config('myconf.template.gender.3.name')
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

    $workTypelValue = [
        'default'   => 'Hình thức làm việc',
        '1'    => config('myconf.template.work_type.1.name'),
        '2'  => config('myconf.template.work_type.2.name'),
        '3'    => config('myconf.template.work_type.3.name'),
        '4'  => config('myconf.template.work_type.4.name'),
        '5'    => config('myconf.template.work_type.5.name')
    ];

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID       =  Form::hidden('id', $item['id']);

    $elements = [
        [
            'label'     => Form::label('title', 'Tiêu đề', $formLabelAttr  ),
            'element'   => Form::text('title', $item['title'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('career_id', 'Ngành nghề',  $formLabelAttr  ),
            'element'   => Form::select('career_id' ,$careerValue, $item['career_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('position', 'Vị trí ứng tuyển', $formLabelAttr  ),
            'element'   => Form::text('position', $item['position'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('amount', 'Số lượng', $formLabelAttr  ),
            'element'   => Form::text('amount', $item['amount'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('salary_id', 'Mức lương',  $formLabelAttr  ),
            'element'   => Form::select('salary_id' ,$salaryValue, $item['salary_id'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('level_id', 'Trình độ',  $formLabelAttr  ),
            'element'   => Form::select('level_id' ,$levelValue, $item['level_id'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('experience_id', 'Kinh nghiệm',  $formLabelAttr  ),
            'element'   => Form::select('experience_id' ,$experienceValue, $item['experience_id'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('work_type_id', 'Hình thức làm việc',  $formLabelAttr  ),
            'element'   => Form::select('work_type_id' ,$workTypelValue, $item['work_type_id'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('gender', 'Giới tính',  $formLabelAttr  ),
            'element'   => Form::select('gender' ,$genderValue, $item['gender'],   $formInputAttr)
        ],       
        [
            'label'     => Form::label('expiration_date', 'Ngày hết hạn',  $formLabelAttr  ),
            'element'   => Form::date('expiration_date', $item['expiration_date'], ['class' => 'form-control', 'id'=>'datetimepicker']) 
        ],  
        [
            'label'     => Form::label('type', 'Thể loại',  $formLabelAttr  ),
            'element'   => Form::select('type' ,$typeValue, $item['type'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('status', 'Trạng thái',  $formLabelAttr  ),
            'element'   => Form::select('status' ,$statusValue, $item['status'],   $formInputAttr)
        ], 
        [
            'label'     => Form::label('description', 'Mô tả', $formLabelAttr  ),
            'element'   => Form::textarea('description', $item['description'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('required', 'Yêu cầu công việc', $formLabelAttr  ),
            'element'   => Form::textarea('required', $item['required'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('benefit', 'Quyền lợi', $formLabelAttr  ),
            'element'   => Form::textarea('benefit', $item['benefit'], $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('phone_contact', 'Số điện thoại', $formLabelAttr  ),
            'element'   => Form::text('phone_contact', $item['phone_contact'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('email_contact', 'Email', $formLabelAttr  ),
            'element'   => Form::text('email_contact', $item['email_contact'], $formInputAttr)
        ],
        [
            'label'     => Form::label('name_contact', 'Tên liên hệ', $formLabelAttr  ),
            'element'   => Form::text('name_contact', $item['name_contact'], $formInputAttr)
        ],
        [
            'label'     => Form::label('city_id', 'Tỉnh/Thành phố',  $formLabelAttr  ),
            'element'   => Form::select('city_id' ,$cityValue, $item['city_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('district_id', 'Quận/Huyện',  $formLabelAttr  ),
            'element'   => Form::select('district_id' ,$districtValue, $item['district_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('ward_id', 'Phường/Xã',  $formLabelAttr  ),
            'element'   => Form::select('ward_id' ,$wardValue, $item['ward_id'],   $formInputAttr)
        ],  
        [
            'label'     => Form::label('address', 'Địa chỉ', $formLabelAttr  ),
            'element'   => Form::text('address', $item['address'], $formInputAttr)
        ],
        [
            'element'   => $inputHiddenTask . $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Company Info'])
        <!--form-->
        <div class="x_content">                   
            {{ Form::open([
                    'method' => 'post',
                    'url' => route("$controllerName/save"),
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
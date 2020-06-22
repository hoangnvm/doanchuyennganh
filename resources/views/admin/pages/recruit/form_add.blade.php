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

    $inputHiddenTask     =  Form::hidden('task', 'add');


    $elements = [
        [
            'label'     => Form::label('company_name', 'Tên công ty', $formLabelAttr  ),
            'element'   => Form::text('company_name', null,   $formInputAttr  )
        ],
        [
            'label'     => Form::label('logo', 'Logo công ty',    $formLabelAttr),
            'element'   => Form::file('logo',  $formInputAttr),
            'logo'      => null,
            'type'      => 'logo'
        ], 
        [
            'label'     => Form::label('cover_image', 'Ảnh bìa công ty',    $formLabelAttr),
            'element'   => Form::file('cover_image',  $formInputAttr),
            'cover_image'    => null,
            'type'      => 'cover_image'
        ], 
        [
            'label'     => Form::label('username', 'Tên đăng nhập', $formLabelAttr  ),
            'element'   => Form::text('username', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('password', 'Mật khẩu',    $formLabelAttr  ),
            'element'   => Form::password('password', $formInputAttr)
        ],
        [
            'label'     => Form::label('password_confirmation', 'Password Confirmation', $formLabelAttr  ),
            'element'   => Form::password('password_confirmation', $formInputAttr)
        ],
        [
            'label'     => Form::label('company_size_id', 'Quy mô',  $formLabelAttr  ),
            'element'   => Form::select('company_size_id' ,$companySizeValue, null,   $formInputAttr)
        ],        
        [
            'label'     => Form::label('founded_year', 'Ngày thành lập',  $formLabelAttr  ),
            'element'   => Form::date('founded_year', null, ['class' => 'form-control', 'id'=>'datetimepicker']) 
        ],  
        [
            'label'     => Form::label('career_id', 'Ngành nghề',  $formLabelAttr  ),
            'element'   => Form::select('career_id' ,$careerValue, null,   $formInputAttr)
        ],  
        [
            'label'     => Form::label('about', 'Giới thiệu', $formLabelAttr  ),
            'element'   => Form::textarea('about', null, $formCkeditorAttr)
        ],
        [
            'label'     => Form::label('status', 'Status',  $formLabelAttr  ),
            'element'   => Form::select('status' ,$statusValue, null ,  $formInputAttr)
        ],   
        [
            'label'     => Form::label('avatar', 'Avatar',    $formLabelAttr),
            'element'   => Form::file('avatar',  $formInputAttr),
            'avatar'    => null,
            'type'      => 'avatar'
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
            'label'     => Form::label('website', 'Website', $formLabelAttr  ),
            'element'   => Form::text('website', null, $formInputAttr)
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
                    'url' => route("$controllerName/save-recruit-backend"),
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
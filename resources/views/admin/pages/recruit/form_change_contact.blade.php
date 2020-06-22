@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');
    $formCkeditorAttr = config('myconf.template.form_ckeditor');

    
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
    $inputHiddenID       =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);

    $elements = [        
        [
            'label'     => Form::label('phone', 'Số điện thoại', $formLabelAttr  ),
            'element'   => Form::text('phone', $item['phone'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('email', 'Email', $formLabelAttr  ),
            'element'   => Form::text('email', $item['email'], $formInputAttr)
        ],
        [
            'label'     => Form::label('website', 'Website', $formLabelAttr  ),
            'element'   => Form::text('website', $item['website'], $formInputAttr)
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
            'element'   => $inputHiddenTask .$inputHiddenID . $inputHiddenAvatar .  Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-5 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Contact'])
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
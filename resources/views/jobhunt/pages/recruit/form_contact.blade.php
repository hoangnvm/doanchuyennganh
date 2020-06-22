@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    @$inputHiddenID      =  Form::hidden('id', $item['id']);

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
            'label'     => 'Số điện thoại',
            'element'   => Form::text('phone', @$item['phone']),
            'class'     => 'col-lg-4'
        ],
        [
            'label'     => 'Email',
            'element'   => Form::text('email', @$item['email']),
            'class'     => 'col-lg-4'
        ],
        [
            'label'     => 'Website',
            'element'   => Form::text('website', @$item['website']),
            'class'     => 'col-lg-4'
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
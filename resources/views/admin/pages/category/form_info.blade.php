@php
use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');

    @$statusValue = [
        'default'   => 'Select status',
        '1'    => config('myconf.template.status.1.name'),
        '0'  => config('myconf.template.status.0.name')
    ];


    $inputHiddenID       =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);
    $inputHiddenTask     =  Form::hidden('task', 'edit-info');

    $elements = [
        [
            'label'     => Form::label('username', 'Userame',          $formLabelAttr  ),
            'element'   => Form::text('username', @$item['username'],   $formInputAttr  )
        ],
        [
            'label'     => Form::label('email', 'Email',    $formLabelAttr  ),
            'element'   => Form::text('email', @$item['email'], $formInputAttr)
        ],
        [
            'label'     => Form::label('fullname', 'Fullname',    $formLabelAttr  ),
            'element'   => Form::text('fullname', @$item['fullname'], $formInputAttr)
        ],       
        [
            'label'     => Form::label('status', 'Status',  $formLabelAttr  ),
            'element'   => Form::select('status' ,$statusValue, @$item['status'],   $formInputAttr)
        ],   
        [
            'label'     => Form::label('avatar', 'Avatar',    $formLabelAttr),
            'element'   => Form::file('avatar',  $formInputAttr),
            'avatar'     => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['avatar'], @$item['username']) : null,
            'type'      => 'avatar'
        ],  
        [
            'element'   => $inputHiddenID. $inputHiddenAvatar . $inputHiddenTask . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Edit Info'])
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


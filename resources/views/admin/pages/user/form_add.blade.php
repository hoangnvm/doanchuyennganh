@php
use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');

    $statusValue = [
        'default'   => 'Select status',
        '1'    => config('myconf.template.status.1.name'),
        '0'  => config('myconf.template.status.0.name')
    ];

    $roleValue = [
        'default'   => 'Select level',
        '1'    => config('myconf.template.change-role.1.name'),
        '2'  => config('myconf.template.change-role.2.name'),
        '3'  => config('myconf.template.change-role.3.name')
    ];

    $inputHiddenTask     =  Form::hidden('task', 'add');

    $elements = [
        [
            'label'     => Form::label('username', 'Userame', $formLabelAttr  ),
            'element'   => Form::text('username', null,   $formInputAttr  )
        ],
        [
            'label'     => Form::label('email', 'Email', $formLabelAttr  ),
            'element'   => Form::text('email', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('fullname', 'Fullname',    $formLabelAttr  ),
            'element'   => Form::text('fullname', null, $formInputAttr)
        ],
        [
            'label'     => Form::label('password', 'Password',    $formLabelAttr  ),
            'element'   => Form::password('password', $formInputAttr)
        ],
        [
            'label'     => Form::label('password_confirmation', 'Password Confirmation', $formLabelAttr  ),
            'element'   => Form::password('password_confirmation', $formInputAttr)
        ],
        [
            'label'     => Form::label('role', 'Role',  $formLabelAttr  ),
            'element'   => Form::select('role' ,$roleValue, null,   $formInputAttr)
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
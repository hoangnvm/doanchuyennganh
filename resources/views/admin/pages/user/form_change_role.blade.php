@php
use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');


    $roleValue = [
        'default'   => 'Select level',
        '1'    => config('myconf.template.change-role.1.name'),
        '2'  => config('myconf.template.change-role.2.name'),
        '3'  => config('myconf.template.change-role.3.name')
    ];

    $inputHiddenID      =  Form::hidden('id', $item['id']);
    $inputHiddenTask     =  Form::hidden('task', 'change-role');

    $elements = [
        [
            'label'     => Form::label('level', 'Level',  $formLabelAttr  ),
            'element'   => Form::select('level' ,$roleValue, $item['level'],   $formInputAttr)
        ],        
        [
            'element'   => $inputHiddenID . $inputHiddenTask . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Level'])
        <!--form-->
        <div class="x_content">                   
            {{ Form::open([
                    'method' => 'POST',
                    'url' => route("$controllerName/change-role-post"),
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

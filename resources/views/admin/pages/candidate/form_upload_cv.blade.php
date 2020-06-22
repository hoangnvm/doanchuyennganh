@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');    

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID       =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);

    $elements = [
        [
            'label'     => Form::label('cv', 'CV đính kèm',    $formLabelAttr),
            'element'   => Form::file('cv',  $formInputAttr),
            'cv'    => null,
            'type'      => 'cv'
        ],  
        [
            'element'   => $inputHiddenTask .$inputHiddenID . $inputHiddenAvatar .  Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-5 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Password'])
        <!--form-->
        <div class="x_content">                   
            {{ Form::open([
                    'method' => 'post',
                    'url' => route("$controllerName/change-password"),
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
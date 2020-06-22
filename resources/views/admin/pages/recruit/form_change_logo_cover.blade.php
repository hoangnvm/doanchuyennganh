@php
    use App\Helpers\Template as Template;
    use App\Helpers\FormTemplate as FormTemplate;

    $formInputAttr = config('myconf.template.form_input');
    $formLabelAttr = config('myconf.template.form_label');    

    $inputHiddenTask     =  Form::hidden('task', 'edit');
    $inputHiddenID       =  Form::hidden('id', $item['id']);
    $inputHiddenAvatar   =  Form::hidden('avatar_current', $item['avatar']);
    $inputHiddenLogo   =  Form::hidden('logo_current', $item['logo']);
    $inputHiddenCoverImage   =  Form::hidden('cover_image_current', $item['cover_image']);

    $elements = [
        [
            'label'     => Form::label('logo', 'Logo công ty',    $formLabelAttr),
            'element'   => Form::file('logo',  $formInputAttr),
            'logo'      => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['logo'], @$item['username']) : null,
            'type'      => 'logo'
        ], 
        [
            'label'     => Form::label('cover_image', 'Ảnh bìa công ty',    $formLabelAttr),
            'element'   => Form::file('cover_image',  $formInputAttr),
            'cover_image'    => (!empty($item['id'])) ? Template::showItemThumb($controllerName, @$item['cover_image'], @$item['username']) : null,
            'type'      => 'cover_image'
        ], 
        [
            'element'   => $inputHiddenTask .$inputHiddenID . $inputHiddenAvatar .  Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ];

@endphp

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Logo & Cover Image'])
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
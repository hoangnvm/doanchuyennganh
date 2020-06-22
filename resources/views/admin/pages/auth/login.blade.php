@extends('admin.auth')
@section('content')

    <div class="card fat">
        <div class="card-body">
            <h4 class="card-title">Đăng nhập hệ thống</h4>
                @include('admin.templates.error')
                @include('admin.templates.my_notify')
                {!! Form::open([
                    'method' => 'POST',
                    'url' => route("$controllerName/post-login"),
                    'id' => 'auth-form'
                ])!!}

                <div class="form-group">
                    {!! Form::label('email', "Email") !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', "Mật khẩu") !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required' => true, 'data-eye' => true]) !!}
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block"> Đăng nhập</button>
                </div>
                {!! Form::close() !!}
        </div>
    </div>

@endsection

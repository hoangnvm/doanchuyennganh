<div class="col-lg-6">
    <div class="account-popup-area signin-popup-box static">
        <div class="account-popup">
            <h1>Ứng viên</h1>                
            {!! Form::open([
                'method' => 'POST',
                'url' => route("$controllerName/register-candidate"),
                'id' => 'auth-form'
            ])!!}              
                <div class="cfield">
                    {!! Form::text('email', null,['placeholder' => 'Email'])!!}
                </div>
                <div class="cfield">
                    {!! Form::password('password',['placeholder' => 'Password'])!!}
                </div>
                <button type="submit">Đăng ký</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
        
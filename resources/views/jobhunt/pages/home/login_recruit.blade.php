<div class="col-lg-6">
    <div class="account-popup-area signin-popup-box static">
        <div class="account-popup">
            <h1>Người tuyển dụng</h1>                
            {!! Form::open([
                'method' => 'POST',
                'url' => route("$controllerName/login-recruit"),
                'id' => 'auth-form'
            ])!!}              
                <div class="cfield">
                    {!! Form::text('email', null,['placeholder' => 'Email'])!!}
                </div>
                <div class="cfield">
                    {!! Form::password('password',['placeholder' => 'Password'])!!}
                </div>
                <p class="remember-label">
                    <input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
                </p>
                <a href="#" title="">Forgot Password?</a>
                <button type="submit">Login</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
        
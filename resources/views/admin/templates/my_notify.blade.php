@if (session('my_notify'))
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span arial-hidden="true">x</span>
                </button>
                <strong>{{ session('my_notify') }}</strong>
            </div>
        </div>
    </div>
@endif
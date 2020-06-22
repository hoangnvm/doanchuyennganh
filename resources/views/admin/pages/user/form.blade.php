@extends('admin.main')
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'pageTitle' => "Tài khoản"])
    @include('admin.templates.error')
    <!--box-lists-->
    <div class="row">
        @if (isset($item['id']))
            @include('admin.pages.user.form_info')
            @include('admin.pages.user.form_change_password')       
            @include('admin.pages.user.form_change_role') 
        @else
            @include('admin.pages.user.form_add')         
        @endif
    </div>
    <!--end-box-lists-->         
@endsection

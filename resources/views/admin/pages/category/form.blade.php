@extends('admin.main')
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'pageTitle' => "Tài khoản"])
    @include('admin.templates.error')
    <!--box-lists-->
    <div class="row">
        @if (isset($item['id']))
            @include('admin.pages.category.form_info')
        @else
            @include('admin.pages.user.form_add')         
        @endif
    </div>
    <!--end-box-lists-->         
@endsection

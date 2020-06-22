@extends('admin.main')
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'pageTitle' => "Nhà tuyển dụng"]);
    @include('admin.templates.error')
    
    <div class="row">
        @if (isset($item['id']))
            @include('admin.pages.recruit.form_change_logo_cover')
            @include('admin.pages.recruit.form_company_info')            
            @include('admin.pages.recruit.form_change_contact')
            @include('admin.pages.recruit.form_change_password')
        @else
            @include('admin.pages.recruit.form_add')         
        @endif
    </div>
      
@endsection

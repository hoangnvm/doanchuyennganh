@extends('admin.main')
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'pageTitle' => "Nhà tuyển dụng"]);
    @include('admin.templates.error')
    
    <div class="row">
        @if (isset($item['id']))
            @include('admin.pages.candidate.form_profile_info')            
            @include('admin.pages.candidate.form_change_contact')
            @include('admin.pages.candidate.form_change_password')
            @include('admin.pages.candidate.form_upload_cv')
        @else
            @include('admin.pages.candidate.form_add')         
        @endif
    </div>
      
@endsection

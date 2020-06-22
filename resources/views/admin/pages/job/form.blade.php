@extends('admin.main')
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false, 'pageTitle' => "Nhà tuyển dụng"]);
    @include('admin.templates.error')
    
    <div class="row">
        @if (isset($item['id']))
            @include('admin.pages.job.form_job_info')            
        @else
            @include('admin.pages.job.form_add')         
        @endif
    </div>
      
@endsection

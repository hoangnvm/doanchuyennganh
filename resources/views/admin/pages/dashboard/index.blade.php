@extends('admin.main')
@section('content')    
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => "Dashboard"])
                <div class="x_content">
                </div>
            </div>
        </div>
    </div>
@endsection
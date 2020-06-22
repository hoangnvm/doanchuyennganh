@php
    $pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về </a>', route($controllerName . '/manager'));
    if($pageIndex == true)  $pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới </a>', route($controllerName . '/form'));

    
@endphp
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Quản lý {{ $pageTitle }}</h3>
    </div>
    <div class="zvn-add-new pull-right">
        {!! $pageButton !!}
    </div>
</div>
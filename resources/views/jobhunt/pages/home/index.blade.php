@extends('jobhunt.main')
@section('content')
    @include('jobhunt.elements.header', ['class' => 'stick-top forsticky'])
    @include('jobhunt.pages.home.search', ['showSearchArea' => false])
    @include('jobhunt.pages.home.career', ['items' => $itemsCareerModel])
    @include('jobhunt.pages.home.featured_job')
    @include('jobhunt.pages.home.article')
    @include('jobhunt.elements.footer')
@endsection
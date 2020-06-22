@extends('jobhunt.main')
@section('content')
    @include('jobhunt.elements.header', ['class' => 'gradient'])
    <section>	
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    @include('jobhunt.pages.home.register_candidate')
                    @include('jobhunt.pages.home.register_recruit')
                </div>
            </div>
        </div>
    </section>
    @include('jobhunt.elements.footer')
@endsection
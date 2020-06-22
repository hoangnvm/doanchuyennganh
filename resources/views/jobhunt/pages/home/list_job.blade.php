@extends('jobhunt.main')
@php
    use App\Helpers\URL as URL;
    use App\Helpers\HighLight as HighLight;
    
@endphp
@section('content')
    @include('jobhunt.elements.header', ['class' => 'stick-top forsticky'])
    @include('jobhunt.pages.home.search', ['showSearchArea' => true])
    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row no-gape">
                    <div class="col-lg-12">
                        <div class="modrn-joblist np">
                            <div class="filterbar">
                                {{-- <span class="emlthis"><a href="https://grandetest.com/cdn-cgi/l/email-protection#b2d7cad3dfc2ded79cd1dddf" title=""><i class="la la-envelope-o"></i> Email me Jobs Like These</a></span>
                                <div class="sortby-sec">
                                    <span>Sort by</span>
                                    <select data-placeholder="Most Recent" class="chosen">
                                        <option>Most Recent</option>
                                        <option>Most Recent</option>
                                        <option>Most Recent</option>
                                        <option>Most Recent</option>
                                    </select>
                                    <select data-placeholder="20 Per Page" class="chosen">
                                        <option>30 Per Page</option>
                                        <option>40 Per Page</option>
                                        <option>50 Per Page</option>
                                        <option>60 Per Page</option>
                                    </select>
                                </div>
                                <h5>98 Jobs & Vacancies</h5> --}}
                            </div>
                        </div><!-- MOdern Job LIst -->
                        @foreach ($items as $item)
                            @php
                                $link = URL::jobURL($item['id']);
                                $title = HighLight::showFrontend($item['title'], $params['search'], 'title');
                            @endphp
                            <div class="job-list-modern">
                                <div class="job-listings-sec no-border">
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="{{ asset('frontend/images/resource/l1.png') }}" alt="" /> </div>
                                        <h3><a href="{{ $link }}" title="">{!! $title !!}</a></h3>
                                        <span>Massimo Artemisis</span>
                                        <div class="job-lctn"><i class="la la-map-marker"></i>{{ $item['city_name'] }}</div>
                                    </div>
                                    <div class="job-style-bx">
                                        <span class="job-is ft">{{ $item['work_type'] }}</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                    </div>
                                </div>                            
                            </div>
                            {{-- <div class="pagination">
                                <ul>
                                    <li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><span class="delimeter">...</span></li>
                                    <li><a href="#">14</a></li>
                                    <li class="next"><a href="#">Next <i class="la la-long-arrow-right"></i></a></li>
                                </ul>
                            </div><!-- Pagination --> --}}
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('jobhunt.elements.footer')
@endsection

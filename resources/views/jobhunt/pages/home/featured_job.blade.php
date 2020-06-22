@php
    use App\Helpers\URL as URL;
@endphp   
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Các công việc nổi bật</h2>
                        <span>Leading Employers already using job and talent.</span>
                    </div>
                    @foreach ($itemsHotJob as $job)
                    @php
                        $link = URL::jobURL($job['id']);
                    @endphp
                        
                        <div class="job-listings-sec">
                            <div class="job-listing">
                                <div class="job-title-sec">
                                    <div class="c-logo"><img src="{{ asset('frontend/images/resource/l1.png') }}" alt="" /></div>
                                    <h3><a href="{{$link}}" title="">{{$job['title']}}</a></h3>
                                    <span>Massimo Artemisis</span>
                                </div>
                                <span class="job-lctn"><i class="la la-map-marker"></i>{{$job['city_name']}}</span>
                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                <span class="job-is ft">{{$job['work_type']}}</span>
                            </div>                        
                        </div>
                    @endforeach
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
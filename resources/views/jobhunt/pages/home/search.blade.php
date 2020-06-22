@php
    use App\Helpers\URL as URL;
@endphp
<section>
    <div class="block no-padding">
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-featured-sec">
                        <div class="new-slide">
                            <img src="{{ asset('frontend/images/resource/vector-1.png') }}" />
                        </div>
                        
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h3>Web giới thiệu việc làm Trường Đại học Đà Lạt</h3>
                                @if ($showSearchArea == true)
                                <form>
                                    <div class="row">
                                        <div class="col-lg-11 col-md-5 col-sm-12 col-xs-12">
                                            <div class="job-field">
                                                <input type="text" name="search_value" placeholder="Tên công việc, công ty" />
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                        <button id="btn-search-home" type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
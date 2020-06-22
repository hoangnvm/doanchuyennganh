<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Danh mục việc làm phổ biến</h2>
                    </div>
                    <div class="cat-sec">
                        <div class="row no-gape">
                            @foreach ($items as $item)
                            @php
                                $linkJobInCareer = route('home/list-job-in-career', ['career_name' => Str::Slug($item['name']), 'career_id' => $item['id']]);
                            @endphp
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="p-category">
                                    <a href="{{$linkJobInCareer}}" title="">
                                        <i class="la la-graduation-cap"></i>
                                        <span>{{ $item['name'] }}</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach       
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
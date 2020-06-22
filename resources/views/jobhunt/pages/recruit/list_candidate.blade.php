@php
    use App\Helpers\Template as Template;
    
@endphp
@extends('jobhunt.main') @section('content') @include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Quản lý ứng viên</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block no-padding">
        <div class="container">
            <div class="row no-gape">
                @include('jobhunt.partials.recruit_menu_left')
                <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="emply-resume-sec">
                            <h3>Resume</h3>
                            @foreach ($items as $item)
                            @php
                                $status = Template::showItemStatusApplied($controllerName, $item['id'], $item['status']);
                                $linkViewProfileCandidate = route('candidate/candidate-single', ['id' => $item['candidate_id']]);
                                $linkSendEmail = route('recruit/form-send-email');
                                $linkDeleteCandidate = route('recruit/delete-candidate', ['id' => $item['id']]);
                                
                            @endphp
                            <div class="emply-resume-list">
                                <div class="emply-resume-thumb">
                                    <img src="images/resource/er1.jpg" alt="" />
                                </div>
                                <div class="emply-resume-info">
                                    <h3><a href="{{$linkViewProfileCandidate}}" title="">{{$item['name'] }}</a></h3>
                                    <span>{{$item['position'] }}</span>
                                </div>
                                <div class="emply-resume-info">
                                    {!! $status !!}
                                </div>
                                
                                    <form method="POST">
                                        <h3><a class="la la-send" href="{{  $linkSendEmail }}" title=""></a></h3>
                                        <h3><a class="la la-trash" href="{{ $linkDeleteCandidate }}" title=""></a></h3>
                                    </form>
                                    
                                
                                {{-- <div class="emply-resume-info">
                                    
                                </div> --}}
                                
                            </div> 
                            @endforeach
                            
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
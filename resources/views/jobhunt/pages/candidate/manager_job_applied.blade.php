@php
    use App\Helpers\URL as URL;
@endphp
@extends('jobhunt.main') 
@section('content') 
@include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Danh sách công việc đã lưu</h3>
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
                @include('jobhunt.partials.candidate_menu_left')
                <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <h3>Manage Jobs</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Tên Công việc</td>
                                        <td>Vị trí</td>
                                        <td>Ngày đăng tuyển</td>
                                        <td>Ngày hết hạn</td>
                                        <td>Trạng thái</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    @php
                                        $status = ($item['status'] == 1) ? 'Đã ứng tuyển' : 'Đang xét duyệt'; 
                                        $link =  URL::jobURL($item['job_id']);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="{{ $link }}" title="">{{$item['title'] }}</a></h3>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">{{$item['position'] }}</span>
                                        </td>
                                        <td>
                                            <span>{{$item['post_date'] }}</span><br />
                                        </td>
                                        <td>
                                            <span>{{$item['expiration_date'] }}</span><br />
                                        </td>
                                        <td>
                                            <span class="status active">{{ $status }}</span>
                                        </td>                                        
                                    </tr>
                                    @endforeach                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
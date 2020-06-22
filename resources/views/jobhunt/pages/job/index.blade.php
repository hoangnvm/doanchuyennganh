@extends('jobhunt.main') 
@section('content') 
@include('jobhunt.elements.header', ['class' => 'stick-top'])
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Quản lý công việc</h3>
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
                        <div class="manage-jobs-sec">
                            <h3>Danh sách công việc</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Tên công việc</td>
                                        <td>Hình thức tuyển</td>
                                        <td>Ngày tạo & Ngày hết hạn</td>
                                        <td>Trạng thái</td>
                                        <td>Hànhh động</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    @php
                                        @$linkEdit = route('job/form-add-job', ['id' => $item['id']]);
                                        @$linkDelete = route('job/delete-job', ['id' => $item['id']]);
                                        if($item['status'] != null){
                                            $status = ($item['status'] == 1) ? 'Kích hoạt' : 'Đã hết hạn'; 
                                           
                                        }else{
                                            $status = 'Chờ duyệt';
                                        }
                                        $linkView = 'single-job/' . $item['id'];
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                <h3><a href="#" title="">{{$item['title'] }}</a></h3>
                                                <span><i class="la la-map-marker"></i>{{$item['city_name'] }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="applied-field">{{$item['work_type'] }}</span>
                                        </td>
                                        <td>
                                            <span>{{$item['post_date'] }}</span><br />
                                            <span>{{$item['expiration_date'] }}</span>
                                        </td>
                                        <td>
                                            <span class="status active">{{ $status }}</span>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>View Job</span><a href="{{ $linkView }}" title=""><i class="la la-eye"></i></a></li>
                                                <li><span>Edit</span><a href="{{$linkEdit}}" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="{{$linkDelete}}" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
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
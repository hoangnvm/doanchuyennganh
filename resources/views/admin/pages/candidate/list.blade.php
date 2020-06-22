@php
    use App\Helpers\Template as Template;
    use App\Helpers\HighLight as HighLight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên đăng nhập</th>
                    <th class="column-title">Tên đầy đủ</th>
                    <th class="column-title">Ngày đăng ký</th>
                    <th class="column-title">Vị trí tìm việc</th>  
                    <th class="column-title">Tỉnh/Thành phố</th>                  
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $i = $key + 1;
                            $id = $val['id'];
                            $class = ($key % 2 == 0) ? 'even' : 'odd';
                            $username = HighLight::show($val['username'], $params['search'], 'username');
                            $fullname = HighLight::show($val['fullname'], $params['search'], 'fullname');                         
                            $registerHistory = Template::showItemHistory($val['register_date']);
                            $position = HighLight::show($val['position'], $params['search'], 'position');         
                            $city = HighLight::show($val['city_id'], $params['search'], 'city');                     
                            $status = Template::showItemStatus($controllerName, $id, $val['status']);
                            $listButtonAction = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td> {{ $i }} </td>
                            <td> {!! $username !!} </td>
                            <td> {!! $fullname !!} </td>
                            <td> {!! $registerHistory !!} </td>
                            <td> {!! $position !!} </td> 
                            <td> {!! $city !!} </td>                             
                            <td> {!! $status !!} </td>
                            <td class="last"> {!! $listButtonAction !!}</td>
                        </tr>
                    @endforeach
                    
                @else
                    @include('admin.templates.list_empty', ['colspan' => 8])
                @endif             
            </tbody>
        </table>
    </div>
</div>
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
                    <th class="column-title">Tiêu đề din</th>
                    <th class="column-title">Ngày đăng tin</th>
                    <th class="column-title">Ngày hết hạn</th>
                    <th class="column-title">Người đăng</th>                    
                    <th class="column-title">Loại công việc</th>
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
                            $title = HighLight::show($val['title'], $params['search'], 'title');
                            $postDate = Template::showItemHistory($val['post_date']);
                            $expirationDate = Template::showItemHistory($val['expiration_date']);
                            $userPost = HighLight::show($val['recruit_id'], $params['search'], 'recruit_id'); 
                            $type = Template::showItemSelect($controllerName, $id, $val['type'], 'type');                          
                            $status = Template::showItemStatus($controllerName, $id, $val['status']);
                            $listButtonAction = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td> {{ $i }} </td>
                            <td> {!! $title !!} </td>
                            <td> {!! $postDate !!} </td>
                            <td> {!! $expirationDate !!} </td>
                            <td> {!! $userPost !!} </td> 
                            <td> {!! $type !!} </td>                            
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
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
                    <th class="column-title">Username</th>
                    <th class="column-title">Password</th>
                    <th class="column-title">Email</th>
                    <th class="column-title">Fullname</th>
                    <th class="column-title">Loại tài khoản</th>                    
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Tạo mới</th>
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
                            $email = HighLight::show($val['email'], $params['search'], 'email');
                            $password = HighLight::show($val['password'], $params['search'], 'password');
                            $fullname   = HighLight::show($val['fullname'], $params['search'], 'fullname');
                            $role      = Template::showItemSelect($controllerName, $id, $val['role'], 'change-role');
                            $createdHistory = Template::showItemHistory($val['created_by'], $val['created']);
                            $status = Template::showItemStatus($controllerName, $id, $val['status']);
                            $listButtonAction = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td>{{ $i }}</td>
                            <td width="10%">{!! $username !!} </td>
                            <td width="10%">{!! $password !!} </td>
                            <td width="10%">{!! $email !!} </td>
                            <td width="10%">{!! $fullname !!} </td>
                            <td>{!! $role !!} </td>
                            <td>{!! $status !!} </td>
                            <td> {!! $createdHistory !!} </td>
                            <td class="last"> {!! $listButtonAction !!}</td>
                        </tr>
                    @endforeach
                    
                @else
                    @include('admin.templates.list_empty', ['colspan' => 9])
                @endif

            </tbody>
        </table>
    </div>
</div>
<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>@lang('models/categories.fields.enabled')</th>
        <th>@lang('models/categories.fields.name')</th>
        <th>@lang('models/categories.fields.pos_x')</th>
        <th>@lang('models/categories.fields.pos_y')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
            <td>
                {!! Form::checkbox('enabled', 1, $category->enabled,  ['number'=>$category->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-onstyle'=>'success', 'data-offstyle'=>'danger']) !!}
            </td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->pos_x }}</td>
            <td>{{ $category->pos_y }}</td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categories.show', [$category->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

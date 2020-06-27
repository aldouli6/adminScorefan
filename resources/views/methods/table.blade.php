<div class="table-responsive">
    <table class="table" id="methods-table">
        <thead>
            <tr>
                <th>@lang('models/methods.fields.enabled')</th>
        <th>@lang('models/methods.fields.name')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($methods as $method)
            <tr>
            <td>
                {!! Form::checkbox('enabled', 1, $method->enabled,  ['number'=>$method->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-onstyle'=>'success', 'data-offstyle'=>'danger']) !!}
            </td>
            <td>{{ $method->name }}</td>
                <td>
                    {!! Form::open(['route' => ['methods.destroy', $method->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('methods.show', [$method->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('methods.edit', [$method->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

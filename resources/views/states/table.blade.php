<div class="table-responsive">
    <table class="table" id="states-table">
        <thead>
            <tr>
        <th>@lang('models/states.fields.enabled')</th>
                <th>@lang('models/states.fields.name')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($states as $state)
            <tr>
                <td>
                    {!! Form::checkbox('enabled', 1, $state->enabled,  ['number'=>$state->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-onstyle'=>'success', 'data-offstyle'=>'danger']) !!}
                 </td>
                <td>{{ $state->name }}</td>
                <td>
                    {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('states.show', [$state->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('states.edit', [$state->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

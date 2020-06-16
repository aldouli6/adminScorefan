<div class="table-responsive">
    <table class="table" id="accessories-table">
        <thead>
            <tr>
                <th>@lang('models/accessories.fields.enabled')</th>
        <th>@lang('models/accessories.fields.user_id')</th>
        <th>@lang('models/accessories.fields.product_id')</th>
        <th>@lang('models/accessories.fields.selected')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accessories as $accessory)
            <tr>
                <td>{{ $accessory->enabled }}</td>
            <td>{{ $accessory->user_id }}</td>
            <td>{{ $accessory->product_id }}</td>
            <td>{{ $accessory->selected }}</td>
                <td>
                    {!! Form::open(['route' => ['accessories.destroy', $accessory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accessories.show', [$accessory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('accessories.edit', [$accessory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

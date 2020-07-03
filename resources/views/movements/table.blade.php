<div class="table-responsive">
    <table class="table" id="movements-table">
        <thead>
            <tr>
                <th>@lang('models/movements.fields.description')</th>
        <th>@lang('models/movements.fields.product_id')</th>
        <th>@lang('models/movements.fields.user_id')</th>
        <th>@lang('models/movements.fields.movement')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($movements as $movement)
            <tr>
                <td>{{ $movement->description }}</td>
            <td>{{ $productItems[$movement->product_id ] ?? 'Disabled'}}</td>
            <td>{{ $userItems[$movement->user_id] ?? 'Disabled' }}</td>
            <td>{{ $movement->movement }}</td>
                <td>
                    {!! Form::open(['route' => ['movements.destroy', $movement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('movements.show', [$movement->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('movements.edit', [$movement->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

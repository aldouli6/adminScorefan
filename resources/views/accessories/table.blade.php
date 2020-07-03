<div class="table-responsive">
    <table class="table" id="accessories-table">
        <thead>
            <tr>
                <th>@lang('models/accessories.fields.enabled')</th>
        <th>@lang('models/accessories.fields.user_id')</th>
        <th>@lang('models/accessories.fields.product_id')</th>
        <th>@lang('models/accessories.fields.selected')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accessories as $accessory)
            <tr>
            <td>
                {!! Form::checkbox('enabled', 1, $accessory->enabled,  ['number'=>$accessory->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-onstyle'=>'success', 'data-offstyle'=>'danger']) !!}
            </td>
            <td>{{ $userItems[$accessory->user_id ]  ?? 'Disabled'}}</td>
            <td>{{ $productItems[$accessory->product_id ]  ?? 'Disabled'}}</td>
            <td>@if ($accessory->selected==1) @lang('crud.yes') @else @lang('crud.no') @endif</td>
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

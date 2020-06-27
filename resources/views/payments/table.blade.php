<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
            <tr>
                <th>@lang('models/payments.fields.description')</th>
        <th>@lang('models/payments.fields.method_id')</th>
        <th>@lang('models/payments.fields.state_id')</th>
        <th>@lang('models/payments.fields.user_id')</th>
        <th>@lang('models/payments.fields.product_id')</th>
        <th>@lang('models/payments.fields.total')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->description }}</td>
            <td>{{ $payment->method_id }}</td>
            <td>{{ $payment->state_id }}</td>
            <td>{{ $payment->user_id }}</td>
            <td>{{ $payment->product_id }}</td>
            <td>{{ $payment->total }}</td>
                <td>
                    {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('payments.show', [$payment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('payments.edit', [$payment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="predictions-table">
        <thead>
            <tr>
                <th>@lang('models/predictions.fields.state_id')</th>
        <th>@lang('models/predictions.fields.user_id')</th>
        <th>@lang('models/predictions.fields.match_id')</th>
        <th>@lang('models/predictions.fields.prediction_local')</th>
        <th>@lang('models/predictions.fields.prediction_visitor')</th>
        <th>@lang('models/predictions.fields.points')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($predictions as $prediction)
            <tr>
                <td>{{ $prediction->state_id }}</td>
            <td>{{ $prediction->user_id }}</td>
            <td>{{ $prediction->match_id }}</td>
            <td>{{ $prediction->prediction_local }}</td>
            <td>{{ $prediction->prediction_visitor }}</td>
            <td>{{ $prediction->points }}</td>
                <td>
                    {!! Form::open(['route' => ['predictions.destroy', $prediction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('predictions.show', [$prediction->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('predictions.edit', [$prediction->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

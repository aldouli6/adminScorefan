<div class="table-responsive">
    <table class="table" id="results-table">
        <thead>
            <tr>
                <th>@lang('models/results.fields.match_id')</th>
        <th>@lang('models/results.fields.result_local')</th>
        <th>@lang('models/results.fields.result_visitor')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->match_id }}</td>
            <td>{{ $result->result_local }}</td>
            <td>{{ $result->result_visitor }}</td>
                <td>
                    {!! Form::open(['route' => ['results.destroy', $result->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('results.show', [$result->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('results.edit', [$result->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

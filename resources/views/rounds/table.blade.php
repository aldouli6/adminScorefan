<div class="table-responsive">
    <table class="table" id="rounds-table">
        <thead>
            <tr>
                <th>@lang('models/rounds.fields.enabled')</th>
        <th>@lang('models/rounds.fields.name')</th>
        <th>@lang('models/rounds.fields.date_time_limit')</th>
        <th>@lang('models/rounds.fields.league_id')</th>
        <th>@lang('models/rounds.fields.tournament_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rounds as $round)
            <tr>
                <td>{{ $round->enabled }}</td>
            <td>{{ $round->name }}</td>
            <td>{{ $round->date_time_limit }}</td>
            <td>{{ $round->league_id }}</td>
            <td>{{ $round->tournament_id }}</td>
                <td>
                    {!! Form::open(['route' => ['rounds.destroy', $round->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rounds.show', [$round->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('rounds.edit', [$round->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

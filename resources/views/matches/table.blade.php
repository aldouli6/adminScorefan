<div class="table-responsive">
    <table class="table" id="matches-table">
        <thead>
            <tr>
                <th>@lang('models/matches.fields.state_id')</th>
        <th>@lang('models/matches.fields.team_local_id')</th>
        <th>@lang('models/matches.fields.team_visitor_id')</th>
        <th>@lang('models/matches.fields.round_id')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matches as $match)
            <tr>
                <td>{{ $match->state_id }}</td>
            <td>{{ $match->team_local_id }}</td>
            <td>{{ $match->team_visitor_id }}</td>
            <td>{{ $match->round_id }}</td>
                <td>
                    {!! Form::open(['route' => ['matches.destroy', $match->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matches.show', [$match->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('matches.edit', [$match->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

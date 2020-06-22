<div class="table-responsive">
    <table class="table" id="teams-table">
        <thead>
            <tr>
                <th>@lang('models/teams.fields.enabled')</th>
        <th>@lang('models/teams.fields.logo_url')</th>
        <th>@lang('models/teams.fields.name')</th>
        <th>@lang('models/teams.fields.league_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->enabled }}</td>
            <td><img style="max-height:200px;" src="{{'/storage/'.$team->logo_url}}"></td>
            <td>{{ $team->name }}</td>
            <td>{{ $team->league_id }}</td>
                <td>
                    {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('teams.show', [$team->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('teams.edit', [$team->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

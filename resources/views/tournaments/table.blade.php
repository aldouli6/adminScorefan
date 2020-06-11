<div class="table-responsive">
    <table class="table" id="tournaments-table">
        <thead>
            <tr>
                <th>@lang('models/tournaments.fields.enabled')</th>
        <th>@lang('models/tournaments.fields.name')</th>
        <th>@lang('models/tournaments.fields.league_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tournaments as $tournament)
            <tr>
                <td>{{ $tournament->enabled }}</td>
            <td>{{ $tournament->name }}</td>
            <td>{{ $tournament->league_id }}</td>
                <td>
                    {!! Form::open(['route' => ['tournaments.destroy', $tournament->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tournaments.show', [$tournament->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tournaments.edit', [$tournament->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table" id="tournaments-table">
        <thead>
            <tr>
                <th>@lang('models/tournaments.fields.enabled')</th>
        <th>@lang('models/tournaments.fields.name')</th>
        <th>@lang('models/tournaments.fields.league_id')</th>
                <th  >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tournaments as $tournament)
            <tr>
            <td>
                {!! Form::checkbox('enabled', 1, $tournament->enabled,  ['number'=>$tournament->id,'data-toggle' => 'toggle','data-on'=>__('crud.yes'),'data-off'=>__('crud.no'), 'data-size'=>'mini','data-onstyle'=>'success', 'data-offstyle'=>'danger']) !!}
            </td>
            <td> {{ $tournament->name }} </td>
            <td>{{ $leagueItems[$tournament->league_id] ?? 'Disabled' }}</td>
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

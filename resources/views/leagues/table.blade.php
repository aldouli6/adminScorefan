<div class="table-responsive">
    <table class="table" id="leagues-table">
        <thead>
            <tr>
                <th>@lang('models/leagues.fields.enabled')</th>
        <th>@lang('models/leagues.fields.name')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leagues as $league)
            <tr>
                <td>{{ $league->enabled }}</td>
            <td>{{ $league->name }}</td>
                <td>
                    {!! Form::open(['route' => ['leagues.destroy', $league->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('leagues.show', [$league->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('leagues.edit', [$league->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

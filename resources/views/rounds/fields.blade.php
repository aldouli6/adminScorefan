<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/rounds.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/rounds.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Time Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_time_limit', __('models/rounds.fields.date_time_limit').':') !!}
    {!! Form::text('date_time_limit', null, ['class' => 'form-control','id'=>'date_time_limit']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_time_limit').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- League Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('league_id', 'League Id:') !!}
    {!! Form::select('league_id', $leagueItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Tournament Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tournament_id', 'Tournament Id:') !!}
    {!! Form::select('tournament_id', $tournamentItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('rounds.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

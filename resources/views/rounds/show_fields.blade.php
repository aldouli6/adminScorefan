<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/rounds.fields.enabled').':') !!}
    <p>@if ($round->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/rounds.fields.name').':') !!}
    <p>{{ $round->name }}</p>
</div>

<!-- Date Time Limit Field -->
<div class="form-group">
    {!! Form::label('date_time_limit', __('models/rounds.fields.date_time_limit').':') !!}
    <p>{{ $round->date_time_limit }}</p>
</div>

<!-- League Id Field -->
<div class="form-group">
    {!! Form::label('league_id', __('models/rounds.fields.league_id').':') !!}
    <p>{{ $leagueItems[$round->league_id] ?? 'Disabled' }}</p>
</div>

<!-- Tournament Id Field -->
<div class="form-group">
    {!! Form::label('tournament_id', __('models/rounds.fields.tournament_id').':') !!}
    <p>{{  $tournamentItems[$round->tournament_id] ?? 'Disabled' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/rounds.fields.created_at').':') !!}
    <p>{{ $round->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/rounds.fields.updated_at').':') !!}
    <p>{{ $round->updated_at }}</p>
</div>


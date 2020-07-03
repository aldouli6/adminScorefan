<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/tournaments.fields.enabled').':') !!}
    <p>@if ($tournament->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/tournaments.fields.name').':') !!}
    <p>{{ $tournament->name }}</p>
</div>

<!-- League Id Field -->
<div class="form-group">
    {!! Form::label('league_id', __('models/tournaments.fields.league_id').':') !!}
    <p>{{ $leagueItems[$tournament->league_id] ?? 'Disabled' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/tournaments.fields.created_at').':') !!}
    <p>{{ $tournament->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/tournaments.fields.updated_at').':') !!}
    <p>{{ $tournament->updated_at }}</p>
</div>


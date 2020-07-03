<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/teams.fields.enabled').':') !!}
    <p>@if ($team->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif </p>
</div>

<!-- Logo Url Field -->
<div class="form-group">
    {!! Form::label('logo_url', __('models/teams.fields.logo_url').':') !!}
    <p><img style="max-height:200px;" src="{{'/storage/'.$team->logo_url}}"></p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/teams.fields.name').':') !!}
    <p>{{ $team->name }}</p>
</div>

<!-- League Id Field -->
<div class="form-group">
    {!! Form::label('league_id', __('models/teams.fields.league_id').':') !!}
    <p>{{ $leagueItems[$team->league_id] ?? 'Disabled' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/teams.fields.created_at').':') !!}
    <p>{{ $team->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/teams.fields.updated_at').':') !!}
    <p>{{ $team->updated_at }}</p>
</div>


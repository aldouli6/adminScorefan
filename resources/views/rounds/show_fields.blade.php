<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/rounds.fields.enabled').':') !!}
    <p>{{ $round->enabled }}</p>
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
    <p>{{ $round->league_id }}</p>
</div>

<!-- Tournament Id Field -->
<div class="form-group">
    {!! Form::label('tournament_id', __('models/rounds.fields.tournament_id').':') !!}
    <p>{{ $round->tournament_id }}</p>
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


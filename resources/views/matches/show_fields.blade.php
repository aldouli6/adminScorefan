<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', __('models/matches.fields.state_id').':') !!}
    <p>{{ $match->state_id }}</p>
</div>

<!-- Team Local Id Field -->
<div class="form-group">
    {!! Form::label('team_local_id', __('models/matches.fields.team_local_id').':') !!}
    <p>{{ $match->team_local_id }}</p>
</div>

<!-- Team Visitor Id Field -->
<div class="form-group">
    {!! Form::label('team_visitor_id', __('models/matches.fields.team_visitor_id').':') !!}
    <p>{{ $match->team_visitor_id }}</p>
</div>

<!-- Round Id Field -->
<div class="form-group">
    {!! Form::label('round_id', __('models/matches.fields.round_id').':') !!}
    <p>{{ $match->round_id }}</p>
</div>

<!-- Date Time Field -->
<div class="form-group">
    {!! Form::label('date_time', __('models/matches.fields.date_time').':') !!}
    <p>{{ $match->date_time }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/matches.fields.created_at').':') !!}
    <p>{{ $match->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/matches.fields.updated_at').':') !!}
    <p>{{ $match->updated_at }}</p>
</div>


<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/leagues.fields.enabled').':') !!}
    <p>{{ $league->enabled }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/leagues.fields.name').':') !!}
    <p>{{ $league->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/leagues.fields.created_at').':') !!}
    <p>{{ $league->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/leagues.fields.updated_at').':') !!}
    <p>{{ $league->updated_at }}</p>
</div>


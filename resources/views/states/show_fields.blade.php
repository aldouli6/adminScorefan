<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/states.fields.name').':') !!}
    <p>{{ $state->name }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/states.fields.enabled').':') !!}
    <p>{{ $state->enabled }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/states.fields.created_at').':') !!}
    <p>{{ $state->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/states.fields.updated_at').':') !!}
    <p>{{ $state->updated_at }}</p>
</div>


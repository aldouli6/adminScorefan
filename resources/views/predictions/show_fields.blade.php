<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', __('models/predictions.fields.state_id').':') !!}
    <p>{{ $stateItems[$prediction->state_id] ?? 'Disabled' }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/predictions.fields.user_id').':') !!}
    <p>{{ $userItems[$prediction->user_id] ?? 'Disabled' }}</p>
</div>

<!-- Match Id Field -->
<div class="form-group">
    {!! Form::label('match_id', __('models/predictions.fields.match_id').':') !!}
    <p>{{ $matchItems[$prediction->match_id] ?? 'Disabled' }}</p>
</div>

<!-- Prediction Local Field -->
<div class="form-group">
    {!! Form::label('prediction_local', __('models/predictions.fields.prediction_local').':') !!}
    <p>{{ $prediction->prediction_local }}</p>
</div>

<!-- Prediction Visitor Field -->
<div class="form-group">
    {!! Form::label('prediction_visitor', __('models/predictions.fields.prediction_visitor').':') !!}
    <p>{{ $prediction->prediction_visitor }}</p>
</div>

<!-- Points Field -->
<div class="form-group">
    {!! Form::label('points', __('models/predictions.fields.points').':') !!}
    <p>{{ $prediction->points }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/predictions.fields.created_at').':') !!}
    <p>{{ $prediction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/predictions.fields.updated_at').':') !!}
    <p>{{ $prediction->updated_at }}</p>
</div>


<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State Id:') !!}
    {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Match Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('match_id', 'Match Id:') !!}
    {!! Form::select('match_id', $matchItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Prediction Local Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prediction_local', __('models/predictions.fields.prediction_local').':') !!}
    {!! Form::number('prediction_local', null, ['class' => 'form-control']) !!}
</div>

<!-- Prediction Visitor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prediction_visitor', __('models/predictions.fields.prediction_visitor').':') !!}
    {!! Form::number('prediction_visitor', null, ['class' => 'form-control']) !!}
</div>

<!-- Points Field -->
<div class="form-group col-sm-6">
    {!! Form::label('points', __('models/predictions.fields.points').':') !!}
    {!! Form::number('points', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('predictions.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

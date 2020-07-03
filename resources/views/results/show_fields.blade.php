<!-- Match Id Field -->
<div class="form-group">
    {!! Form::label('match_id', __('models/results.fields.match_id').':') !!}
    <p>{{ $matchItems[$result->match_id] ?? 'Disabled' }}</p>
</div>

<!-- Result Local Field -->
<div class="form-group">
    {!! Form::label('result_local', __('models/results.fields.result_local').':') !!}
    <p>{{ $result->result_local }}</p>
</div>

<!-- Result Visitor Field -->
<div class="form-group">
    {!! Form::label('result_visitor', __('models/results.fields.result_visitor').':') !!}
    <p>{{ $result->result_visitor }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/results.fields.created_at').':') !!}
    <p>{{ $result->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/results.fields.updated_at').':') !!}
    <p>{{ $result->updated_at }}</p>
</div>


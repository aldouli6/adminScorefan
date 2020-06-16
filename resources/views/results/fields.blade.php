<!-- Match Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('match_id', 'Match Id:') !!}
    {!! Form::select('match_id', $matchItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Result Local Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result_local', __('models/results.fields.result_local').':') !!}
    {!! Form::number('result_local', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Visitor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result_visitor', __('models/results.fields.result_visitor').':') !!}
    {!! Form::number('result_visitor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('results.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

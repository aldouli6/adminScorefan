<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/states.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/states.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('states.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

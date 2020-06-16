<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/methods.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/methods.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Public Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('public_key', __('models/methods.fields.public_key').':') !!}
    {!! Form::text('public_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Private Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('private_key', __('models/methods.fields.private_key').':') !!}
    {!! Form::text('private_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('methods.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

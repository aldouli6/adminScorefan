<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/users.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email',  __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<!-- User Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_type',  __('models/users.fields.user_type').':') !!}
    {!! Form::select('user_type',['admin'=> __('models/users.fields.admin'),'user'=> __('models/users.fields.user')],null, ['class' => 'form-control']) !!}
</div>
<!-- Team Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id',  __('models/users.fields.team').':') !!}
    {!! Form::select('team_id', $teamItems, null, ['class' => 'form-control']) !!}
</div>
<!-- balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balance',  __('models/users.fields.balance').':') !!}
    {!! Form::number('balance', null, ['class' => 'form-control']) !!}
</div>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password',  __('models/users.fields.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password',  __('models/users.fields.password_confirmation').':') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('terms',  __('models/users.fields.terms').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('terms', 0) !!}
        {!! Form::checkbox('terms', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('privacy_notice',  __('models/users.fields.privacy_notice').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('privacy_notice', 0) !!}
        {!! Form::checkbox('privacy_notice', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

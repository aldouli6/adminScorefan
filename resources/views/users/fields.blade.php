<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/tournaments.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<!-- User Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_type', 'User Type') !!}
    {!! Form::select('user_type',['admin'=>'Administrador','user'=>'Usuario'],null, ['class' => 'form-control']) !!}
</div>
<!-- Team Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id', 'Team') !!}
    {!! Form::select('team_id', $teamItems, null, ['class' => 'form-control']) !!}
</div>
<!-- balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balance', 'Balance') !!}
    {!! Form::number('balance', null, ['class' => 'form-control']) !!}
</div>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('terms', __('Terms').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('terms', 0) !!}
        {!! Form::checkbox('terms', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('privacy_notice', __('Privacy Notice').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('privacy_notice', 0) !!}
        {!! Form::checkbox('privacy_notice', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>

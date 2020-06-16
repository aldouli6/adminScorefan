<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/methods.fields.enabled').':') !!}
    <p>{{ $method->enabled }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/methods.fields.name').':') !!}
    <p>{{ $method->name }}</p>
</div>

<!-- Public Key Field -->
<div class="form-group">
    {!! Form::label('public_key', __('models/methods.fields.public_key').':') !!}
    <p>{{ $method->public_key }}</p>
</div>

<!-- Private Key Field -->
<div class="form-group">
    {!! Form::label('private_key', __('models/methods.fields.private_key').':') !!}
    <p>{{ $method->private_key }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/methods.fields.created_at').':') !!}
    <p>{{ $method->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/methods.fields.updated_at').':') !!}
    <p>{{ $method->updated_at }}</p>
</div>


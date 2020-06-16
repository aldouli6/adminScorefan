<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/accessories.fields.enabled').':') !!}
    <p>{{ $accessory->enabled }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/accessories.fields.user_id').':') !!}
    <p>{{ $accessory->user_id }}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', __('models/accessories.fields.product_id').':') !!}
    <p>{{ $accessory->product_id }}</p>
</div>

<!-- Selected Field -->
<div class="form-group">
    {!! Form::label('selected', __('models/accessories.fields.selected').':') !!}
    <p>{{ $accessory->selected }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/accessories.fields.created_at').':') !!}
    <p>{{ $accessory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/accessories.fields.updated_at').':') !!}
    <p>{{ $accessory->updated_at }}</p>
</div>


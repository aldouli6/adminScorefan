<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/movements.fields.description').':') !!}
    <p>{{ $movement->description }}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', __('models/movements.fields.product_id').':') !!}
    <p>{{ $productItems[$movement->product_id ] ?? 'Disabled' }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/movements.fields.user_id').':') !!}
    <p>{{ $userItems[$movement->user_id] ?? 'Disabled' }}</p>
</div>

<!-- Movement Field -->
<div class="form-group">
    {!! Form::label('movement', __('models/movements.fields.movement').':') !!}
    <p>{{ $movement->movement }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/movements.fields.created_at').':') !!}
    <p>{{ $movement->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/movements.fields.updated_at').':') !!}
    <p>{{ $movement->updated_at }}</p>
</div>


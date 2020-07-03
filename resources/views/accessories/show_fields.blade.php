<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/accessories.fields.enabled').':') !!}
    <p>@if ($accessory->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/accessories.fields.user_id').':') !!}
    <p>{{ $userItems[$accessory->user_id ]  ?? 'Disabled'}}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', __('models/accessories.fields.product_id').':') !!}
    <p>{{ $productItems[$accessory->product_id ]  ?? 'Disabled'}}</p>
</div>

<!-- Selected Field -->
<div class="form-group">
    {!! Form::label('selected', __('models/accessories.fields.selected').':') !!}
    <p>@if ($accessory->selected==1) @lang('crud.yes') @else @lang('crud.no') @endif</p>
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


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/movements.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Movement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movement', __('models/movements.fields.movement').':') !!}
    {!! Form::number('movement', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('movements.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

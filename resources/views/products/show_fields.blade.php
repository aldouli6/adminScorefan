<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/products.fields.enabled').':') !!}
    <p>@if ($product->enabled==1) @lang('crud.yes') @else @lang('crud.no') @endif</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('models/products.fields.category_id').':') !!}
    <p>{{ $categoryItems[$product->category_id] ?? 'Disabled' }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Img Url Field -->
<div class="form-group">
    {!! Form::label('img_url', __('models/products.fields.img_url').':') !!}
    <p><img style="max-height:50px;" src="{{'/storage/'.$product->img_url}}"></p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    <p>{{ $product->price }}</p>
</div>
<!-- Price Field -->
<div class="form-group">
    {!! Form::label('score_saldo', __('models/products.fields.score_saldo').':') !!}
    <p>{{ $product->score_saldo }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/products.fields.created_at').':') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/products.fields.updated_at').':') !!}
    <p>{{ $product->updated_at }}</p>
</div>


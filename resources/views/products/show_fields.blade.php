<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/products.fields.enabled').':') !!}
    <p>{{ $product->enabled }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('models/products.fields.category_id').':') !!}
    <p>{{ $product->category_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Img Url Field -->
<div class="form-group">
    {!! Form::label('img_url', __('models/products.fields.img_url').':') !!}
    <p>{{ $product->img_url }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    <p>{{ $product->price }}</p>
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


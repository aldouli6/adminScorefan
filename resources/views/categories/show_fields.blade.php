<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/categories.fields.enabled').':') !!}
    <p>{{ $category->enabled }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    <p>{{ $category->name }}</p>
</div>

<!-- Img Url Field -->
<div class="form-group">
    {!! Form::label('img_url', __('models/categories.fields.img_url').':') !!}
    <p>{{ $category->img_url }}</p>
</div>

<!-- Affect Balance Field -->
<div class="form-group">
    {!! Form::label('affect_balance', __('models/categories.fields.affect_balance').':') !!}
    <p>{{ $category->affect_balance }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/categories.fields.created_at').':') !!}
    <p>{{ $category->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/categories.fields.updated_at').':') !!}
    <p>{{ $category->updated_at }}</p>
</div>


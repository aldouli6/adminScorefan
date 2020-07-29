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

<!-- Pos X Field -->
<div class="form-group">
    {!! Form::label('pos_x', __('models/categories.fields.pos_x').':') !!}
    <p>{{ $category->pos_x }}</p>
</div>

<!-- Pos Y Field -->
<div class="form-group">
    {!! Form::label('pos_y', __('models/categories.fields.pos_y').':') !!}
    <p>{{ $category->pos_y }}</p>
</div>

<!-- Height Field -->
<div class="form-group">
    {!! Form::label('height', __('models/categories.fields.height').':') !!}
    <p>{{ $category->height }}</p>
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


<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/categories.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_url', __('models/categories.fields.img_url').':') !!}
    {!! Form::file('img_url', ['accept'=>'image/svg']) !!}
    <br>
    @if ($category ?? '' != null)
        <img style="max-height:200px;" src="{{'/storage/'.$category->img_url}}">
    @else
        No image
    @endif
</div>
<div class="clearfix"></div>

<!-- 'bootstrap / Toggle Switch Affect Balance Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('affect_balance', __('models/categories.fields.affect_balance').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('affect_balance', 0) !!}
        {!! Form::checkbox('affect_balance', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Pos X Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pos_x', __('models/categories.fields.pos_x').':') !!}
    {!! Form::number('pos_x', null, ['class' => 'form-control']) !!}
</div>

<!-- Pos Y Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pos_y', __('models/categories.fields.pos_y').':') !!}
    {!! Form::number('pos_y', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

<!-- 'bootstrap / Toggle Switch Enabled Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('enabled', __('models/teams.fields.enabled').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enabled', 0) !!}
        {!! Form::checkbox('enabled', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Logo Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo_url', __('models/teams.fields.logo_url').':') !!}
    {!! Form::file('logo_url') !!}
</div>
<div class="clearfix"></div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/teams.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- League Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('league_id', 'League Id:') !!}
    {!! Form::select('league_id', $leagueItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teams.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

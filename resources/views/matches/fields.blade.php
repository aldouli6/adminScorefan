<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State Id:') !!}
    {!! Form::select('state_id', $stateItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Team Local Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_local_id', 'Team Local Id:') !!}
    {!! Form::select('team_local_id', $teamItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Team Visitor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_visitor_id', 'Team Visitor Id:') !!}
    {!! Form::select('team_visitor_id', $teamItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('round_id', 'Round Id:') !!}
    {!! Form::select('round_id', $roundItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Date Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_time', __('models/matches.fields.date_time').':') !!}
    {!! Form::text('date_time', null, ['class' => 'form-control','id'=>'date_time']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('matches.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

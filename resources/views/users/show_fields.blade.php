<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name',  __('models/users.fields.name').':') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email',  __('models/users.fields.email').':') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- team Id Field -->
<div class="form-group">
    {!! Form::label('team_id',  __('models/users.fields.team').':') !!}
    <p>{{ $leagueItems[$user->league_id] ?? 'Disabled' }}</p>
</div>

<div class="form-group">
    {!! Form::label('user_type',  __('models/users.fields.user_type').':') !!}
    <p>{{ $user->user_type }}</p>
</div>
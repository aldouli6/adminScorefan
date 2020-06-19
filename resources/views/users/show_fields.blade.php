<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- team Id Field -->
<div class="form-group">
    {!! Form::label('team_id', 'Equipo') !!}
    <p>{{ $user->team_id }}</p>
</div>

<div class="form-group">
    {!! Form::label('user_type', 'Type User') !!}
    <p>{{ $user->user_type }}</p>
</div>
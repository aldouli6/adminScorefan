<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('leagues*') ? 'active' : '' }}">
    <a href="{{ route('leagues.index') }}"><i class="fa fa-edit"></i><span>@lang('models/leagues.plural')</span></a>
</li>

<li class="{{ Request::is('tournaments*') ? 'active' : '' }}">
    <a href="{{ route('tournaments.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tournaments.plural')</span></a>
</li>




<li class="{{ Request::is('rounds*') ? 'active' : '' }}">
    <a href="{{ route('rounds.index') }}"><i class="fa fa-edit"></i><span>@lang('models/rounds.plural')</span></a>
</li>













<li class="{{ Request::is('states*') ? 'active' : '' }}">
    <a href="{{ route('states.index') }}"><i class="fa fa-edit"></i><span>@lang('models/states.plural')</span></a>
</li>

<li class="{{ Request::is('teams*') ? 'active' : '' }}">
    <a href="{{ route('teams.index') }}"><i class="fa fa-edit"></i><span>@lang('models/teams.plural')</span></a>
</li>

<li class="{{ Request::is('matches*') ? 'active' : '' }}">
    <a href="{{ route('matches.index') }}"><i class="fa fa-edit"></i><span>@lang('models/matches.plural')</span></a>
</li>


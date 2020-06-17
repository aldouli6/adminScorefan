<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
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


<li class="{{ Request::is('predictions*') ? 'active' : '' }}">
    <a href="{{ route('predictions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/predictions.plural')</span></a>
</li>

<li class="{{ Request::is('results*') ? 'active' : '' }}">
    <a href="{{ route('results.index') }}"><i class="fa fa-edit"></i><span>@lang('models/results.plural')</span></a>
</li>

<li class="{{ Request::is('methods*') ? 'active' : '' }}">
    <a href="{{ route('methods.index') }}"><i class="fa fa-edit"></i><span>@lang('models/methods.plural')</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>@lang('models/categories.plural')</span></a>
</li>


<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>@lang('models/products.plural')</span></a>
</li>



<li class="{{ Request::is('payments*') ? 'active' : '' }}">
    <a href="{{ route('payments.index') }}"><i class="fa fa-edit"></i><span>@lang('models/payments.plural')</span></a>
</li>




<li class="{{ Request::is('accessories*') ? 'active' : '' }}">
    <a href="{{ route('accessories.index') }}"><i class="fa fa-edit"></i><span>@lang('models/accessories.plural')</span></a>
</li>




<li class="{{ Request::is('movements*') ? 'active' : '' }}">
    <a href="{{ route('movements.index') }}"><i class="fa fa-edit"></i><span>@lang('models/movements.plural')</span></a>
</li>

<li class="{{ Request::is('rounds*') ? 'active' : '' }}">
    <a href="{{ route('rounds.index') }}"><i class="fa fa-edit"></i><span>@lang('models/rounds.plural')</span></a>
</li>

<li class="{{ Request::is('leagues*') ? 'active' : '' }}">
    <a href="{{ route('leagues.index') }}"><i class="fa fa-edit"></i><span>@lang('models/leagues.plural')</span></a>
</li>

<li class="{{ Request::is('tournaments*') ? 'active' : '' }}">
    <a href="{{ route('tournaments.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tournaments.plural')</span></a>
</li>


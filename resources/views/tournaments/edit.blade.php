@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tournaments.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tournament, ['route' => ['tournaments.update', $tournament->id], 'method' => 'patch']) !!}

                        @include('tournaments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

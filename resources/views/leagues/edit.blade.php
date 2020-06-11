@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/leagues.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($league, ['route' => ['leagues.update', $league->id], 'method' => 'patch']) !!}

                        @include('leagues.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

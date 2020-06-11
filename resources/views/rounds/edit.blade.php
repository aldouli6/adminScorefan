@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/rounds.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($round, ['route' => ['rounds.update', $round->id], 'method' => 'patch']) !!}

                        @include('rounds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

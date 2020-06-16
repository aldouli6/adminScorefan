@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/methods.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($method, ['route' => ['methods.update', $method->id], 'method' => 'patch']) !!}

                        @include('methods.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

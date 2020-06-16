@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/accessories.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accessory, ['route' => ['accessories.update', $accessory->id], 'method' => 'patch']) !!}

                        @include('accessories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

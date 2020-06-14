@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/matches.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'matches.store']) !!}

                        @include('matches.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

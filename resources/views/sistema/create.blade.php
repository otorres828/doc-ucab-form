@extends('adminlte::page')

@section('title', 'Crear Documento')

@section('content_header')
    <h1>Crear Documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'manual.sistema.store','autocomplete'=>'off','files'=>true]) !!}
                @include('partiels.documento')
                {!! Form::submit('Crear Documento', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-cssjs/>

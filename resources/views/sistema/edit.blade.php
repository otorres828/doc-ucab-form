@extends('adminlte::page')

@section('title', 'Editar Documento')

@section('content_header')
    <h1>Editar Documento</h1>
@stop

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-body">
            {!! Form::model($manual_sistema,['route'=>['manual.sistema.update',$manual_sistema],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('partiels.documento')
                {!! Form::submit('Actualizar Documento', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-cssjs/>

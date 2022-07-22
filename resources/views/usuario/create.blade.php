@extends('adminlte::page')

@section('title', 'Crear Documento')

@section('content_header')
    <h1>Crear Documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'manual.usuario.store', 'autocomplete' => 'off', 'files' => true]) !!}
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del Contenido') !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Ingrese el nombre del contenido',
                            'wire:model' => 'name',
                        ]) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug del Contenido') !!}
                        {!! Form::text('slug', null, [
                            'class' => 'form-control',
                            'placeholder' => 'SLUG',
                            'readonly',
                            'wire:model' => 'slug',
                        ]) !!}
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div >
                <div class="form-group">
                    {!! Form::label('category_id', 'Seleccione la Categoria') !!}
            
                    {!! Form::select('category_id', $categorias, null, ['class' => 'form-control select2','wire:model'=>'category']) !!}
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            @livewire('usuario-create', ['categorias' => $categorias])

            {!! Form::submit('Crear Documento', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-cssjsusuario />

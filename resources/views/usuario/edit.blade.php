@extends('adminlte::page')

@section('title', 'Editar Documento')

@section('content_header')
    <h1>Editar Documento</h1>
@stop

@section('content')
    <x-alert />
    <div class="card">
        <div class="card-body">
            {!! Form::model($manual_usuario, ['route' => ['manual.usuario.update', $manual_usuario],'autocomplete' => 'off','files' => true,'method' => 'put']) !!}
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
                <div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Seleccione la Categoria') !!}

                        {!! Form::select('category_id', $categorias, null, [
                            'class' => 'form-control select2',
                            'wire:model' => 'category',
                        ]) !!}
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @livewire('usuario-create', ['categorias' => $categorias, 'manual_usuario' => $manual_usuario->body, 'imageneseditar' => $manual_usuario->images])
                {!! Form::submit('Actualizar Documento', ['class' => 'btn btn-primary float-right']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@stop


<x-cssjsusuario />

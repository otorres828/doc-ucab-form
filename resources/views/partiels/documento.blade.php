<div class="row g-2">
    <div class="col-md">
        <div class="form-group">
            {!! Form::label('name', 'Nombre del Contenido') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del contenido']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="form-group">
            {!! Form::label('slug', 'Slug del Contenido') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'SLUG', 'readonly']) !!}
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

{{-- categoria --}}
<div class="">
    <div class="form-group">
        {!! Form::label('category_id', 'Seleccione la Categoria') !!}
        {!! Form::select('category_id', $categorias, null, ['class' => 'form-control select2']) !!}
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Contenido') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

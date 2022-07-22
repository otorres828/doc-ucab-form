
<div class="form-group" wire:ignore 
    x-data="{
        body:@entangle('body'),
    }"
    x-init="ClassicEditor
            .create( $refs.ckeditor,{
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
            }).then(editor => {
                editor.model.document.on('change:data', ()=>{
                    body =editor.getData();
                });
            })
            .catch( error => {
                console.error( error );
            } 
        );">
    <div x-ref="ckeditor" value="{{ $manual_usuario }}">{!! $manual_usuario !!}</div>
</div>

<input type="hidden" name="body" value="{{ $body }}">

@foreach ($images as $item)
    <input type="hidden" name="imagenes[]" value="{{ $item }}">
@endforeach

@if (isset($imageneseditar))
    @foreach ($imageneseditar as $item)
        <input type="hidden" name="imagenes[]" value="{{ $item->path }}">
    @endforeach
@endif
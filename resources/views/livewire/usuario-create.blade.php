<div>
    @include('partiels.usuario')
        
    @push('js')
        <script >
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
        <script src="{{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}}"></script>
        <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });
        </script>
        {{-- CKEDITOR. 5 --}}
        <script src="{{ asset('vendor\ckeditor5-build-classic\build/ckeditor.js') }}"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script> --}}
        <script>
            class MyUploadAdapter {
                constructor( loader ) {
                    this.loader = loader;
                }
                upload() {
                    return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                            this._initRequest();
                            this._initListeners( resolve, reject, file );
                            this._sendRequest( file );
                        } ) );
                }
                abort() {
                    if ( this.xhr ) {
                        this.xhr.abort();
                    }
                }
                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();
                    xhr.open( 'POST', "{{ route('images.upload') }}", true );
                    xhr.setRequestHeader('X-CSRF-TOKEN',"{{ csrf_token() }}")
                    xhr.responseType = 'json';
                }
                _initListeners( resolve, reject, file ) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                    xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                    xhr.addEventListener( 'abort', () => reject() );
                    xhr.addEventListener( 'load', () => {
                        const response = xhr.response;      
                        if ( !response || response.error ) {
                            return reject( response && response.error ? response.error.message : genericErrorText );
                        }
                        @this.addImage(response.path);
                        resolve( {
                            default: response.url
                        } );
                    } );

                    if ( xhr.upload ) {
                        xhr.upload.addEventListener( 'progress', evt => {
                            if ( evt.lengthComputable ) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        } );
                    }
                }
                _sendRequest( file ) {
                    const data = new FormData();
                    data.append( 'upload', file );
                    this.xhr.send( data );
                }
            }

            function MyCustomUploadAdapterPlugin( editor ) {
                editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                    return new MyUploadAdapter( loader );
                };
            }
            
        </script>
    @endpush
</div>

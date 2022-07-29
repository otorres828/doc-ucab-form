@section('css')
   <style>
       .image-wraper{
           position: relative;
           padding-bottom: 70%;
       }

       .image-wraper img{
           position: absolute;
           object-fit: cover;
           width: 100%;
           height: 100%;
       }
   </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop

@section('js')
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
    {{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css') }}">
    <script src="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script> --}}
    {{-- <script>
        function init(){
            if(document.querySelector('#body')){
                var config ={
                    extraPlugins:'codesnippet',
                    codeSnippet_theme:'monokay_sublime',
                    height:356
                }
                CKEDITOR.replace('body',config);
            }
        }
        window.onload = init;
        // ClassicEditor
        //     .create( document.querySelector('#body'),{
        //         extraPlugins: [  ],
        //     },)
        //     .catch( error => {
        //         console.error( error );
        //     } 
        // );

    </script> --}}
    <script src="{{ asset('vendor\ckeditor5-build-classic\build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ),{
                mediaEmbed: {
                                previewsInData:true
                            },
                            
            },)
            .catch( error => {
                console.error( error );
            } 
        );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop


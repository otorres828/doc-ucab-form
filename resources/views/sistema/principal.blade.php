@extends('layouts.base')
@section('title', 'Documentacion')
@section('main')
    <div class="bg-white font-sans leading-normal">
        {{-- CUERPO --}}
        <div class=" text-gray-700 py-10">
            <div class="grid md:grid-flow-col  px-7 sm:px-16 md:px-10 lg:px-28 ">
                <div class=" md:w-1/4">
                    <div class="max-w-md md:float-left md:text-left leading-loose tracking-tight md:sticky md:top-0">
                        <div style="height:30rem "
                            class="hidden lg:block overflow-auto relative w-full mx-auto bg-white dark:bg-slate-800 dark:highlight-white/5  ring-black/5 rounded-xl  flex-col ">
                            <a class="py-3  font-bold break-normal text-2xl md:text-4xl w-full"
                            href="{{ route('manual.usuario.principal') }}">M.Usuario</a>
                            @foreach ($categoriasUsuarios as $documento)
                                <a href="{{ route('usuario_show', $documento->slug) }}">
                                    <div
                                        class=" w-full hover:bg-cyan-500 hover:text-white rounded-lg ease-out duration-100">
                                        {{ $documento->name }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="md:ml-6 w-full md:w-3/4 ">
                    <blockquote>
                        <div class="mt-10 bg-white mb-10 max-w-2xl mx-auto px-4 py-8 shadow-lg dark:bg-dark-600 lg:flex lg:items-center">
                            <div class="w-20 h-20 mb-6 flex items-center justify-center shrink-0 lg:mb-0">
                                <img src="{{ asset('images/logo.png') }}" alt="Icon"
                                    class="opacity-75">
                            </div>

                            <p class="mb-0 lg:ml-4">
                                <strong>Advertencia</strong> Estás navegando por la documentación del <span
                                class="font-bold text-green-700"> Manual de Sistema</span> de ucab-form, te aconsejamos leer detalladamente para hacer un buen uso del mismo.
                            </p>
                        </div>
                    </blockquote>
                    <div class=" leading-loose tracking-tight">
                        <h1 class="py-3 font-bold break-normal text-3xl md:text-5xl">Manual de Sistema</h1>
                        <div class="prose md:prose-lg lg:prose-xl text-justify">
                            En este apartado encontraras todo lo referente al manual de sistema
                        </div> 
                        <ul>
                            @foreach ($categorias as $documento)
                                <li>
                                    <a href="{{ route('sistema_show', $documento->slug) }}">{{ $documento->name }}</a>
                                </li>
                            @endforeach
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

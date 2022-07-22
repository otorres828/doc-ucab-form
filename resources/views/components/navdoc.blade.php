<nav x-data="{ open: false }">
    <!-- BOTON MENU MOVIL-->
    <div x-on:click="open=true" class="absolute inset-y-0 left-0  item-center md:hidden">
        <button type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="md:hidden" x-show="open" x-on:click.away="open=false">
        <div class="fixed z-50 inset-0 overflow-y-auto lg:hidden">
            <div class="fixed inset-0 bg-black/20 backdrop-blur-sm dark:bg-slate-900/80"
                id="headlessui-dialog-overlay-12" aria-hidden="true"></div>
            <div class="relative bg-white w-80 max-w-[calc(100%-3rem)] p-6 dark:bg-slate-800"
                x-on:click="open=false">
                <button type="button"
                    class="absolute z-10 top-5 right-5 w-8 h-8 flex items-center justify-center text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
                    tabindex="0"><span class="sr-only">Close navigation</span><svg viewBox="0 0 10 10"
                        class="w-2.5 h-2.5 overflow-visible">
                        <path d="M0 0L10 10M10 0L0 10" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round"></path>
                    </svg></button>
                <nav class="lg:text-sm lg:leading-6 relative">
                    <div class="sticky top-0 -ml-0.5 pointer-events-none">
                        <div class="bg-white dark:bg-slate-900 relative pointer-events-auto"><button type="button"
                                class="hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"><svg
                                    width="24" height="24" fill="none" aria-hidden="true"
                                    class="mr-3 flex-none">
                                    <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <circle cx="11" cy="11" r="6" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                </svg>Quick search...<span class="ml-auto pl-3 flex-none text-xs font-semibold">Ctrl
                                    K</span></button></div>
                    </div>
                    <ul>
                        @if ($m == 1)
                            <a class="py-3  font-bold break-normal text-2xl md:text-4xl"
                                href="{{ route('manual.usuario.principal') }}">M.Usuario</a>
                            <hr>
                            <a class="py-3  font-bold break-normal text-2xl md:text-4xl"
                                href="{{ route('manual.sistema.principal') }}">M.Sistema</a>
                        @else
                            <a class="py-3  font-bold break-normal text-2xl md:text-4xl"
                                href="{{ route('manual.sistema.principal') }}">M.Sistema</a>
                            <hr>
                            <a class="py-3  font-bold break-normal text-2xl md:text-4xl"
                                href="{{ route('manual.usuario.principal') }}">M.Usuario</a>
                        @endif
                        @foreach ($categorias as $item)
                            <li class="mt-5">
                                <ul class=" border-l  dark:border-slate-700">
                                    <li><a class="block border-l pl-4 -ml-px border-transparent w-full hover:bg-cyan-500 hover:text-white rounded-lg ease-out duration-100"
                                            href="{{ route($direccionamiento, $item->slug) }}">{{ $item->name }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</nav>
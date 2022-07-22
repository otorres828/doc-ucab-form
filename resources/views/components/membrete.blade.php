<div class="hidden lg:block ">
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

</div>

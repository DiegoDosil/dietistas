@extends('plantillas.p_xeral')
@section('corpopaxina')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                    Proba para o proxecto
            </div>
            <div>
                <p>Aquí incluiremos o contido estático da páxina de inicio</p>
            </div>
            <div class="links">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#logindiv" aria-expanded="false" aria-controls="collapseExample">Iniciar sesión</button>
                @component('components.c_form_login')
                @endcomponent
                @if ( session('mensaxe') )
                    <script>alertify.error("{{ session('mensaxe') }}");</script>
                @endif
            </div>
        </div>
    @component('components.c_contacto')
    @endcomponent
@endsection
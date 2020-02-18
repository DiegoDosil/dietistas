@extends('plantillas.p_xeral')
@section('corpopaxina')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                    DietLar
            </div>
            <div>
                <h2>A aplicación para profesionais da dietética e nutrición.</h2>
                <p>A aplicación CRM que mellora a xestión e atención do cliente</p>
            </div>
            <div class="links">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#logindiv" aria-expanded="false" aria-controls="collapseExample">Iniciar sesión</button>
                @component('components.c_form_login')
                @endcomponent
                @if ( session('mensaxe') )
                    <script>alertify.error("{{ session('mensaxe') }}");</script>
                @endif
                @php
                if(!(session_status() !== PHP_SESSION_ACTIVE)) {
                    session_unset();
                    session_destroy();
                }
                @endphp
            </div>
        </div>
    @component('components.c_contacto')
        @slot('contactotel')
        34664063304
        @endslot
        @slot('contactowa')
        34664063304
        @endslot
        @slot('contactomail')
        treintadeltres@yahoo.es
        @endslot
    @endcomponent
@endsection
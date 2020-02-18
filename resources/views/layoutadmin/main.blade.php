<!DOCTYPE html>
<html amp lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  @include('layoutxeral.head')
  <title>Dietista a domicilio - Administrador</title>
</head>

<body id="page-top">
  <div id="wrapper">

    @include('layoutadmin.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
    @include('layoutxeral.navbar')

      <div id="content">

        <div class="container-fluid">

            @yield('content')

        </div>
      @include('layoutxeral.footer')
      </div>

    </div>

  </div>

    @include('layoutxeral.js')
    
</body>

</html>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <!--<i class="fas fa-laugh-wink"></i>-->
        </div>
        <div class="sidebar-brand-text mx-3">@php
        echo $_SESSION['nome'];
        @endphp</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menú
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseun" aria-expanded="true" aria-controls="collapseun">
          <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/dietista">Consultar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/crearcliente">Crear</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/activarcliente">Activar/desactivar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/eliminarcliente">Eliminar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedous" aria-expanded="true" aria-controls="collapsedous">
          <i class="fas fa-calendar-day"></i>
          <span>Citas</span>
        </a>
        <div id="collapsedous" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/crearcitas">Crear</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/completarcitas">Completar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/consultarcitas">Consultar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/cambiarestadocitas">Cambiar estado</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/eliminarcitas">Eliminar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetres" aria-expanded="true" aria-controls="collapsetres">
          <i class="fas fa-utensils"></i>
          <span>Dietas</span>
        </a>
        <div id="collapsetres" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/consultardietas">Consultar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/creardietas">Crear</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/asignardietas">Asignar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/">
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
          </a>
      </div>

    </ul>
    <!-- End of Sidebar -->
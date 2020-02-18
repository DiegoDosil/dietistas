    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">@php
        echo $_SESSION['nome'];
        @endphp</div>
      </a>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menú
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseun" aria-expanded="true" aria-controls="collapseun">
          <i class="fas fa-users"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/dietista">Consultar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/evolucion">Evolución</a>
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
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/eliminarcita">Eliminar</a>
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
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/cambiarestadodietas">Cambiar estado</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/engadiralimento">Engadir alimentos</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/dietista/asignardietas">Asignar</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecatro" aria-expanded="true" aria-controls="collapsecatro">
          <i class="fas fa-phone-volume"></i>
          <span>Administrador</span>
        </a>
        <div id="collapsecatro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="mailto:treintadeltres@yahoo.es" target="_blank">Enviar mail</a>
            <a class="collapse-item" href="tel:+34664063304" target="_blank">Chamar</a>
            <a class="collapse-item" href="https://wa.me/34664063304" target="_blank">WhatsApp</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/">
              <i class="fas fa-sign-out-alt"></i>
              <span class="elemento_unico">Logout</span>
          </a>
      </div>
    </ul>
    <!-- Fin de Sidebar -->
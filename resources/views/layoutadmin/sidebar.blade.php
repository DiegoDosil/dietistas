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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          </i><i class="fas fa-users"></i>
          <span>Dietistas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Custom Components:</h6>-->
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/admin/admin">Consultar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/admin/creardietista">Crear</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/admin/activardietista">Activar/desactivar</a>
            <a class="collapse-item" href="http://softuare.sytes.net/dietistas/public/admin/eliminardietista">Eliminar</a>
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
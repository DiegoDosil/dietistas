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
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/cliente/cliente">
              <i class="fas fa-calendar-day"></i>
              <span class="elemento_unico">Citas pendentes</span>
          </a>
      </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/cliente/evolucion">
              <i class="fas fa-chart-line"></i>
              <span class="elemento_unico">Consultar evolución</span>
          </a>
      </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/cliente/consultardietas">
              <i class="fas fa-utensils"></i>
              <span class="elemento_unico">Dietas</span>
          </a>
      </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecatro" aria-expanded="true" aria-controls="collapsecatro">
          <i class="fas fa-phone-volume"></i>
          <span>Dietista</span>
        </a>
        <div id="collapsecatro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="mailto:@php echo $_SESSION['dietista_email'] @endphp" target="_blank">Enviar mail</a>
            <a class="collapse-item" href="tel:+@php echo $_SESSION['dietista_telefono'] @endphp" target="_blank">Chamar</a>
            <a class="collapse-item" href="https://wa.me/@php echo $_SESSION['dietista_telefono'] @endphp" target="_blank">WhatsApp</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
      <div class="sidebar-brand-text mx-3">
          <a class="nav-link" href="http://softuare.sytes.net/dietistas/public/">
              <i class="fas fa-sign-out-alt"></i>
              <span class="elemento_unico">Logout</span>
          </a>
      </div>
      </li>
    </ul>
    <!-- Fin de Sidebar -->
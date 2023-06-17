
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WiseOwl Dream App</span>
    </a>
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <!-- Nav Dashboard -->
          <li class="nav-item">
            <a href="{{route('homeIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Nav User Dream -->
          <li class="nav-item">
            <a href="{{route('userDreamIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                User Dream
              </p>
            </a>
          </li>


          <!-- Nav Users -->
          <li class="nav-item">
            <a href="{{route('userRegisterIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Users
              </p>
            </a>
          </li>



          <!-- Nav User Role -->
          <li class="nav-item">
            <a href="{{route('userRoleIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User Role
              </p>
            </a>
          </li>


          <!-- Nav System Dream -->
          <li class="nav-item">
            <a href="{{route('systemDreamIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-cloud-sun"></i>
              <p>
                System Dream
              </p>
            </a>
          </li>


          <!-- Nav System Dream Meaning -->
          <li class="nav-item">
            <a href="{{route('userSysDreamIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                System Dream Meaning
              </p>
            </a>
          </li>


          <!-- Tags -->
          <li class="nav-item">
            <a href="{{route('tagsIndex')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Tags
              </p>
            </a>
          </li>


          <!-- System Configurations -->
          <li class="nav-item">
            <a href="404.html" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                System Configurations
              </p>
            </a>
          </li>

          <!--Logout-->
          <li class="nav-item">
            <a href="{{route('logOut')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt" style="color:red;"></i>
              <p style="color:red;">
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

</aside>
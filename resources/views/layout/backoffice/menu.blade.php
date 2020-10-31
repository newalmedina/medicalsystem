<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src='{{U::configInformation()["logo_photo"]  ? asset(U::configInformation()["logo_photo"])  : asset("dist/img/AdminLTELogo.png") }} ' alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <span class="brand-text font-weight-light">{{U::configInformation()["hospital_name"]  ? U::configInformation()["hospital_name"]  : "Medical System" }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src='{{ Avatar::create(Auth::user()->name.' '.Auth::user()->surnames)->toBase64() }}' class="img-circle elevation-2" alt="User Image">


        </div>
        <div class="info">
        <a href="#" class="d-block">{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->surnames)}}</a> <br>
          <a class="d-block" href="{{ route('logoutUser') }}"style="margin-top:-20px;"> <small class="text-danger">  <i class="fas fa-sign-out-alt"></i> @lang('base.Cerrar Session')</small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{!Route::is('dashboard') ?: 'menu-open'}}">
          <a href="{{route('dashboard')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                @lang('base.Dashboard')
              </p>
            </a>
          </li>

          <li class="nav-item  has-treeview {{!Route::is('speciality') ?: 'menu-open'}} {{!Route::is('worker') ?: 'menu-open'}}">
            <a href="" class="nav-link  ">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                @lang('base.Gestion de personal')
              </p>
            </a>
            <ul class="ml-2 nav nav-treeview" style="font-size: 12px;">
              <li class="nav-item">
                <a href="{{route('specialty')}}" class="nav-link {{!Route::is('speciality') ?: 'active'}}" >
                  <i class="fas fa-list nav-icon"></i>
                  <p>@lang('base.Especializaciones')</p>
                </a>
              </li>
              <li class="nav-item">
                <a  href="{{route('personal')}}" class="nav-link {{!Route::is('worker') ?: 'active'}}">
                  <i class="fas fa-user nav-icon"></i>
                  <p>@lang('base.Personal')</p>
                </a>
              </li>

            </ul>

          </li>
          <li class="nav-item  has-treeview {{!Route::is('configuration') ?: 'menu-open'}}">
            <a href="" class="nav-link  ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                 @lang('base.Configuracion')
              </p>
            </a>
            <ul class="ml-2 nav nav-treeview" style="font-size: 12px;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>@lang('base.Mi perfil')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('configuration')}}" class="nav-link {{!Route::is('configuration') ?: 'active'}}">
                  <i class="far fa-hospital nav-icon"></i>
                  <p>@lang('base.Centro medico')</p>
                </a>
              </li>

            </ul>

          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>
    <base href="{{\URL::to('/')}}">
    
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <x-app-layout>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">IMLN</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
              <li class="nav-item mt-2">
                <x-jet-nav-link href="#" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  {{ ('Tableau de bord')}}
                </x-jet-nav-link>
              </li>
            
              <li class="nav-item mt-2">
                <x-jet-nav-link href="#" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  {{('Ajouter une demande')}}
                </x-jet-nav-link>
              </li>
              <li class="nav-item mt-2">
                <x-jet-nav-link href="#" class="nav-link">
                   <i class="nav-icon fa fa-area-chart"></i>
                   {{('Statistiques')}}
                </x-jet-nav-link>
              </li>
              <li class="nav-item mt-2">
                <x-jet-nav-link href="#" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  {{('Paramèttre')}}
                </x-jet-nav-link>
              </li>
              @can('manage-users')
           
              <li class="nav-item mt-2">
                <x-jet-nav-link href="{{route ('admin.Gérerutilisateurs.index')}}" class="nav-link active" :active="request()->routeIs('admin.Gérerutilisateurs.index')">
                  <i class="nav-icon fas fa-users"></i>
                 {{('Gérer les utilisateurs')}}
                </x-jet-nav-link>
              </li>
              @endcan
              <li class="nav-item mt-2">
                <x-jet-nav-link href="#" class="nav-link">
                  <i class="nav-icon fas fa-wrench"></i>
                   {{('Gérer les outils')}}
                </x-jet-nav-link>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
       
      </div>
     <!--content-wrapper -->
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        
        <strong>Copyright &copy; 2020-2021 <a href="/">IMLN</a>.</strong> Tout droit réservé.
      </footer>
    </div>
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    </x-app-layout>
    </body>
    </html>
    
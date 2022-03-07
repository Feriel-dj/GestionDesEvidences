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
        <aside class="main-sidebar sidebar-dark-primary  elevation-4"  style="position: fixed">
            <!-- Brand Logo -->
            <a  href="#" class="brand-link">
              
             <span  class="brand-text font-weight-light"  > IMLN </span>
            </a>
        
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
             
        
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
                  <li class="nav-item mt-2">
                    <x-jet-nav-link  href="{{route ('admin.admindashboard.index')}}" class="nav-link" :active="request()->routeIs('admin.admindashboard.index')">
                      <i class="nav-icon fas fa-home"></i>
                      {{ ('Tableau de bord')}}
                    </x-jet-nav-link>
                  </li>
                  <li class="nav-item mt-2">
                    <x-jet-nav-link href="{{ route ('admin.Demande.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-plus"></i>
                      {{('Ajouter une demande')}}
                    </x-jet-nav-link>
                  </li>
                  @can('manage-users')
                  <li class="nav-item menu-open mt-2">
                    <x-jet-nav-link href="{{route ('admin.Gérerutilisateurs.index')}}" class="nav-link active" :active="request()->routeIs('admin.Gérerutilisateurs.index')">
                      <i class="nav-icon fas fa-users"></i>
                     {{('Gestion des utilisateurs')}}
                     <i class="right fas fa-angle-left"></i>
                    </x-jet-nav-link>
                    <ul class="nav nav-treeview">
                  <li class="nav-item  mt-2">
                    <x-jet-nav-link href="{{route ('admin.Gérerutilisateurs.index')}}" class="nav-link" :active="request()->routeIs('admin.Gérerutilisateurs.index')">
                      <i class="fa fa-caret-right"></i>
                     {{('Gérer les utilisateurs')}}
                    </x-jet-nav-link>
                  </li>
                      <li class="nav-item mt-2">
                        <x-jet-nav-link href="{{route ('admin.user-permissions')}}" class="nav-link active" :active="request()->routeIs('admin.user-permissions')">
                          <i class="fa fa-caret-right"></i>
                         {{('Gérer les autorisations')}}
                        </x-jet-nav-link>
                      </li>
                    </ul>
                  </li>
                  @endcan
                  <li class="nav-item mt-2">
                    <x-jet-nav-link href="{{route ('admin.outils.index')}}" class="nav-link" :active="request()->routeIs('admin.outils.index')" >
                      <i class="nav-icon fas fa-wrench"></i>
                       {{('Gérer les outils')}}
                    </x-jet-nav-link>
                  </li>
                  
                  <li class="nav-item mt-2">
                    <x-jet-nav-link href="#" class="nav-link">
                      <i class="nav-icon fas fa-cog"></i>
                      {{('Paramèttre')}}
                    </x-jet-nav-link>
                  </li>
                
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
<x-app-layout>
    <div class="content-wrapper">
        @yield('content')
    <x-slot name="header">
        <h2 class="font-semibold text-center text-gray-800 leading-tight">
            {{ __('Gérer les autorisations') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @livewire('user-permissions')
        </div>
    </div>
    </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      
      <footer class="main-footer">
        <strong>Copyright &copy; 2020-2021 <a href="/">IMLN</a>.</strong> Tout droit réservé.
      </footer>
    </div>
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>

</x-app-layout>
</body>
</html>

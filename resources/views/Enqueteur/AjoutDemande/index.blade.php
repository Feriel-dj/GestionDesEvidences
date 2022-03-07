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
  
      <!-- Main Sidebar Container -->
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
    
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <x-app-layout>
        <div class="content-wrapper" style="position: fixed">
            @yield('content')
        <x-slot name="header" >
            <h2 class="font-semibold text-center text-gray-800 leading-tight " >
                {{ __("Tableau de bord de l'enqueteur") }}
            </h2>
        </x-slot>
        <div>
         
        </div>
       
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
      
    
    </div>
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    </x-app-layout>
    </body>
    </html>
    
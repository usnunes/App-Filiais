<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Controle - Filiais</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  @yield('scripthead')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body id="page-top" style="margin-top: 0px;">
    <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">admin</div>
        </a>
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">
        @if(auth()->user())
            <li class="nav-item active">
                <a class="nav-link" href="{{route('filial.index')}}">
                <i class="fas fa-calendar fa-2x"></i>
                <span>FILIAIS</span></a>
            </li>
            <hr class="sidebar-divider">
        @else
            <li class="nav-item active">
                <a class="nav-link" href="{{route('login')}}">
                <i class="fas fa-calendar fa-2x"></i>
                <span>LOGIN</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('register')}}">
                <i class="fas fa-calendar fa-2x"></i>
                <span>REGISTRAR</span></a>
            </li>
            <hr class="sidebar-divider">
        @endif
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(auth()->user())
                    <span class="mr-2 d-none d-lg-inline text-gray-600 large">Olá {{auth()->user()->name}}!</span>
                    @endif
                </a>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" data-target="#logoutModal">
                        @if(auth()->user())
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-md btn-default">
                                <i type="submit" class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                Sair
                            </button>
                        </form>
                        @endif
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            @include('flash::message')

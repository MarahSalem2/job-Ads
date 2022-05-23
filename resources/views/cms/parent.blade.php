<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" ="width=device-width, initial-scale=1">
  <title> Jobs | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('cms/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('cms/plugins/toastr/toastr.min.css')}}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">job advertisement</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          @canany(['Create-Role','Read-Roles','Read-Permissions'])
          <li class="nav-header">{{__('cms.roles_permissions')}}</li>
          @canany(['Create-Role', 'Read-Roles'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.roles')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Roles')
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan
              @can('Create-Role')
              <li class="nav-item">
                <a href="{{route('roles.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany
          @canany(['Read-Permissions'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.permissions')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Permissions')
              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany
          @endcanany


          @canany(['Create-Admin','Read-Admins','Create-User','Read-Users','Create-Advertiser','Read-Advertisers',
          'Create-AdvertiserType','Read-AdvertiserTypes','Create-Advertising','Read-Advertisings','Create-Section',
          'Read-Sections','Create-Specialization','Read-Specializations','Create-Applicant','Read-Applicants'])
          
          <li class="nav-header">{{__('cms.hr')}}</li>
          @canany(['Read-Admins','Create-Admin'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.admins')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Admins')
              <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-Admin')
              <li class="nav-item">
                <a href="{{route('admins.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Users','Create-User'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.users')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Users')
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-User')
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Advertisers','Create-Advertiser'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.advertisers')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Advertisers')
              <li class="nav-item">
                <a href="{{route('advertisers.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-Advertiser')
              <li class="nav-item">
                <a href="{{route('advertisers.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-AdvertiserTypes','Create-AdvertiserType'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.advertiserTypes')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-AdvertiserTypes')
              <li class="nav-item">
                <a href="{{route('advertiserTypes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan
              @can('Create-AdvertiserType')
              <li class="nav-item">
                <a href="{{route('advertiserTypes.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Advertisings','Create-Advertising'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.advertisings')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Advertisings')
              <li class="nav-item">
                <a href="{{route('advertisings.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-Advertising')
              <li class="nav-item">
                <a href="{{route('advertisings.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Sections','Create-Section'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.sections')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Sections')
              <li class="nav-item">
                <a href="{{route('sections.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan
              @can('Create-Section')
              <li class="nav-item">
                <a href="{{route('sections.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Specializations','Create-Specialization'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.specializations')}}
                <i class="right fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Specializations')
              <li class="nav-item">
                <a href="{{route('specializations.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-Specialization')
              <li class="nav-item">
                <a href="{{route('specializations.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Read-Applicants','Create-Applicant'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.applicants')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Applicants')
              <li class="nav-item">
                <a href="{{route('applicants.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan

              @can('Create-Applicant')
              <li class="nav-item">
                <a href="{{route('applicants.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany
          @endcanany

          


          @canany(['Create-City','Read-Cities'])
          <li class="nav-header">{{__('cms.content_management')}}</li>
          @canany(['Create-City','Read-Cities'])
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                {{__('cms.cities')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('Read-Cities')
              <li class="nav-item">
                <a href="{{route('cities.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.index')}}</p>
                </a>
              </li>
              @endcan
              @can('Create-City')
              <li class="nav-item">
                <a href="{{route('cities.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('cms.create')}}</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany
          @endcanany
          
          <li class="nav-header">{{__('cms.settings')}}</li>

          <li class="nav-item">
            <a href="{{route('password.edit')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">{{__('cms.edit_password')}}</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('cms.logout')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">{{__('cms.logout')}}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page-lg')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('main-pg-md')</a></li>
              <li class="breadcrumb-item active">@yield('page-md')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('cms/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
@yield('scripts')
</body>
</html>

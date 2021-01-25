<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>NAYAKU | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body class="skin-red">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Beauty</b> NAYAKU</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="user-image" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img class="img-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <p>
                        {{ Auth::user()->name }}
                      {{-- <small>Member since Nov. 2012</small> --}}
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    {{-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> --}}
                    <div class="pull-right">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
          </div>
        </nav>
      </header>
    <div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
            </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            </li>
            <li>
              @if (Auth::user()->role=='admin')
              <a href="{{ route('treatments') }}">
                  <i class="fa fa-heart"></i>
                  <span>Treatments</span>
              </a>
              <a href="{{ route('complaints') }}">
                  <i class="fa  fa-times"></i> <span>Complaints</span>
              </a>
              <a href="{{ route('products') }}">
                  <i class="fa  fa-shopping-cart"></i> <span>Products</span>
              </a>
              <a href="{{ route('tips') }}">
                <i class="fa  fa-book"></i> <span>Tips</span>
              </a>
              <a href="{{ route('contacts') }}">
                <i class="fa fa-cog"></i> <span>Contacts</span>
              </a>
              <a href="{{ route('rules') }}">
                <i class="fa fa-clipboard"></i> <span>Rules</span>
              </a>                  
              <a href="{{ route('history') }}">
                  <i class="fa  fa-history"></i> <span>History</span>
              </a>
              @else
              <a href="{{ route('history') }}">
                  <i class="fa  fa-history"></i> <span>History</span>
              </a>
              @endif             
              
            </li>
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        {{ $slot }}
    </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
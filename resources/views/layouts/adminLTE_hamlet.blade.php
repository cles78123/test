<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ asset('/') }}" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>數據網</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">


          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <ul class="dropdown-menu">
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
          
            <li class="footer">
              <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>登出</a>
            </li>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">



      <!-- search form (Optional) -->
   
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">功能列表</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-star-o"></i> <span>會員管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ asset('/') }}"><i class="fa fa-circle-o"></i>會員總覽</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-align-justify"></i> <span>開放資料庫</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ asset('/hamlet') }}"><i class="fa fa-users"></i>人口統計</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <small>@yield('user')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <div class="form-group">
                  <div class="box-body">
                    <div class="col-sm-5">
                      <form class="form-horizontal" method="POST" action="{{ asset('hamlet/search') }}">
              {{ csrf_field() }}
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="inputEmail3">關鍵字</label>
                          <div class="input-group input-group hidden-xs" style="width: 500px;">
                            <input autofocus="" class="form-control pull-right" name="keyword" placeholder="請輸入數字" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text">
                            <div class="input-group-btn">
                              <select class="form-control" name="calculate">
                                <option value="=">=</option>
                                <option value=">">></option>
                                <option value="<"><</option>
                              </select>
                              <button class="btn btn-default" type="submit">搜尋</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="col-sm-2 control-label">類型</label>
                <input id="huey" name="type" type="radio" value="number_neighbors" checked>鄰數 
                <input id="huey" name="type" type="radio" value="number_households">戶數 
                <input id="huey" name="type" type="radio" value="boy">男數 
                <input id="huey" name="type" type="radio" value="girl">女數 
                <input id="huey" name="type" type="radio" value="population">總人口數 
                <input id="huey" name="type" type="radio" value="born_population">出生人數 
                <input id="huey" name="type" type="radio" value="death_population">死亡人數 
                <input id="huey" name="type" type="radio" value="marriages">結婚對數 
                <input id="huey" name="type" type="radio" value="divorce">離婚對數 
                <input id="huey" name="type" type="radio" value="move_in">遷入人數 
                <input id="huey" name="type" type="radio" value="move_out">遷出人數 
                
                <select class="form-control" name="location">
                            <option value="0">村別</option>
                            <option value="0">全部</option>
                            @foreach ($location as $key)
                            <option value="{{$key->location}}">{{$key->location}}</option>  
                            @endforeach
                          </select>
                </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th class="bg-green disabled color-palette">村別數</th>
                          <th class="bg-green disabled color-palette">時間</th>
                          <th class="bg-green disabled color-palette">鄰數</th>
                          <th class="bg-green disabled color-palette">戶數</th>
                          <th class="bg-green disabled color-palette">男數</th>
                          <th class="bg-green disabled color-palette">女數</th>
                          <th class="bg-green disabled color-palette">總人口數</th>
                          <th class="bg-green disabled color-palette">出生人數</th>
                          <th class="bg-green disabled color-palette">死亡人數</th>
                          <th class="bg-green disabled color-palette">結婚對數</th>
                          <th class="bg-green disabled color-palette">離婚對數</th>
                          <th class="bg-green disabled color-palette">遷入人數</th>
                          <th class="bg-green disabled color-palette">遷出人數</th>    
      @yield('main')

    </table>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
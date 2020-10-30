
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Software Release </title>

  <!-- Bootstrap -->
  <link href="{{ url('vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ url('vendor/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ url('vendor/iCheck/skins/flat/green.css')}}" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{ url('vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{ url('vendor/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{{ url('vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ url('build/css/custom.min.css')}}" rel="stylesheet">

  <!-- jQuery -->
  <script src="{{ url('vendor/jquery/dist/jquery.js')}}"></script>
  <script src="{{ url('vendor/jquery/dist/jquery.min.js')}}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>Software Release</span></a>
          </div>

          <div class="clearfix"></div>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> TEST PLATFORM <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('platform/HDF')}}"> HDF </a></li>
                    <li><a href="{{ url('platform/HDF+')}}"> HDF+ </a></li>
                    <li><a href="{{ url('platform/SIO')}}"> SIO </a></li>
                    <li><a href="{{ url('platform/SEEDER')}}"> SEEDER </a></li>
                  </ul>
                </li>
                
                <li><a><i class="fa fa-edit"></i> PRODUCT <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('product_detail') }}">Product_Detail</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> SOFTWARE <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('software_history')}}"> Software_History</a></li>
                    @if(Session::get('user_info')['username'] != "Guest")
                    <li><a href="{{ url('eventlogs')}}"> Event Logs</a></li>
                    @endif
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> INVENTORY <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('tester_inventory') }}"> Tester Inventory Viewer</a></li>
                  </ul>
                </li>
                @if(Session::get('user_info')['username'] != "Guest")
<!-- 
                <li><a><i class="fa fa-table"></i> DEVELOPER <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('developer') }}"> Add Owner Product</a></li>
                  </ul>

                </li> --> 


                <li><a><i class="fa fa-clone"></i> JOB TRACKING <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('job_history')}}"> Job History</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i> MEMBER TDE <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('member') }}"> member</a></li>
                  </ul>
                </li>
                @endif

              </ul>
            </div>
          </div>

          <!-- /menu footer buttons -->
       <!--    <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div> -->
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                @if(Session::has('user_info'))
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ url('images') . '/' . Session::get('user_info')['images'] }}" alt="">
                  {!! Session::get('user_info')['name'] !!}
                  <span class=" fa fa-angle-down"></span>
                  <input id="employee_id" type="hidden" name="employee_id" value="{!! Session::get('user_info')['username'] !!}">
                </a>
                @endif
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="{{ url('profile') }}"> Profile Setting</a></li>
                  <!--li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li-->
                  <!--li><a href="javascript:;">Help</a></li-->
                  <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <!--li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="{{ url('images/img.jpg')}}" alt="Profile Image" /></span>
                      <span>
                        @if(Session::has('user_info'))
                        <span>{!! Session::get('user_info')['username'] !!}</span>
                        @endif
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{{ url('images/img.jpg')}}" alt="Profile Image" /></span>
                      <span>
                        @if(Session::has('user_info'))
                        <span>{!! Session::get('user_info')['username'] !!}</span>
                        @endif
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{{ url('images/img.jpg')}}" alt="Profile Image" /></span>
                      <span>
                        @if(Session::has('user_info'))
                        <span>{!! Session::get('user_info')['username'] !!}</span>
                        @endif
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{{ url('images/img.jpg')}}" alt="Profile Image" /></span>
                      <span>
                        @if(Session::has('user_info'))
                        <span>{!! Session::get('user_info')['username'] !!}</span>
                        @endif
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li-->
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col">



       @yield('content')


          <!-- Copyright -->
    <div class="footer-copyright text-center text-black-50 py-3">© 2011 - {{date('Y')}} Copyright: Western Digital Corporation, All Rights Reserved.| Designed by: Test Development Engineering 
      <a class="dark-grey-text" href="https://WDC.com"> WDC.com</a>
    </div>
    <!-- Copyright -->

     </div>
     <!-- /page content -->

     <!-- footer content  -->


<!--      <footer>
      <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
      </div>
      <div class="clearfix"></div>
    </footer>
footer content  --> 



  </div>


  <!-- Bootstrap -->
  <script src="{{ url('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ url('vendor/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{ url('vendor/nprogress/nprogress.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{ url('vendor/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{ url('vendor/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{ url('vendor/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{ url('vendor/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{ url('vendor/Flot/jquery.flot.js')}}"></script>
  <script src="{{ url('vendor/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{ url('vendor/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{ url('vendor/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{ url('vendor/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{ url('vendor/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{ url('vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{ url('vendor/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{ url('vendor/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{ url('vendor/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{ url('vendor/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{ url('vendor/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{ url('vendor/moment/min/moment.min.js')}}"></script>
  <script src="{{ url('vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{ url('build/js/custom.min.js')}}"></script>




</body>
</html>



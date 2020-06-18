<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TESDA || PL Calendar</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-bootstrap/main.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- Toastr -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">0 Notifications (Coming soon)</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 0 new messages
            <span class="float-right text-muted text-sm">0 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 0 friend requests
            <span class="float-right text-muted text-sm">0 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 0 new reports
            <span class="float-right text-muted text-sm">0 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <!-- PAGE EDITOR-->
      <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="dist/img/TESDA-LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TESDA - PLO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <nav class="mt-2 user-panel pb-3 mb-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview">
            
            <a href="#" class="nav-link">
              <i class="nav-icon">
                <img src="dist/img/unknown-160x160.jpg" class="img-circle elevation-2">
              </i>
              <p>
                {{ Auth::user()->name }} 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/profile" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>
                    Profile
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off nav-icon"></i>
                  <p>{{ __('Logout') }}</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>  
              </li>
            </ul>
          </li>

        </ul>
      </nav>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          @if ( (Auth::user()->division)=='OED')     
          <li class="nav-item has-treeview {{ Request::segment(1) === 'home' ? 'menu-open' : null }}">
            <a href="/home" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">Dashboard</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'reqStatus' ? 'menu-open' : null }}">
            <a href="/reqStatus" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Schedule Details
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'calMgmt' ? 'menu-open' : null }}">
            <a href="/calMgmt" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               Calendar Management
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'moaList' ? 'menu-open' : null }}">
            <a href="/moaList" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
               MOAs
              </p>
            </a>
          </li>
          @else
          <li class="nav-item has-treeview {{ Request::segment(1) === 'home' ? 'menu-open' : null }}">
            <a href="/home" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">Dashboard</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'reqStatus' ? 'menu-open' : null }}">
            <a href="/reqStatus" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Schedule Details
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::segment(1) === 'moaList' ? 'menu-open' : null }}">
            <a href="/moaList" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
               MOAs
              </p>
            </a>
          </li>
          @endif

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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="/"> Developed by the Partnership and Linkages Office </a>.</strong>
     All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-bootstrap/main.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<!-- Toastr -->
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    //Date range picker
    //$('#reservation').daterangepicker('getDate');
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 1,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    });
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    //Toastr
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  
  });
  //for Data tables of MOAS
  $(document).ready( function () {
    $('#activeMoaTable').DataTable();
  } );
  $(document).ready( function () {
    $('#two_months_moa_table').DataTable();
  } );
  $(document).ready( function () {
    $('#one_months_moa_table').DataTable();
  } );
  $(document).ready( function () {
    $('#expired_moa_table').DataTable();
  } );

  //Edit modal for MOA-----------
  $('#editModalMoa').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var par_id = button.data('par_id')
    var par_name = button.data('par_name')
    var par_opr = button.data('par_opr')
    var par_description = button.data('par_description')
    var date_signed = button.data('date_signed')
    var date_expiration = button.data('date_expiration')

    var modal = $(this)
    modal.find('.modal-title').text('Edit MOA for '+par_name);
    modal.find('.modal-body #par_id').val(par_id);
    modal.find('.modal-body #par_name').val(par_name);
    modal.find('.modal-body #par_opr').val(par_opr);
    modal.find('.modal-body #par_description').val(par_description);
    modal.find('.modal-body #date_signed').val(date_signed);
    modal.find('.modal-body #date_expiration').val(date_expiration);
  });

  //delete modal for MOA-----------
  $('#deleteModalMoa').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var par_id = button.data('par_id')
    var par_name = button.data('par_name')

    var modal = $(this)
    modal.find('.modal-title').text('Delete MOA for '+par_name+'?');
    modal.find('.modal-body #par_id').val(par_id);
  });

  //delete modal for scheduler-----------
  $('#deleteModal').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var log_ID = button.data('log_id')
    var event_ID = button.data('event_id')
    var event_name = button.data('event_name')

    var modal = $(this)
    modal.find('.modal-title').text('Delete - '+event_name);
    modal.find('.modal-body #log_ID').val(log_ID);
    modal.find('.modal-body #event_ID').val(event_ID);
  });

  //edit modal data for scheduler----------
  $('#editModal').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget)
    var event_ID = button.data('event_id')
    var log_ID = button.data('log_id')
    var event_name = button.data('event_name')
    var venue = button.data('venue')
    var contact_person = button.data('contact_person')
    var division = button.data('division')
    var e_start_date = button.data('e_start_date')
    var e_end_date = button.data('e_end_date')
    var e_start_time = button.data('e_start_time')
    var e_end_time = button.data('e_end_time')
    var allDay = button.data('allday')

    var modal = $(this)
    modal.find('.modal-title').text('Edit - '+event_name);
    modal.find('.modal-body #event_ID').val(event_ID);
    modal.find('.modal-body #log_ID').val(log_ID);
    modal.find('.modal-body #event_name').val(event_name);
    modal.find('.modal-body #venue').val(venue);
    modal.find('.modal-body #contact_person').val(contact_person);
    modal.find('.modal-body #division').val(division);
    modal.find('.modal-body #e_start_date').val(e_start_date);
    modal.find('.modal-body #e_end_date').val(e_end_date);
    
    $(function () {
      if(allDay == 1)//if allDay == TRUE
      {
        $('#allDays').attr('checked', 'checked');
        $("#timeRanges").hide();
        modal.find('.modal-body #allDay').val(1);
        modal.find('.modal-body #e_start_time').val(0);
        modal.find('.modal-body #e_end_time').val(0);
        
        $("#allDays").click(function () {
          if ($(this).is(":checked")) {  
            $("#timeRanges").hide();
            modal.find('.modal-body #allDay').val(1);
            modal.find('.modal-body #e_start_time').val(0);
            modal.find('.modal-body #e_end_time').val(0);
          } else {
            $("#timeRanges").show();
            modal.find('.modal-body #allDay').val(0);
            modal.find('.modal-body #e_start_time').val(e_start_time);
            modal.find('.modal-body #e_end_time').val(e_end_time);
          }
        });

      }else //if allDay == FALSE
      {
        $('#allDays').removeAttr('checked');
        $("#timeRanges").show();
        modal.find('.modal-body #allDay').val(0);
        modal.find('.modal-body #e_start_time').val(e_start_time);
        modal.find('.modal-body #e_end_time').val(e_end_time);
        
        $("#allDays").click(function () {
          if ($(this).is(":checked")) {  
            $("#timeRanges").hide();
            modal.find('.modal-body #allDay').val(1);
            modal.find('.modal-body #e_start_time').val(0);
            modal.find('.modal-body #e_end_time').val(0);
          } else {
            $("#timeRanges").show();
            modal.find('.modal-body #allDay').val(0);
            modal.find('.modal-body #e_start_time').val(e_start_time);
            modal.find('.modal-body #e_end_time').val(e_end_time);
          }
        });

      }//end if else
    });

  });
</script>

<!--<script>
  //Time range hider--------
   var time_ranger = document.getElementById('time-ranges'),
      checkbox = document.getElementById('allDay'),
    disableSubmit = function(e) {
      time_ranger.hidden = this.checked;
      checkbox.value = "1";
    };
  checkbox.addEventListener('change', disableSubmit);
  //----------------------------
  //--------------------------------------------------------------------
  </script>-->

<script>
    @if(Session::has('alert-message'))
      var type="{{Session::get('alert-type', 'info')}}";

      switch(type)
      {
        case 'success':
              toastr.success("{{ Session::get('alert-message') }}");
              break;
        case 'error':
              toastr.error("{{ Session::get('alert-message') }}");
              break;
      }
    @endif  
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

</body>
</html>

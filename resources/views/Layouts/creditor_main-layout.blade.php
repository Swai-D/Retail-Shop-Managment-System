<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>


@yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/img/maswai.png" alt="MultiflowerLogo" height="80px;" width="80px;">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/img/profile.png" class="img-circle elevation-2" alt="User Image" style="width:40px; height:40px;">
        </div>
        <div class="info">
          <a href="#" class="d-block">davy Swai </a>
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

        <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt" style="height:30px;"></i>
              <p>
                Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Multiflower-Report-System/home-page" class="nav-link @yield('inbox-nav-active')">
                  <img src="/assets/img/stock.png" alt="" style="height:30px;">
                  <p>Stock</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_sheet" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Sells Sheet</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/stock_status_page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Category Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/stock_table_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/stock_register_form" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Item</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/Maswai-Shop-Management-System/Stock-Blade-Files/creditor_table" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creditors Table</p>
                </a>
              </li>
            </ul>
              </li>




               <br>
              <li class="nav-header">Action</li>
              <li class="nav-item">
                <a href="/Multiflower-Report-System/user-settings-page/" class="nav-link @yield('user-settings-nav-active')">
                    <img src="/assets/img/user-settings.png" alt="" style="height:30px;">
                  <p>Settings</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/Multiflower-Report-System/user-settings-page/" class="nav-link @yield('user-settings-nav-active')">
                    <img src="/assets/img/logout.png" alt="" style="height:30px;">
                  <p>Logout</p>
                </a>
              </li>

             <!-- if(Auth::user()->userType == 'managerAccess' || Auth::user()->userType == 'admi
             <li class="nav-item">
               <a href="/Multiflower-Report-System/manager-home-page" class="nav-link @yield('manager-nav-active')">
                   <img src="/assets/img/unauthorized-person.png" alt="" style="height:30px;">
                 <p>Manager Access</p>
               </a>
             </li>
             endif -->


          </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('page-content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('M, Y')}} <a href="#">odessa lab, Arusha </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('footer')
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#add_new_row').on('click', function(){
      // alert('Yes');

      var html = '';
      html +='<tr class="table table-striped">';
      html += '<td><select class="form-control" class="form-control form-control-line" style="height:35px; border-radius:5px;"name="item_id[]"><option selected="selected" disabled>--Select--</option>@foreach($all_item as $item)<option value="{{$item->id}}">{{$item->item_name}} ({{$item->size}})</option>@endforeach</select></td>';
      html += '<td><input type="number" name="pices_sold[]"min="0" class="form-control form-control-line" style="height:35px border-radius:5px;"></td>';
      html += '<td><a id="remove"><i class="fa fa-trash fa-fw" aria-hidden="true" style="color:red;" style="height:35px"></i></a></td>';
      html +='</tr>';
      $('tbody').append(html);

    });
  });

  $(document).on('click','#remove', function(){
    $(this).closest('tr', '#tblrow').remove();
  })
</script>

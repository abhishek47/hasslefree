@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <li><a href="{{ backpack_url('bookings') }}"><i class="fa fa-file-text"></i> <span>Bookings</span></a></li>

          <li><a href="{{ backpack_url('customers') }}"><i class="fa fa-list-ul"></i> <span>Customers</span></a></li>

          <li><a href="{{ backpack_url('employees') }}"><i class="fa fa-users"></i> <span>Employees</span></a></li>

        <!--  <li><a href="{{ backpack_url('refunds') }}"><i class="fa fa-credit-card"></i> <span>Refunds</span></a></li> -->

           <li><a href="{{ backpack_url('cities') }}"><i class="fa fa-map-marker"></i> <span>Cities</span></a></li>

           <li><a href="{{ backpack_url('airports') }}"><i class="fa fa-plane"></i> <span>Airports</span></a></li>

           <li><a href="{{ backpack_url('bus-stations') }}"><i class="fa fa-bus"></i> <span>Bus Stations</span></a></li>

           <li><a href="{{ backpack_url('train-stations') }}"><i class="fa fa-train"></i> <span>Train Stations</span></a></li>

           <li><a href="{{ backpack_url('coupons') }}"><i class="fa fa-qrcode"></i> <span>Offer Coupons</span></a></li>

           <li><a href="{{ backpack_url('references') }}"><i class="fa fa-users"></i> <span>References</span></a></li>

           <li><a href="/notifications/new" target="_blank"><i class="fa fa-phone"></i> <span>Notifications</span></a></li>

           <li class="treeview">
              <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
              </ul>
            </li>


          <!-- ======================================= -->
          <li class="header">General</li>

          <li><a href="{{ backpack_url('setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>

          <li><a href="{{  backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>

          <li><a href="{{ backpack_url('log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif

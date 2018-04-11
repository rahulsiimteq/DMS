<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <!-- Status -->
        <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form> --}}
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main Menu</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active" id="home"><a href="/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li class="treeview" id="patient">
        <a href="#">
          <i class="fa fa fa-h-square"></i> <span>Patient</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="/patient/register">Registration</a>
          </li>
          <li><a href="/patient/checkup">Checkup Details</a></li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#"><i class="fa fa-ticket"></i> <span> Patient History</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Add Leave</a></li>
          <li><a href="#">View Leave</a></li>
        </ul>
      </li> -->
      <li><a href="/patient/history"><i class="fa fa-calendar" id = "patient_history" ></i> <span>Patient History</span></a></li>
      <li><a href="/patient/appointment"><i class="fa fa-calendar" id = "patient_history" ></i> <span>Appointments</span></a></li>
      @role('Admin')
      <li><a href="/users"><i class="fa fa-calendar" id = "patient_history" ></i> <span>Add User</span></a></li>
      @endrole
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

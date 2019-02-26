<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('cms/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

 

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">EMS</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Company</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('subjects') }}">View List</a></li>
              <li><a href="{{ url('subjects/add') }}">Add New</a></li>
            </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Employees</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('employees') }}">View List</a></li>
                <li><a href="{{ url('employees/add') }}">Add New</a></li>
              </ul>
            </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Roles</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('exams') }}">View List</a></li>
            <li><a href="{{ url('exams/add') }}">Add New</a></li>
          </ul>
        </li>
        
        
  
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('users') }}">View List</a></li>
            
          </ul>
        </li>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
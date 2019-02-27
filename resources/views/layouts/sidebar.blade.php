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
        <li class="header">{{ Config::get('app.name')}}</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Products</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/products/create') }}">Add New Product</a></li>                
              <li><a href="{{ url('admin/products') }}">View Product List</a></li>
              <li><a href="{{ url('admin/products/expired') }}">View Expired Product List</a></li>
              <li><a href="{{ url('admin/category') }}">Product Category List</a></li>
              
            </ul>
          </li>
          <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/orders') }}">View Order List</a></li>
                <li><a href="{{ url('admin/transaction') }}">View Transaction List</a></li>
                
              </ul>
            </li>
          
  
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>System Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ url('admin/users/create') }}">Add New User</a></li>
            <li><a href="{{ url('admin/users') }}">View User List</a></li>
            <li><a href="{{ url('admin/roles') }}">View Role List</a></li>
            
            
          </ul>
        </li>
       
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
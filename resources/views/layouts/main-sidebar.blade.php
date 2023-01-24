<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MASTER</li>
      <li><a href="{{ route('departments.index') }}"><i class="fa fa-building-o"></i> <span>Departments</span></a></li>
      <li><a href="{{ route('accountants.index') }}"><i class="fa fa-balance-scale"></i> <span>Accountants</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Employees</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="{{ route('employees.index') }}"><i class="fa fa-square"></i> <span>Employees</span></a></li>
          <li><a href="{{ url('/' . ($page = 'employee_active')) }}"><i class="fa fa-square"></i> <span>Active Employees</span></a></li>
          <li><a href="{{ url('/' . ($page = 'employee_inactive')) }}"><i class="fa fa-square"></i> <span>Inactive Employee</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Fees</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="{{ route('fees.index') }}"><i class="fa fa-square"></i> <span>Fees</span></a></li>
          <li><a href="{{ route('fee_invoices.index') }}"><i class="fa fa-square"></i> <span>Fee Invoices</span></a></li>
          <li><a href="{{ route('receipt_employees.index') }}"><i class="fa fa-square"></i> <span>Receipt Employees</span></a></li>
          <li><a href="{{ route('processing_fees.index') }}"><i class="fa fa-square"></i> <span>Processing Fee Employees</span></a></li>
          <li><a href="{{ route('payment_employees.index') }}"><i class="fa fa-square"></i> <span>Payment Employees</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/' . ($page = 'accountants_report')) }}"><i class="fa fa-line-chart"></i> <span>Accountants Reports</span></a></li>
          <li><a href="{{ url('/' . ($page = 'employees_report')) }}"><i class="fa fa-line-chart"></i> <span>Employees Reports</span></a></li>
        </ul>
      </li>
      <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
      <li><a href="{{ route('profile_personlies.index') }}"><i class="fa fa-info"></i> <span>Profile Personly</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

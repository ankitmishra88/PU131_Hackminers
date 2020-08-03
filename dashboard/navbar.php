<script src="https://kit.fontawesome.com/6fabe17380.js" crossorigin="anonymous"></script>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $type;?> Panel <sup>Hackminers</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
<?if($type=='Admin'){?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Dependent Expenses
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Vehicle Expense</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Vehicle</h6>
            <a class="collapse-item" href="add-vehicle.php"><i class="fas fa-plus-circle"></i> Add Vehicle</a>
            <a class="collapse-item" href="view-vehicle.php"><i class="fas fa-eye"></i> View/Edit Vehicle</a>

          </div>
        </div>
      </li>
<div class="sidebar-heading">
        Company Keys
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKey" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Mangament Expense</span>
        </a>
        <div id="collapseKey" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Margin,etc</h6>
            <a class="collapse-item" href="edit-company-key.php"><i class="fas fa-plus-circle"></i>Edit Key</a>
            <a class="collapse-item" href="view-company-key.php"><i class="fas fa-eye"></i> View Key</a>

          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Global Expense
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Global Factors</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Global Factors</h6>
            <a class="collapse-item" href="add-global.php"><i class="fas fa-plus-circle"></i> Add New Factor</a>
            <a class="collapse-item" href="view-global.php"><i class="fas fa-eye"></i> View Factor</a>
          </div>
        </div>
      </li>
<?}?>
<?if($type=='Staff'){?>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Calamity/Strike Reporting</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reporting System</h6>
            <a class="collapse-item" href="add-report.php"><i class="fas fa-plus-circle"></i> Add Report</a>
            <a class="collapse-item" href="view-report.php"><i class="fas fa-eye"></i> View/Edit Report</a>
          </div>
        </div>
      </li>
      <?}?>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserate" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Card-rate</span>
        </a>
        <div id="collapserate" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reporting System</h6>
            <a class="collapse-item" href="/routing/routefinder.php"><i class="fas fa-eye"></i> Get Card Rate</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Charts -->
        <div class="sidebar-heading">
        
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="/dashboard/login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
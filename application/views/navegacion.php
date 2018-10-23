<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <span><?php //echo $_SESSION['usuarios']['nombres'] ?></span>
        <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
      </div>
    </div>

    <!-- Barra de busqueda -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú de Aministración</li>

      <li class="treeview">
        <a href="#"> <i class="fa fa-dashboard"></i> <span>Tablero/Inicio</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>VENTAS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Registro de ventas</a></li>
          <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Consulta de ventas</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i>Registro de productos</a></li>
          <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i>Consulta de inventario </a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>PROVEEDORES</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i>Registro de proveedores</a></li>
          <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Consulta de Proveedores</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>CLIENTES</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> REGISTRO DE CLIENTES</a></li>
          <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i>Consulta de clientes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
      <li>
        <a href="../calendar.html">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="../mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
    
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

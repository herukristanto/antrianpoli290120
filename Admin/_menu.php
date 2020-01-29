<div class="main-container container-fluid">
  <a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
  </a>

  <div class="sidebar" id="sidebar">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
      <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-small btn-success">
          <i class="icon-signal"></i>
        </button>

        <button class="btn btn-small btn-info">
          <i class="icon-pencil"></i>
        </button>

        <button class="btn btn-small btn-warning">
          <i class="icon-group"></i>
        </button>

        <button class="btn btn-small btn-danger">
          <i class="icon-cogs"></i>
        </button>
      </div>

      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
      </div>
    </div><!--#sidebar-shortcuts-->

    <ul class="nav nav-list">
      <li>
        <a href="index.php">
          <i class="icon-dashboard"></i>
          <span class="menu-text"> Dashboard </span>
        </a>
      </li>

      <li>
        <a href="dokter.php">
          <i class="icon-edit"></i>
          <span class="menu-text"> Data Dokter </span>
        </a>
      </li>

      <li>
        <a href="printer.php">
          <i class="icon-print"></i>
          <span class="menu-text"> Data Printer </span>
        </a>
      </li>









        </ul>
      </li>




    </ul><!--/.nav-list-->

    <div class="sidebar-collapse" id="sidebar-collapse">
      <i class="icon-double-angle-left"></i>
    </div>
  </div>

  <div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="icon-home home-icon"></i>
          <a href="index.php">Home</a>

          <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
          </span>
        </li>

        <li class="active">
          <span class="label label-warning">
          <?php
            echo "$username";
           ?>
         </span>
        </li>
      </ul><!--.breadcrumb-->

      <div class="nav-search" id="nav-search">
        <form class="form-search" />
          <span class="input-icon">
            <input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
            <i class="icon-search nav-search-icon"></i>
          </span>
        </form>
      </div><!--#nav-search-->
    </div>

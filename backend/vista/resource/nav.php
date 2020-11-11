<?php

	function NavAdmin(){
		$nav = "";
		/* NOMBRE PARA LA SESSION*/
		$vname = Session::get('Nombre');
		$vfoto = Session::get('Foto');

		$nav = '
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
			  <!-- sidebar: style can be found in sidebar.less -->
			  <section class="sidebar">
			    <!-- Sidebar user panel -->
			    <div class="user-panel">
			      <div class="pull-left image">
			        <img src="../../../backend/datos/'.$vfoto.'" class="img-circle" alt="User Image">
			      </div>
			      <div class="pull-left info">
			        <p>'.$vname.'</p>
			        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			      </div>
			    </div>
			    <!-- search form -->
			    <form action="#" method="get" class="sidebar-form">
			      <div class="input-group">
			        <input type="text" name="q" class="form-control" placeholder="Search...">
			        <span class="input-group-btn">
			              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
			                <i class="fa fa-search"></i>
			              </button>
			            </span>
			      </div>
			    </form>
			    <!-- /.search form -->
			    <!-- sidebar menu: : style can be found in sidebar.less -->
			    <ul class="sidebar-menu" data-widget="tree">
			      <li class="header">MAIN NAVIGATION</li>
			      <li class="active treeview menu-open">
			        <a href="#">
			          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			          <span class="pull-right-container">
			            <i class="fa fa-angle-left pull-right"></i>
			          </span>
			        </a>
			        <ul class="treeview-menu">
			          <li class=""><a href="../home/index.php"><i class="fa fa-circle-o"></i>Reportes</a></li>
			        </ul>
			      </li>
			      <li class="treeview">
			        <a href="#">
			          <i class="fa fa-table"></i> <span>Usuarios</span>
			          <span class="pull-right-container">
			            <i class="fa fa-angle-left pull-right"></i>
			          </span>
			        </a>
			        <ul class="treeview-menu">
			          <li><a href="../usuarios/"><i class="fa fa-circle-o"></i>Todos</a></li>
			        </ul>
			      </li>
			      <li class="treeview">
			        <a href="#">
			          <i class="fa fa-table"></i> <span>Imagenes</span>
			          <span class="pull-right-container">
			            <i class="fa fa-angle-left pull-right"></i>
			          </span>
			        </a>
			        <ul class="treeview-menu">
			          <li><a href="../imagenes/"><i class="fa fa-circle-o"></i>Todas</a></li>
			        </ul>
			      </li>
			      <li>
			        <a href="../contactos/">
			          <i class="fa fa-th"></i> <span>Contactos</span>
			          <span class="pull-right-container">

			          </span>
			        </a>
			      </li>
			      <li>
			        <a href="../galeria/">
			          <i class="fa fa-th"></i> <span>Destinos</span>
			          <span class="pull-right-container">

			          </span>
			        </a>
			      </li>
			      <li>
			        <a href="../equipo/">
			          <i class="fa fa-th"></i> <span>Equipo</span>
			          <span class="pull-right-container">

			          </span>
			        </a>
				  </li>
				  
				  <li>
			        <a href="../textos/">
			          <i class="fa fa-th"></i> <span>Textos</span>
			          <span class="pull-right-container">

			          </span>
			        </a>
			      </li>



			    </ul>
			  </section>
			  <!-- /.sidebar -->
			</aside>
		';


		echo $nav;



	}






 ?>
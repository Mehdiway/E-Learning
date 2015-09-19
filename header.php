<header class="main-header">

  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>E</b>-Learning</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Bonjour Mr <?= $nom_complet ?> !</span>
          </a>
        </li>
        <li>
          <a href="login.php?action=logout"><i class="fa fa-power-off"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php
  include('lock.php');

  if($_SERVER["REQUEST_METHOD"] == "POST") {
      $query = "INSERT INTO Formatteur (nom, prenom, tel, adresse, specialite, date_naissance, bio, email, password) " .
              "VALUES ('" . $_POST["nom"] . "', '" . $_POST["prenom"] . "', '" . $_POST["tel"] . "', '" . $_POST["adresse"] . "', '" . $_POST["specialite"] . "', STR_TO_DATE('" . $_POST["birthday"] . "', '%d/%m/%Y'), '" . $_POST["bio"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "')";

      mysqli_query($db, $query);
      echo mysqli_error($db);
      //header("location: liste-formatteurs.php");
  }

  $nom_complet = $admin['nom'] . " " . $admin['prenom'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EMSI E-Learning | Ajouter Formatteur</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/FontAwesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/AdminLTE/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/AdminLTE/css/skins/skin-blue.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="css/e-learning.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <?php include('header.php'); ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <li class="">
              <a href="liste-inscriptions.php"><i class="fa fa-user"></i> <span>Inscriptions</span></a>
            </li>
            <li class="treeview active">
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>Gestion des formatteurs</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class=""><a href="liste-formatteurs.php"><i class="fa fa-list"></i> Voir la liste</a></li>
                <li class="active"><a href="ajouter-formatteur.php"><i class="fa fa-plus"></i> Ajouter un formatteur</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Formations</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="liste-formations.php"><i class="fa fa-list"></i> Voir la liste</a></li>
                <li><a href="ajouter-formation.php"><i class="fa fa-plus"></i> Ajouter une formation</a></li>
              </ul>
            </li>
            <li><a href="liste-certificats.php"><i class="fa fa-certificate"></i> <span>Réussites</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Gestion des formatteurs</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ajouter un formatteur</h3>
            </div>
            <div class="box-body">
            <form method="POST" class="form-horizontal" id="formateurForm">
              <div class="form-group">
                <label for="nom" class="col-sm-3 control-label">Nom :</label>
                <div class="col-sm-6">
                  <input id="nom" type="text" class="form-control" name="nom">
                </div>
              </div>
              <div class="form-group">
                <label for="prenom" class="col-sm-3 control-label">Prénom :</label>
                <div class="col-sm-6">
                  <input id="prenom" type="text" class="form-control" name="prenom">
                </div>
              </div>
              <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Téléphone :</label>
                <div class="col-sm-6">
                  <input id="tel" type="text" class="form-control" name="tel">
                </div>
              </div>
              <div class="form-group">
                <label for="adresse" class="col-sm-3 control-label">Adresse :</label>
                <div class="col-sm-6">
                  <input id="adresse" type="text" class="form-control" name="adresse">
                </div>
              </div>
              <div class="form-group">
                <label for="specialite" class="col-sm-3 control-label">Spécialité :</label>
                <div class="col-sm-6">
                  <input id="specialite" type="text" class="form-control" name="specialite">
                </div>
              </div>
              <div class="form-group">
                <label for="birthday" class="col-sm-3 control-label">Date de naissance :</label>
                <div class="col-sm-6">
                  <input id="birthday" type="text" class="form-control datepicker" name="birthday">
                </div>
              </div>
              <div class="form-group">
                <label for="bio" class="col-sm-3 control-label">Bio :</label>
                <div class="col-sm-6">
                  <input id="bio" type="text" class="form-control" name="bio">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email :</label>
                <div class="col-sm-6">
                  <input id="email" type="email" class="form-control" name="email">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Mot de passe :</label>
                <div class="col-sm-6">
                  <input id="password" type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="form-group">
                <label for="confirm_password" class="col-sm-3 control-label">Confirmer mot de passe :</label>
                <div class="col-sm-6">
                  <input id="confirm_password" type="password" class="form-control" name="confirm_password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 EMSI E-Learning.</strong> Tous droits réservés.
      </footer>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker -->
    <script type="text/javascript" src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-datepicker/locales/bootstrap-datepicker.fr-CH.min.js"></script>
    <!-- DataTables 1.10.7 -->
    <script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- jQuery Validate -->
    <script type="text/javascript" src="plugins/jQuery Validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="plugins/jQuery Validate/messages_fr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="plugins/AdminLTE/js/app.min.js"></script>

    <script type="text/javascript" src="js/e-learning.js"></script>
    <script type="text/javascript" src="js/controllers/ctrl-formateur.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>

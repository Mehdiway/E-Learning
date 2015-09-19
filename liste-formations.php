<?php
  include('lock.php');
  $nom_complet = $admin['nom'] . " " . $admin['prenom'];

  $formateurs = mysqli_query($db, "select f.*, ft.nom, ft.prenom from formation f, formatteur ft where f.id_formatteur = ft.id");
  $rows = array();

  $i = 0;
  while($r = mysqli_fetch_array($formateurs)) {
    $rows[$i]["id"] = $r[0];
    $rows[$i]["titre"] = $r[1];
    $rows[$i]["description"] = $r[2];
    $rows[$i]["competences"] = $r[3];
    $rows[$i]["id_administrateur"] = $r[4];
    $rows[$i]["id_formateur"] = $r[5];
    $rows[$i]["nom_formateur"] = $r[6];
    $rows[$i]["prenom_formateur"] = $r[7];

    $rows[$i]["short_desc"] = strlen($r[2]) > 50 ? substr($r[2],0,50)."..." : $r[2];

    $i++;
  }

  
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
    <title>EMSI E-Learning | Liste Formatteurs</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
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
            <li class="treeview">
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>Gestion des formatteurs</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="liste-formatteurs.php"><i class="fa fa-list"></i> Voir la liste</a></li>
                <li><a href="ajouter-formatteur.php"><i class="fa fa-plus"></i> Ajouter un formatteur</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#"><i class="fa fa-book"></i> <span>Formations</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="active"><a href="liste-formations.php"><i class="fa fa-list"></i> Voir la liste</a></li>
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
          <h1>Formations</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Liste des formations</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover dataTables">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Compétences requises</th>
                    <th>Formatteur</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($rows as $row) {
                      ?>
                      <tr>
                        <td><?= $row["titre"] ?></td>
                        <td><?= $row["short_desc"] ?></td>
                        <td><?= $row["competences"] ?></td>
                        <td><?= $row["nom_formateur"] . " " . $row["prenom_formateur"] ?></td>
                        <td>
                          <a href="#" class="btn btn-sm btn-success details-formation" data-details="<?= htmlspecialchars(json_encode($row)) ?>"><i class="fa fa-info"></i> Détails</a>
                          <a href="#" class="btn btn-sm btn-danger supprimer-formation" data-id="<?= $row["id"] ?>"><i class="fa fa-times"></i> Supprimer</a>
                        </td>
                      </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
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

    <script id="details-formation" type="x-tmpl-mustache">
      <table class="table table-hover table-striped">
        <tr>
          <td class="col-sm-4"><strong>Titre</strong></td>
          <td class="col-sm-8">{{titre}}</td>
        </tr>
        <tr>
          <td><strong>Description</strong></td>
          <td>{{description}}</td>
        </tr>
        <tr>
          <td><strong>Compétences requises</strong></td>
          <td>{{competences}}</td>
        </tr>
        <tr>
          <td><strong>Formatteur assigné</strong></td>
          <td>{{nom_formateur}} {{prenom_formateur}}</td>
        </tr>
        <tr>
          <td><strong>Nombre d'étapes</strong></td>
          <td>5</td>
        </tr>
        <tr>
          <td><strong>Nombre d'inscrits</strong></td>
          <td>182</td>
        </tr>
        <tr>
          <td><strong>Nombre de réussites</strong></td>
          <td>43</td>
        </tr>
      </table>
    </script>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables 1.10.7 -->
    <script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/bootbox/bootbox.min.js"></script>
    <!-- Mustache -->
    <script type="text/javascript" src="plugins/mustache.min.js"></script>
    <!-- AdminLTE App -->
    <script src="plugins/AdminLTE/js/app.min.js"></script>

    <script type="text/javascript" src="js/e-learning.js"></script>
    <script type="text/javascript" src="js/controllers/ctrl-formation.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>

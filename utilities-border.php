<?php

session_start();
if(!isset($_SESSION['username'] or $_SESSION['username']!="Admin")){
    header("Location:admin.php");
  
    exit();
  }
include('bade.php');
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

    // Récupérer les données du formulaire
    $nom_prenom = $_POST['nom_prenom'];
    $numero = $_POST['numero'];
    $prestation = $_POST['prestation'];
    $cout_prestation = $_POST['cout_prestation'];
    $mode_paiement = $_POST['mode_paiement'];
    $montant_payer = $_POST['montant_payer'];
    $reste_payer = $_POST['reste_payer'];
    $date = $_POST['date'];

    // Préparer la requête SQL pour l'insertion de données dans la table
    $sql = "INSERT INTO prestataires (nom_prenom, numero, prestation, cout_prestation, mode_paiement, montant_payer, reste_payer) 
            VALUES ('$nom_prenom', '$numero', '$prestation', '$cout_prestation', '$mode_paiement', '$montant_payer', '$reste_payer')";

    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        echo "Données insérées avec succès.";
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jacoub Bleu</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    
    <style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 100%;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">INSP ACHAT</div>
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

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Plublier Ici</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ajouter:</h6>
            <a class="collapse-item" href="buttons.php"> Ajouter des  <b>achat</b></a>
            <a class="collapse-item" href="cards.php">Ajouter des  <b>Fournisseur</b></a>
            <a class="collapse-item" href="utilities-color.php"> Ajouter dans les  <b>stocks</b></a>
            <a class="collapse-item" href="utilities-border.php">Ajouter des <b> prestataires</b></a>
            <a class="collapse-item" href="faire.php">Ajouter des <b> Achats a faire</b></a>
        </div>
    </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Editer mes publications</span>
    </a> 
   <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Afficher</h6>
            <a class="collapse-item" href="update_image.php">les <b>Achats</b></a>
            <a class="collapse-item" href="update_videos.php">les <b>Fournisseur</b></a>
            <a class="collapse-item" href="update_agenda.php">les  <b>stocks</b></a>
            <a class="collapse-item" href="update_galirie.php">les  <b>prestataires</b></a>
            <a class="collapse-item" href="utilities-border.php">les <b> Achats a faire</b></a>
        </div>
    </div> 
</li> 
<!-- Divider -->
</ul>

                </nav>
              
<!-- ======================================================================================== -->
<div class="container-fluid">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="py-20 h-screen bg-gray-300 px-2">
                        <h2 class="text-center border text-black"><b><u>Ajouter  un prestataires</u></b></h2><br>
                    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                        <div class="md:flex">
                            <div class="w-full px-4 py-6 ">
                       <div class="mb-1">
                        <span class="text-sm">nom et Prenom</span>
                        <input  id="toil" type="text" class="form-control" name="nom_prenom"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>
                       <div class="mb-1">
                        <span class="text-sm">numero</span>
                        <input  id="toil" type="number" class="form-control" name="numero"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>
                       <div class="mb-1">
                        <span class="text-sm">Prestation</span>
                        <input  id="toil" type="text" class="form-control" name="prestation"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>
                       <div class="mb-1">
                    <span class="text-sm">COUT DE la Prestation</span>
                        <input  id="toil" type="number" class="form-control" name="cout_prestation"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>
                       <div class="mb-1">
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="cache" name="mode_paiement" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                 payer Cache
                            </label>
                        </div>
                        <div class="form-check">
                             <input class="form-check-input" type="radio" value="par  Tranche" name="mode_paiement" id="flexRadioDefault2" >
                         <label class="form-check-label" for="flexRadioDefault2">
                        payement par  Tranche 
                         </label>
                            </div>
                    </div>
                    <div class="form-row">
                     <div class="col">
                        <input type="text" class="form-control" name="montant_payer"  placeholder="montant payer">
                    </div>
                        <div class="col">
                            <input type="text" class="form-control" name="reste_payer" placeholder="Reste a payer">
                        </div>
                    </div>
                       <div class="mb-1">
                        <span class="text-sm">date</span>
                        <input  id="toil" type="date" class="form-control" name="date"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>


                       <div class="mt-3 text-right">

                        
                        <button type="submit" name="reset" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">effacer</button>
                        <button type="submit" name="submit" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Publier</button>
                         
                       </div>
                       
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.jsy"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
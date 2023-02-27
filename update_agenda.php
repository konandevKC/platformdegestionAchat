<?php
include('bade.php');
session_start();
if(!isset($_SESSION['username'])){
  header("Location:admin.php");

  exit();
}else{
$_SESSION['username']== "JACOUBLEU";


}

$img = mysqli_query($conn,"SELECT * FROM `achat`");
$fe = mysqli_num_rows($img);
if(isset($_GET['del'])){
    $sup = $_GET['del'];

    $del = mysqli_query($conn,"DELETE  FROM `achat` WHERE idact = $sup");
    echo '<div class="alert alert-danger" role="alert">
    <strong>Oh snap!</strong> Change a few things up and try submitting again.
  </div>';
    
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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
            <a class="collapse-item" href="update_agenda.php">les  <b>Achats a faire</b></a>
            <a class="collapse-item" href="update_galirie.php">les  <b>prestataires</b></a>
           
        </div>
    </div> 
</li> 
<!-- Divider -->
</ul>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row text-center">
                    <div class="text-center"><h2>Liste des achats a faire</b></h2></div>
                  
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">identifiant</th>
                        <th class="text-center">Designation</th>
                        <th class="text-center">quantite</th>
                        <th class="text-center">Prix unitaire</th>
                        <th class="text-center">montant_total</th>
                        <th class="text-center">Date de demande</th>
                        <th class="text-center"> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($ad =mysqli_fetch_assoc($img)){
                    ?>
                    <tr>
                        <td class="text-center"><b><?= $ad['idact']?></b></td>
                        <td class="text-center"><?= $ad['designation']?></td>
                        <td class="text-center"><?= $ad['quantites']?></td>
                        <td><?= $ad['prix_unitaire']?></td>
                        <td><p class="text-center"><?= $ad['montant_total']?></p></td>
                        <td class="text-center"><?= $ad['reg_date']?></td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a href="update_agenda.php?edi=<?= $ad['idact']?>" class="edit" data-toggle="modal" data-target="#modalLoginForm"><i class="material-icons">&#xE254;</i></a>
                            <a href="update_agenda.php?del=<?= $ad['idact']?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>    
                </tbody>
            </table>
            <?php
if(isset($_GET['edi'])){
    $up = $_GET['edi'];
    $upda = mysqli_query($conn,"SELECT * FROM `achat` where idact= $up");
    $view = mysqli_fetch_assoc($upda);
    ?>


<div class="container-fluid ">

   <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="" name="vide" value="<?= $view['idact']?>" id="" hidden>
                        <div class=" h-screen bg-gray-300 px-2">
                        <h4 class="text-center border text-black"><b><u>MODIFIER L'ELEMENT SELECTIONNE DANS Liste</u></b></h4><br>
                    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                        <div class="md:flex">
                            <div class="w-full px-4 py-6 ">
                       <div class="mb-1">
                        <span class="text-sm">designation</span>
                        <input   id="toil" type="text"  value="<?= $view['designation']?>" name="nom" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>

                       <div class="mb-1">
                        <span class="text-sm">quantite</span>
                        <input   id="toil" type="date"  value="<?= $view['quantites']?>" name="date"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>

                       <div class="mb-1">
                        <span class="text-sm">Entrez la date de Fin</span>
                        <input   id="toil" type="date"  value="<?= $view['prix_unitaire']?>" name="fin"  class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600">
                       </div>
                       <div class="mb-1">
                        <span class="text-sm">Description</span>
                        <textarea id="descr" type="text"   name="description" class="h-24 py-1 px-3 w-full border-2 border-blue-700 rounded focus:outline-none focus:border-blue-400 resize-none">
                      <?= $view['montant_total']?>
                        </textarea>
                       </div> 
                       <div class="mt-3 text-right">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="modifier" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Modifier</button>
                       </div>
                       
                    </div>
                </form>
        </div>
        </div>
             </div>
            </div>


<!-- ============================================================================================================ -->



<?php
if(isset($_POST['modifier'])){
    $idi = $_POST['vide'];
    $nom = addslashes($_POST['nom']);
    $date = $_POST['date'];
    $fin = $_POST['fin'];
    $desc = addslashes( $_POST['description']);
//update  in php?
$mod= mysqli_query($conn,"UPDATE achat SET designation = '$nom', quantites = '$date', prix_unitaire= '$fin',montant_total='$desc' WHERE idact = $idi");
  // $mod = mysqli_query($conn,"UPDATE `agenda` SET `titre`= $nom,`date_ag`=$date,`descrip`=$desc where `id_ag`=3");
 if($mod){
    echo '<script>alert("Modification effectuée avec succès, Veillez actualiser le site")</script>';
    header('location:update_agenda.php');
    }
    else{
        echo"echec de la modification !!!";
    }
}

}
?>
        </div>
    </div>
</div>   
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; INSPACHAT  disign By devKC 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.jsy"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
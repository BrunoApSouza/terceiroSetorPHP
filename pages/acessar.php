<?php
$id = intval($_GET['id']);

if(!isset($_SESSION))
    session_start();

$id_user = $_SESSION['usuario'];
$sql_query = $mysqli->query("SELECT * FROM voluntario WHERE id = '$id' AND id IN (SELECT idvoluntario FROM acaofeita WHERE idusuario = '$id_user')") or die($mysqli->error);
$acessa = $sql_query->fetch_assoc();

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?php echo $acessa['nome']; ?></h4>
                </div>  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?p=xxxxxx">Meus</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Visualizar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <p>
                    <?php echo $acessa['email']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
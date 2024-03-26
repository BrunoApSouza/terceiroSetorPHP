<?php

include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$erro = false;

$id_usuario = $_SESSION['usuario'];
$voluntario_query = $mysqli->query("SELECT * FROM voluntario WHERE id NOT IN (SELECT idvoluntario FROM acaofeita WHERE idusuario = '$id_usuario')") or die($mysqli->error);

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Seja voluntario</h4>
                    <span>Aguarde um futuro contato via e-mail assim que tivermos a próxima ação. As vagas são limitadas e as campanhas são sazonais, mas você sempre pode nos ajudar divulgando nosso trabalho de conscietização</span>
                </div>  
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Seja voluntario</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
        <?php if($erro !== false) {
                                    ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
            <?php
        }
        ?>
        </div>
        <?php while($voluntario = $voluntario_query->fetch_assoc()) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $voluntario['nome']; ?></h5>
                </div>
                <div class="card-block">
                    <img src="<?php echo $voluntario['imagem']; ?>" class="img-fluid mb-3 rounded" alt="" style="max-width: 120%; max-height: 100px;">
                    <p>
                    <?php echo $voluntario['telefone']; ?>
                    </p>
                    <p>
                    <?php echo $voluntario['email']; ?>
                    </p>
                    <p>
                    <?php echo $voluntario['beneficiario']; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>
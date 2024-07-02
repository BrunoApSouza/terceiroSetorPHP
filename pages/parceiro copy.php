<?php

include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$erro = false;


if(isset($_POST['adquirir'])) {

    // verificar se o usuario possui creditos para compra-lo
    error_log('Solicitação de adquirir parceiro iniciada'); 

    //sessão user
    $idusuario = $_SESSION['usuario'];

    //
    $idparceiro= intval($_POST['adquirir']);
    $sql_query_parceiro = $mysqli->query("SELECT id FROM parceiro WHERE id = '$idparceiro'") or die($mysqli->error);
    $parceiro = $sql_query_parceiro->fetch_assoc();

    $tipoajuda= intval($_POST['adquirir']);
    $sql_query_parceiro = $mysqli->query("SELECT tipoajuda FROM parceiro WHERE tipoajuda = '$tipoajuda'") or die($mysqli->error);
    $parceiro = $sql_query_parceiro->fetch_assoc();

    $idvoluntario= intval($_POST['adquirir']);
    $sql_query_parceiro= $mysqli->query("SELECT id FROM voluntario WHERE id = '$idvoluntario'") or die($mysqli->error);
    $parceiro = $sql_query_parceiro->fetch_assoc();

    //inseri o a acao feira
    $mysqli->query("INSERT INTO acaofeita (idusuario, idparceiro, nomeacaofeita, dataacaoescolha, idvoluntario) VALUES(
        '$idusuario',
        '$idparceiro',
        '$tipoajuda',
        NOW(),
        '$idvoluntario'
    )") or die($mysqli->error);
}   

$id_usuario = $_SESSION['usuario'];
$parceiro_query = $mysqli->query("SELECT * FROM parceiro WHERE id NOT IN (SELECT idparceiro FROM acaofeita WHERE idusuario = '$id_usuario')") or die($mysqli->error);

?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Seja parceiro, entre em contato com a gente!</h4>
                    <span>Solicite a um PARCEIRO para ajudar o seu BENEFICIÁRIO, vamos fazer o bem juntos!</span>
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
                    <li class="breadcrumb-item">Seja Parceiro</li>
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
        <?php while($parceiro = $parceiro_query->fetch_assoc()) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $parceiro['nome']; ?></h5>
                </div>
                <div class="card-block">
                    <!--
                    <img src="<?php echo $parceiro['imagem']; ?>" class="img-fluid mb-3" alt="">
                    -->
                    <p>
                    <?php echo $parceiro['tipoajuda']; ?>
                    </p>
                    <p>
                    <?php echo $parceiro['email']; ?>
                    </p>
                    <form action="" method="post">
                        <button type="submit" name="adquirir" value="<?php echo $parceiro['id']; ?>" class="btn form-control btn-out-dashed btn-success btn-square" style="background-color: #CC7E65;">SOLICITAR</button>   
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>
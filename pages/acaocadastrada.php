<?php

protect(0);

if(!isset($_SESSION))
    session_start();

$id_usuario = $_SESSION['usuario'];
$acaocad_query = $mysqli->query("SELECT * FROM parceiro WHERE id IN (SELECT idparceiro FROM acaofeita WHERE idusuario = '$id_usuario')") or die($mysqli->error);

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Veja quem você apoiou</h4>
                    <span>Muito obrigado por apoiar!!!</span>
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
                    <li class="breadcrumb-item">Ações Solicitadas</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <?php while($acaocad = $acaocad_query->fetch_assoc()) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Parceiro: <?php echo $acaocad['nome']; ?></h5>
                </div>
                <div class="card-block">
                    <!--<<img src="<?php echo $acaocad['imagem']; ?>" class="img-fluid mb-3" alt="">  -->
                    <p>
                        E-mail: <?php echo $acaocad['email']; ?>
                    </p>
                    <p>
                        O tipo de ajuda é: <?php echo $acaocad['tipoajuda']; ?>
                    </p>
                    <form action="acessar.php">
                        <input type="hidden" name="p" value="acessar">
                        <input type="hidden" name="id" value="<?php echo $acaocad['id']; ?>">
                        <!--<<button type="submit" class="btn form-control btn-out-dashed btn-primary btn-square">Acessar</button> -->
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
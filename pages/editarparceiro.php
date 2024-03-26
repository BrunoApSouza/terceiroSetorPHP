<?php
include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(1);

$id = intval($_GET['id']);

if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string($_POST['nome']);
    $email = $mysqli->escape_string($_POST['email']);
    $telefone = $mysqli->escape_string($_POST['telefone']);
    $profissao = $mysqli->escape_string($_POST['profissao']);
    $tipoajuda = $mysqli->escape_string($_POST['tipoajuda']);

    $erro = array();
    if(empty($nome))
        $erro[] = "nome";
    
    if(empty($email))
        $erro[] = "email";

    if(empty($telefone))
        $erro[] = "telefone";

    if(empty($profissao))
        $erro[] = "profissao";

    if(empty($tipoajuda))
        $erro[] = "tipoajuda";

    if(count($erro) == 0) {

        $sql_code = "UPDATE parceiro 
        SET nome ='$nome',
        email = '$email',
        telefone = '$telefone',
        profissao = '$profissao',
        tipoajuda = '$tipoajuda'
        WHERE id = '$id'";

    } else {
        $sql_code = "UPDATE parceiro 
            SET nome ='$nome',
                email = '$email',
                telefone = '$telefone',
                profissao = '$profissao',
                tipoajuda = '$tipoajuda'
            WHERE id = '$id'";      
    }

    $mysqli->query($sql_code) or die($mysqli->error);
    die("<script>location.href=\"index.php?p=gerenciarparceiro\";</script>");   
}

$sql_query = $mysqli->query("SELECT * FROM parceiro WHERE id = '$id'") or die($mysqli->error);
$parceiro = $sql_query->fetch_assoc();

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar parceiro</h4>
                    <span>Preencha as informações e clique em Salvar</span>
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
                    <li class="breadcrumb-item">
                        <a href="index.php?p=gerenciarparceiro">
                            Gerenciar Parceiros
                        </a>
                    </li>
                    <li class="breadcrumb-item">Cadastrar Parceiros</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($erro) && count($erro) > 0) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach($erro as $e) { echo "$e<br>"; } ?>
                </div>
                <?php
            }
            ?>
            
            <div class="card">
                <div class="card-header">
                    <h5>Formulário de Parceiros</h5>
                </div>
                <div class="card-block">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">nome</label>
                                    <input type="text" value="<?php echo $parceiro['nome']; ?>" name="nome" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="text" value="<?php echo $parceiro['email']; ?>" name="email" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">telefone</label>
                                    <input type="text" value="<?php echo $parceiro['telefone']; ?>" name="telefone" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">profissão</label>
                                    <input type="text" value="<?php echo $parceiro['profissao']; ?>" name="profissao" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">tipo de apoio</label>
                                    <input type="text" value="<?php echo $parceiro['tipoajuda']; ?>" name="tipoajuda" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciarparceiro" class="btn btn-primary btn-round" style="background-color: #000000;"><i class="ti-arrow-left"></i> Voltar</a>
                                <button type="submit" name="enviar" value="1" class="btn btn-success btn-round float-right" style="background-color: #CC7E65;"><i class="ti-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
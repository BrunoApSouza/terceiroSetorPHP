<?php
include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(1);

if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string($_POST['nome']);
    $email = $mysqli->escape_string($_POST['email']);
    $telefone = $mysqli->escape_string($_POST['telefone']);
    $tipoajuda = $mysqli->escape_string($_POST['tipoajuda']);
    $profissao = $mysqli->escape_string($_POST['profissao']);
    
    $erro = array();
    if(empty($nome))
        $erro[] = "nome";
    
    if(empty($email))
        $erro[] = "email";

    if(empty($telefone))
        $erro[] = "telefone";

    if(empty($tipoajuda))
        $erro[] = "tipoajuda";

    if(empty($profissao))
    $erro[] = "profissao";

    if(count($erro) == 0) {
            $sql_code = "INSERT INTO parceiro (nome, email, telefone, datacadastro, tipoajuda, profissao) VALUES(
                '$nome',
                '$email',
                '$telefone',
                NOW(),
                '$tipoajuda',
                '$profissao'
            )";
            $inserido = $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else {
                die("<script>location.href=\"index.php?p=parceiro\";</script>");
            }
    } 
}

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Parceiro</h4>
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
                            Gerenciar Parceiro
                        </a>
                    </li>
                    <li class="breadcrumb-item">Cadastrar Parceiro</li>
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
                    <h5>Formulário de Cadastro</h5>
                </div>
                <div class="card-block">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">nome</label>
                                    <input type="text" name="nome" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">e-mail</label>
                                    <input type="text" name="email" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" name="telefone" class="form-control">
                                </div> 
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">qual vai ser o apoio</label>
                                    <input type="text" name="tipoajuda" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Profissão</label>
                                    <input type="text" name="profissao" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=cadastrarparceiro" class="btn btn-primary btn-round" style="background-color: #000000;"><i class="ti-arrow-left"></i> Voltar</a>
                                <button type="submit" name="enviar" value="1" class="btn btn-success btn-round float-right" style="background-color: #CC7E65;"><i class="ti-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
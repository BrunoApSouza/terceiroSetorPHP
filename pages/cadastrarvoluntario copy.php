<?php
include("lib/conexao.php");
include("lib/enviarArquivo.php");
include('lib/protect.php');
protect(1);

if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string($_POST['nome']);
    $email = $mysqli->escape_string($_POST['email']);
    $telefone = $mysqli->escape_string($_POST['telefone']);
    $profissao = $mysqli->escape_string($_POST['profissao']);
    $beneficiario = $mysqli->escape_string($_POST['beneficiario']);
    
    $erro = array();
    if(empty($nome))
        $erro[] = "nome";
    
    if(empty($email))
        $erro[] = "email";

    if(empty($telefone))
        $erro[] = "telefone";

    if(empty($profissao))
        $erro[] = "profissao";

    if(empty($beneficiario))
        $erro[] = "beneficiario";

    /* ===TRATAMENTO DE IMAGEM - ACHEI MELHOR TIRAR PARA NÃO DEIXAR OBRIGATORIO A QUESTÃO DA IMAGEM
    if(!isset($_FILES) || !isset($_FILES['imagem']) || $_FILES['imagem']['size'] == 0)
        $erro[] = "Selecione uma imagem para o conteúdo";
    */

    /* ===TRATAMENTO DE IMAGEM - ACHEI MELHOR TIRAR PARA NÃO DEIXAR OBRIGATORIO A QUESTÃO DA IMAGEM*/
    $imagem_nome = '';
    if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0) {
        // Processar a imagem e obter o nome do arquivo
        $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
        if($deu_certo !== false) {
            $imagem_nome = $deu_certo;
        } else {
            $erro[] = "Falha ao enviar a imagem";
        }
    }

    if(count($erro) == 0) {
        /* ===TRATAMENTO DE IMAGEM - ACHEI MELHOR TIRAR PARA NÃO DEIXAR OBRIGATORIO A QUESTÃO DA IMAGEM
        $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
        if($deu_certo !== false) {
        */
        $sql_code = "INSERT INTO voluntario (nome, email, telefone, profissao, beneficiario, imagem, datacadastro) VALUES(
                '$nome',
                '$email',
                '$telefone',
                '$profissao',
                '$beneficiario',
                '$deu_certo',
                NOW()
            )";
            $inserido = $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else {
                die("<script>location.href=\"index.php?p=voluntario\";</script>");
           }
    } else 
            $erro[] = "Falha ao enviar a imagem";
    
}?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Voluntário</h4>
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
                        <a href="index.php?p=gerenciarvoluntario">
                            Gerenciar Voluntário
                        </a>
                    </li>
                    <li class="breadcrumb-item">Cadastrar Voluntário</li>
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
                                    <label for="">Nome</label>
                                    <input type="text" name="nome" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="text" name="email" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" name="telefone" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Profissão</label>
                                    <input type="text" name="profissao" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Beneficiario</label>
                                    <input type="text" name="beneficiario" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Imagem</label>
                                    <input type="file" name="imagem" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=voluntario" class="btn btn-primary btn-round" style="background-color: #000000;"><i class="ti-arrow-left"></i> Voltar</a>
                                <button type="submit" name="enviar" value="1" class="btn btn-success btn-round float-right" style="background-color: #CC7E65;"><i class="ti-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
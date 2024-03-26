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
    $beneficiario = $mysqli->escape_string($_POST['beneficiario']);
    $imagem = $mysqli->escape_string($_POST['imagem']);

    
    $erro = array();
    if(empty($nome))
        $erro[] = "Preencha o título";
    
    if(empty($email))
        $erro[] = "Preencha a descrição curta";

    if(empty($telefone))
        $erro[] = "Preencha o preço";

    if(empty($profissao))
        $erro[] = "Preencha o conteúdo";

    if(empty($beneficiario))
        $erro[] = "Preencha o conteúdo";

    /*
    if(count($erro) == 0) {
        $imagemAlterada = false;
        if (isset($_FILES['imagem']) && isset($_FILES['imagem']['size']) && $_FILES['imagem']['size'] > 0) {
            $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
            $imagemAlterada = true;
        } else {
            $deu_certo = true;
        }
    */
    if(count($erro) == 0) {
        $imagemAlterada = false;
        $deu_certo = true; // Defina uma flag para indicar se o upload da imagem foi bem-sucedido
        if (isset($_FILES['imagem']) && isset($_FILES['imagem']['size']) && $_FILES['imagem']['size'] > 0) {
            // Processar a imagem e obter o nome do arquivo
            $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
            $imagemAlterada = true;
        }

        if($deu_certo !== false) {
                // Se a imagem foi alterada, atualize o nome da imagem no banco de dados
                $imagem = $imagemAlterada ? "'$deu_certo'" : "imagem"; // Use o nome da imagem nova ou mantenha o nome atual no banco de dados
            /*
            if($imagemAlterada)
            */
                $sql_code = "UPDATE voluntario SET 
                    nome ='$nome',
                    email ='$email',
                    telefone = '$telefone',
                    profissao = '$profissao',
                    beneficiario = '$beneficiario',
                    imagem = '$deu_certo'
                WHERE id = '$id'";
            /*
            else
            $sql_code = "UPDATE voluntario SET 
                    nome ='$nome',
                    email ='$email',
                    telefone = '$telefone',
                    profissao = '$profissao',
                    beneficiario = '$beneficiario',
            WHERE id = '$id'";
            */
            $inserido = $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else {
                die("<script>location.href=\"index.php?p=gerenciarvoluntario\";</script>");
            }

        } else 
            $erro[] = "Falha ao enviar a imagem";

    }
}

$sql_query = $mysqli->query("SELECT * FROM voluntario WHERE id = '$id'") or die($mysqli->error);
$voluntario = $sql_query->fetch_assoc();

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar voluntario</h4>
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
                            Gerenciar voluntários
                        </a>
                    </li>
                    <li class="breadcrumb-item">Cadastrar voluntario</li>
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
                                    <input type="text" value="<?php echo $voluntario['nome']; ?>" name="nome" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="text" value="<?php echo $voluntario['email']; ?>" name="email" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">telefone</label>
                                    <input type="text" value="<?php echo $voluntario['telefone']; ?>" name="telefone" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">profissão</label>
                                    <input type="text" value="<?php echo $voluntario['profissao']; ?>" name="profissao" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">beneficiario</label>
                                    <input type="text" value="<?php echo $voluntario['beneficiario']; ?>" name="beneficiario" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Imagem</label>
                                    <input type="file" name="imagem" class="form-control">
                                </div>  
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciarvoluntario" class="btn btn-primary btn-round" style="background-color: #000000;"><i class="ti-arrow-left"></i> Voltar</a>
                                <button type="submit" name="enviar" value="1" class="btn btn-success btn-round float-right" style="background-color: #CC7E65;"><i class="ti-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_voluntario = "SELECT * FROM voluntario";
$sql_query = $mysqli->query($sql_voluntario) or die($mysqli->error);
$num_voluntario = $sql_query->num_rows;

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Gerenciar Parceiros</h4>
                    <span>Administre os voluntários cadastrados</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Voluntário</a>
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
                <div class="card-header">
                    <h5>Todos os Voluntários</h5>
                    <span><a href="index.php?p=cadastrarvoluntario">Clique aqui</a> para cadastrar um voluntario</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>beneficiario</th>
                                    <th>Imagen</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_voluntario == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum voluntario foi cadastrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($voluntario = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $voluntario['id']; ?></th>
                                            <td><?php echo $voluntario['nome']; ?></td>
                                            <td><?php echo $voluntario['email']; ?></td>
                                            <td><?php echo $voluntario['beneficiario']; ?></td>
                                            <td><img src="<?php echo $voluntario['imagem']; ?>" height="50" alt=""></td>
                                            <td><a href="index.php?p=editarvoluntario&id=<?php echo $voluntario['id']; ?>">editar</a> | <a href="index.php?p=deletarvoluntario&id=<?php echo $voluntario['id']; ?>">deletar</a></td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
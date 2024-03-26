<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_parceiro = "SELECT * FROM parceiro";
$sql_query = $mysqli->query($sql_parceiro) or die($mysqli->error);
$num_parceiro = $sql_query->num_rows;

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Gerenciar Parceiros</h4>
                    <span>Administre os parceiros cadastrados</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Parceiro</a>
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
                    <h5>Todos os Parceiros</h5>
                    <span><a href="index.php?p=cadastrarparceiro">Clique aqui</a> para cadastrar um Parceiro</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Qual apoio</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_parceiro == 0) { ?>
                                <tr>
                                    <td colspan="5">Nenhum Parceiro foi cadastrado</td>
                                </tr>
                                <?php } else {
                                    
                                    while ($parceiro = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $parceiro['id']; ?></th>
                                            <td><?php echo $parceiro['nome']; ?></td>
                                            <td><?php echo $parceiro['email']; ?></td>
                                            <td><?php echo $parceiro['tipoajuda']; ?></td>
                                            <td><a href="index.php?p=editarparceiro&id=<?php echo $parceiro['id']; ?>">editar</a> | <a href="index.php?p=deletarparceiro&id=<?php echo $parceiro['id']; ?>">deletar</a></td>
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
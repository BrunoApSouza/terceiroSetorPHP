<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

// Verifica se foi enviado o filtro por data
if(isset($_POST['filtrar'])) {
    $data_filtro = $_POST['data_filtro'];

    // Modifica a consulta SQL para incluir a cláusula WHERE com o filtro por data
    $sql_relatorios = "SELECT a.id, a.dataacaoescolha, p.tipoajuda, u.email as user, v.nome as nomev, v.email as emailv, v.profissao as profv, v.beneficiario as benev, p.nome as nomep, p.email as emailp, p.telefone as telep, p.profissao as profp 
                      FROM parceiro p 
                      JOIN acaofeita a ON p.id = a.idparceiro 
                      JOIN voluntario v ON a.idvoluntario = v.id 
                      JOIN usuarios u ON a.idusuario = u.id
                      WHERE DATE(a.dataacaoescolha) = '$data_filtro'";
} else {
    // Consulta padrão sem filtro por data
    $sql_relatorios = "SELECT a.id, a.dataacaoescolha, p.tipoajuda, u.email as user, v.nome as nomev, v.email as emailv, v.profissao as profv, v.beneficiario as benev, p.nome as nomep, p.email as emailp, p.telefone as telep, p.profissao as profp 
                      FROM parceiro p 
                      JOIN acaofeita a ON p.id = a.idparceiro 
                      JOIN voluntario v ON a.idvoluntario = v.id 
                      JOIN usuarios u ON a.idusuario = u.id";
}

$sql_query = $mysqli->query($sql_relatorios) or die($mysqli->error);
$num_relatorios = $sql_query->num_rows;

?>

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Relatórios</h4>
                    <span>Visualize as Solicitações</span>
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
                    <li class="breadcrumb-item"><a href="#!">Relatório</a>
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
                    <h5>Relatório</h5>
                    <span>Examine o relatório de Solicitações do sistema</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <!-- Formulário de filtro por data -->
                    <!-- Formulário de filtro por data -->
                    <form action="" method="post" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <label for="data_filtro" class="mr-2">Filtrar por Data:</label>
                            <input type="date" name="data_filtro" class="form-control">
                        </div>
                        <button type="submit" name="filtrar" class="btn btn-primary btn-round float-right" style="background-color: #CC7E65;">Filtrar</button>
                    </form>

                        <!-- Tabela de relatórios -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data Solicitação</th>
                                    <th>Tipo de Apoio</th>
                                    <th>Usuário solicitante </th>
                                    <th>Nome do voluntário</th>
                                    <th>e-mail do voluntário</th>
                                    <th>Profissão do voluntário</th>
                                    <th>Beneficiário</th>
                                    <th>Nome do parceiro</th>
                                    <th>e-mail do parceiro</th>
                                    <th>Contato do parceiro</th>
                                    <th>Profissão do parceiro</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_relatorios == 0) { ?>
                                <tr>
                                    <td colspan="12">Nenhum relatório foi encontrado</td>
                                </tr>
                                <?php } else {
                                    while ($relatorio = $sql_query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $relatorio['id']; ?></th>
                                            <td><?php echo date("d/m/Y H:i", strtotime($relatorio['dataacaoescolha'])); ?></td>
                                            <td><?php echo $relatorio['tipoajuda']; ?></td>
                                            <td><?php echo $relatorio['user']; ?></td>
                                            <td><?php echo $relatorio['nomev']; ?></td>
                                            <td><?php echo $relatorio['emailv']; ?></td>
                                            <td><?php echo $relatorio['profv']; ?></td>
                                            <td><?php echo $relatorio['benev']; ?></td>
                                            <td><?php echo $relatorio['nomep']; ?></td> 
                                            <td><?php echo $relatorio['emailp']; ?></td>
                                            <td><?php echo $relatorio['telep']; ?></td>
                                            <td><?php echo $relatorio['profp']; ?></td>
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

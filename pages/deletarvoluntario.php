<?php

include("lib/conexao.php");
include('lib/protect.php');
protect(1);
$id = intval($_GET['id']);

$mysql_query = $mysqli->query("SELECT * FROM voluntario WHERE id = '$id'") or die($mysqli->error);
$voluntario = $mysql_query->fetch_assoc();

if(unlink($voluntario['imagem'])) {
    $mysqli->query("DELETE FROM voluntario WHERE id = '$id'") or die($mysqli->error);
}

die("<script>location.href=\"index.php?p=gerenciarvoluntario\";</script>");
<?php

include("lib/conexao.php");
include('lib/protect.php');
protect(1);
$id = intval($_GET['id']);

$mysql_query = $mysqli->query("DELETE FROM parceiro WHERE id = '$id'") or die($mysqli->error);

die("<script>location.href=\"index.php?p=gerenciarparceiro\";</script>");
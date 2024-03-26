<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(0);

if(!isset($_SESSION))
    session_start();

$pagina = "inicial.php";
if(isset($_GET['p'])) {
    $pagina = $_GET['p'] . ".php";
}

$id_usuario = $_SESSION['usuario'];
$sql_query_admin = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_usuario'") or die($mysqli->error);
$dados_usuario = $sql_query_admin->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ruas Solidárias</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/logo_preto_salmao.png" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="assets/images/logo_preto_salmao.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) { ?>
                           <!-- Comentario Bruno - não vou usar notificação por enquanto -->     
                           <!-- <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-money"></i>
                                    <span class="badge bg-c-pink"></span> <?php echo number_format($dados_usuario['creditos'], 2, ',', '.'); ?>
                                </a>
                            </li> -->
                            <?php } ?>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <span><?php echo $dados_usuario['nome']; ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="index.php?p=perfil">
                                            <i class="ti-user"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) { ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=voluntario">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-thumb-up"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ver voluntários</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=parceiro">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-thumb-up"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Solicitar parceria</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=acaocadastrada">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-control-play"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ações Solicitadas</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="logout.php">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-arrow-left"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php } else { ?>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme1">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index.php">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=cadastrarusuario">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Cadastrar Usuário</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=gerenciarusuario">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Gerenciar Usuário</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=cadastrarparceiro">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-thumb-up"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Cadastrar Parceiro</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=gerenciarparceiro">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-pencil-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Gerenciar Parceiro</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=cadastrarvoluntario">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-thumb-up"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Cadastrar voluntário</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=gerenciarvoluntario">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-pencil-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Gerenciar Voluntário</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="index.php?p=relatorio">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-file"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Relatório</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="logout.php">
                                        <span class="pcoded-micon" style="background-color: #CC7E65;"><i class="ti-arrow-left"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php } ?>
                        </div>
                        
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php include('pages/' . $pagina); ?>
                                </div>
                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>

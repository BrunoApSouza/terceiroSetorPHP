<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $profissao = $_POST['profissao'];
    $tipoajuda = $_POST['tipoajuda'];
    
    // Construa a mensagem de e-mail
    $mensagem = "Nome: $nome\n";
    $mensagem .= "Email: $email\n";
    $mensagem .= "Telefone: $telefone\n";
    $mensagem .= "Profissão: $profissao\n";
    $mensagem .= "tipoajuda: $tipoajuda\n";

    // Endereço de e-mail para onde você deseja enviar os dados do formulário
    $para = "gerencial@projetombaruasol.website";

    // Assunto do e-mail
    $assunto = "Ruas Solidárias Parceiro";

    // Cabeçalhos do e-mail
    $cabecalhos = "MIME-Version: 1.0\r\n";
    $cabecalhos .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar o e-mail
    mail($para, $assunto, $mensagem, $cabecalhos);

    // Redirecionar de volta para a página do formulário
    header('Location: pages/sucesso.php?success=1');
    exit;
} else {
    // Se o método de requisição não for POST, redirecione para a página inicial
    header('Location: pages/erro.php?error=0');
    exit;
}
?>

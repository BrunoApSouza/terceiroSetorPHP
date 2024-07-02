<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $profissao = $_POST['profissao'];
    $beneficiario = $_POST['beneficiario'];
    $imagem = $_FILES['imagem']['name']; // Nome do arquivo de imagem
    
    // Construa a mensagem de e-mail
    $mensagem = "Nome: $nome\n";
    $mensagem .= "Email: $email\n";
    $mensagem .= "Telefone: $telefone\n";
    $mensagem .= "Profissão: $profissao\n";
    $mensagem .= "beneficiario: $beneficiario\n";
    $mensagem .= "imagem: $imagem\n";

        // Verifique se uma imagem foi enviada
        if (!empty($imagem)) {
            $mensagem .= "Imagem: $imagem\n";
        } else {
            $mensagem .= "Imagem: Nenhuma imagem enviada\n";
        }

    // Endereço de e-mail para onde você deseja enviar os dados do formulário
    $para = "gerencial@projetombaruasol.website";

    // Assunto do e-mail
    $assunto = "Ruas Solidárias Voluntário";

    // Enviar o e-mail
    mail($para, $assunto, $mensagem);

    // Redirecionar de volta para a página do formulário
    header('Location: enviaremailvoluntario.php?success=1');
} else {
    // Se o método de requisição não for POST, redirecione para a página inicial
    header('Location: index.php?error=1');
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $profissao = $_POST['profissao'];
    $beneficiario = $_POST['beneficiario'];
    
    // Verifica se uma imagem foi enviada
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Nome do arquivo de imagem
        $imagem_nome = $_FILES['imagem']['name'];
        // Caminho temporário do arquivo de imagem
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        
        // Abre o arquivo de imagem para leitura
        $handle = fopen($imagem_tmp, "r");
        // Lê o conteúdo do arquivo de imagem
        $conteudo_imagem = fread($handle, filesize($imagem_tmp));
        // Fecha o arquivo de imagem
        fclose($handle);
        
        // Codifica o conteúdo da imagem em base64
        $imagem_base64 = chunk_split(base64_encode($conteudo_imagem));
        
        // Construa a mensagem de e-mail com o conteúdo principal antes do anexo
        $mensagem = "--PHP-mixed-boundary\r\n";
        $mensagem .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
        $mensagem .= "Content-Transfer-Encoding: 8bit\r\n";
        $mensagem .= "\r\n";
        $mensagem .= "Nome: $nome\n";
        $mensagem .= "Email: $email\n";
        $mensagem .= "Telefone: $telefone\n";
        $mensagem .= "Profissão: $profissao\n";
        $mensagem .= "Beneficiário: $beneficiario\n\n";
        $mensagem .= "--PHP-mixed-boundary\r\n";
        $mensagem .= "Content-Type: image/jpeg\r\n";
        $mensagem .= "Content-Transfer-Encoding: base64\r\n";
        $mensagem .= "Content-Disposition: attachment; filename=\"$imagem_nome\"\r\n";
        $mensagem .= "\r\n";
        $mensagem .= $imagem_base64 . "\r\n";
        $mensagem .= "--PHP-mixed-boundary--";
        
        // Endereço de e-mail para onde você deseja enviar os dados do formulário
        $para = "gerencial@projetombaruasol.website";

        // Assunto do e-mail
        $assunto = "Ruas Solidárias Voluntário";

        // Cabeçalhos do e-mail
        $cabecalhos = "MIME-Version: 1.0\r\n";
        $cabecalhos .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-boundary\"\r\n";
        
        // Enviar o e-mail
        mail($para, $assunto, $mensagem, $cabecalhos);

        // Redirecionar de volta para a página do formulário
        header('Location: pages/sucesso.php?success=1');
    } else {
        // Se nenhum arquivo de imagem foi enviado, enviar e-mail sem anexo
        $mensagem = "Nome: $nome\n";
        $mensagem .= "Email: $email\n";
        $mensagem .= "Telefone: $telefone\n";
        $mensagem .= "Profissão: $profissao\n";
        $mensagem .= "Beneficiário: $beneficiario\n";

        // Endereço de e-mail para onde você deseja enviar os dados do formulário
        $para = "gerencial@projetombaruasol.website";

        // Assunto do e-mail
        $assunto = "Ruas Solidárias Voluntário";

        // Cabeçalhos do e-mail
        $cabecalhos = "MIME-Version: 1.0\r\n";
        $cabecalhos .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Enviar o e-mail sem anexo
        mail($para, $assunto, $mensagem, $cabecalhos);

        // Redirecionar de volta para a página do formulário
        header('Location: pages/sucesso.php?success=1');
    }
} else {
    // Se o método de requisição não for POST, redirecione para a página inicial
    header('Location: pages/erro.php?error=0');
}
?>

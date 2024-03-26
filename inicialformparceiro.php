<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja um Parceiro</title>
    <style>
        .logo {
            width: 100%;
            max-width: 150px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- espaçamento-->
    <div style="height: 40px;"></div>

    <!-- Seja um Parceiro -->
        <div class="card-body" style="background-color: #ffffff;" id="seja_parceiro">
            <div class="row align-items-center">
                <!-- Coluna para o logo -->
                <div class="col-md-6" style="display: flex; align-items: center;">
                    <img src="imginicialform/logo_preto_salmao.png" class="logo">
                    <p style="margin-left: 5px; font-size: 20px; font-weight: bold;">Seja um Parceiro</p> 
                </div>
            </div>
            <p>Buscamos parcerias com empresas que compartilham de sua missão de transformar a vida de pessoas em situação de rua através da capacitação profissional<br> e da inserção no mercado de trabalho. Nos mande um e-mail e nos conte como a sua empresa ou você mesmo possa contribuir com a gente.</p>
            <!-- FORMULÁRIO -->
            <form action="inicialformparceiro.php" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="nome" style="margin-bottom: 5px;">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe o seu nome" required style="width: 80%; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    
                    <label for="email" style="margin-bottom: 5px;">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Informe o e-mail para entrarmos em contato" required style="width: 80%; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    
                    <label for="telefone" style="margin-bottom: 5px;">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" placeholder="Informe o telefone para entrarmos em contato" required style="width: 80%; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    
                    <label for="profissao" style="margin-bottom: 5px;">Profissão:</label>
                    <input type="text" id="profissao" name="profissao" placeholder="Informe o ramo de trabalho" required style="width: 80%; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    
                    <label for="tipoajuda" style="margin-bottom: 5px;">Qual o apoio (descrição breve):</label>
                    <input type="text" id="tipoajuda" name="tipoajuda" placeholder="Qual o apoio, ajuda, etc. (descrição breve)" required style="width: 80%; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    
                    <input type="submit" value="Enviar" style="width: 15%; background-color: #CC7E65; border-radius: 5px;">
                </div>
            </form>
        </div>
</body>
</html>

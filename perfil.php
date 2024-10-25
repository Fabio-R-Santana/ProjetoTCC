<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    if(isset($_POST['submit']))
     { 

        include_once('config.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,telefone) VALUES ('$nome','$email','$senha','$telefone')");

        header('Location: login.php');


        //print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        //print_r('Email: ' . $_POST['email']);
        //print_r('<br>');
        //print_r('Telefone: ' . $_POST['telefone']);
        //print_r('<br>');
 
        
    }
?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfilCSS.css">
    <link rel="stylesheet" href="style.css">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap">
    <!-- Link para a fonte "Open Sans" hospedada no Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Link para a biblioteca de ícones Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<header>
        <nav class="menu-lateral">

            <div class="btn-expandir">
            <i class="bi bi-list"></i>
            </div>
            <ul>
                <li class="item-menu">
                    <a href="index.php">
                        <span class="icon"><i class="bi bi-house-door"></i></span>
                        <span class="tct-link">Homepage</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="perfil.php">
                        <span class="icon"><i class="bi bi-person-circle"></i></span>
                        <span class="tct-link">Perfil</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="Formulario.php">
                        <span class="icon"><i class="bi bi-person-fill-gear"></i></span>
                        <span class="tct-link">Login</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="Calendario.php">
                        <span class="icon"><i class="bi bi-calendar"></i></span>
                        <span class="tct-link">Calendario</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-book"></i></span>
                        <span class="tct-link">Turmas</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-gear"></i></i></span>
                        <span class="tct-link">Configurações</span>
                    </a>
                </li>
            </ul>

        </nav>
</header>
    <form action="perfil.php" method="POST">
        <div class="container">
        <!-- Inicia uma <div> com a classe "container" para estruturar o layout -->

            <h2>Perfil do Usuário</h2>

            <!-- Inicia uma <div> com a classe "imagem-perfil" para a seção da imagem de perfil -->
            <div class="imagem-perfil">
            <img id="imagem-perfil" src="https://via.placeholder.com/150" alt="Imagem do Perfil">
                <!-- Adiciona uma imagem com o ID "imagem-perfil", usando um URL de placeholder -->
            </div>


            <!-- Inicia uma <div> com a classe "icone-editar" e ID "editar-imagem" para o ícone de edição -->
            <div class="icone-editar" id="editar-imagem">
            <i class="fas fa-pencil-alt"></i>
                <!-- Adiciona um ícone de lápis (editar) usando a biblioteca Font Awesome -->
            </div>


            <!-- Inicia uma <div> com a classe "icone-excluir" e ID "excluir-imagem" para o ícone de exclusão -->
            <div class="icone-excluir" id="excluir-imagem">
            <i class="fas fa-times"></i>
                <!-- Adiciona um ícone de "x" (excluir) usando a biblioteca Font Awesome -->
            </div>



            <!-- Inicia uma <div> com a classe "input-arquivo" para o campo de carregamento de arquivo -->
                <div class="input-arquivo">
                <input type="file" id="carregar-imagem" accept="image/*">
                <!-- Adiciona um campo de entrada para arquivos, aceitando apenas imagens -->
            </div>



            <!-- Inicia uma <div> com a classe "informacoes-perfil" para as informações do perfil -->
            <div class="informacoes-perfil">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" placeholder="Nome do Usuário" name="nome">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="usuario@email.com" name="email">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" placeholder="(11) 99999-9999" name="telefone">
            </div>



            <!-- Inicia uma <div> com a classe "botoes" para os botões de ação -->
            <div class="botoes">
                <input type="submit" id="botao-salvar" name="submit" class="botao-salvar">
                <button>Salvar Alterações</button>
                <button id="botao-cancelar">Cancelar</button>
            </div>
        </div>
    </form>
    <script src="perfilScript.js"></script>
    
</body>
</html>

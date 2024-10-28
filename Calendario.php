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

    // Carregar eventos da sessão
    $eventosDaSessao = isset($_SESSION['eventos']) ? $_SESSION['eventos'] : [];

    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Calendario.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link para a biblioteca de ícones bootstrap icons -->
    <title>MonTask</title>
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
                    <a href="turmas.php">
                        <span class="icon"><i class="bi bi-book"></i></span>
                        <span class="tct-link">Turmas</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="logout.php">
                        <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                        <span class="tct-link">Logout</span>
                    </a>
                </li>
            </ul>

        </nav>
</header>

   <!-- Container principal -->
   <div class="container">
       
       <h1>Calendário</h1>

       <!-- Cabeçalho do calendário com botões de navegação e botão para criar novos eventos -->
       <div class="cabecalho-calendario">
           <button id="mesAnterior">&#10094;</button> <!-- Botão para visualizar o mês anterior -->
           <h2 id="mesAno"></h2> <!-- Exibe o mês e ano atuais -->
           <button id="proximoMes">&#10095;</button> <!-- Botão para visualizar o próximo mês -->
           <button id="botaoNovoEvento">Novo Evento</button> <!-- Botão para criar um novo evento -->
       </div>

       <!-- Conteúdo principal dividido entre a grade do calendário e o mural de eventos -->
       <div class="main-content">
           <div class="grid-calendario" id="calendarioGrid"></div> <!-- Grade do calendário -->
           <div class="mural-eventos" id="muralEventos"></div> <!-- Mural de eventos -->
       </div>

       <!-- Formulário para criar ou editar eventos -->
       <div class="formulario-evento" id="formularioEvento" method="POST" action="salvar_evento.php">
           <h3>Criar Novo Evento</h3>
           <form>
               <!-- Campo para o título do evento -->
               <label for="titulo">Título:</label>
               <input type="text" id="titulo" name="titulo"><br><br>
               
               <!-- Campo para a data do evento -->
               <label for="data">Data:</label>
               <input type="date" id="data" name="data"><br><br>
               
               <!-- Campo para a descrição do evento -->
               <label for="descricao">Descrição:</label>
               <textarea id="descricao" name="descricao"></textarea><br><br>
               
               <!-- Botão para enviar o formulário -->
               <button type="submit">Criar Evento</button>
           </form>
       </div>

       <!-- Seção para detalhes do evento (não utilizado no código atualizado) -->
       <div class="detalhes-evento" id="detalhesEvento"></div>
   </div>

   <!-- Link para o arquivo JavaScript -->
   <script src="Calendario.js"></script>
   <script>
    // Adicione isso após declarar a variável 'eventos' no JavaScript
    let eventosDaSessao = <?php echo json_encode($eventosDaSessao); ?>;

    // Combine os eventos existentes com os eventos da sessão
    eventos = [...eventos, ...eventosDaSessao];
   </script>
</body>
</html>

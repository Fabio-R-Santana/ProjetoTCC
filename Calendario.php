<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Calendario.css">
    <title>MonTask</title>
</head>
<body>

    <header>
        <div class="logoM">
            <img src="MontaskLOGO2.png" alt="Logo do Site">
            <nav>
                <ul>
                    <li> <a href="Calendario.php"> Calendário </a></li>
                    <li> <a href="Formulario.php"> Login </a></li>
                    <li> <a href="index.php"> Home </a></li>
                    <li> <a href="perfil.phtml"> Perfil </a></li>
                </ul>
            </nav>
        </div>
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
       <div class="formulario-evento" id="formularioEvento">
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
</body>
</html>

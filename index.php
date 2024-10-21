<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <main>
        <div class="container_homepage">
            <div class="conteudo_container">
                <img src="imagemhomepage.png" alt="img_home" id="img_home" class="IMGhomepage">
                <h1>Pagina Inicial</h1>
                <div id="searchMenu">
                    <label for="searchInput">Buscar informações:</label>
                    <input type="text" id="searchInput" placeholder="Digite aqui...">
                    <button onclick="buscarInformacoes()" id="buscar">Buscar</button>
                </div>
                <div id="noResult" class="hidden">
                    <p>Nenhum resultado encontrado.</p>
                </div>
                <button onclick="voltarParaHomepage()" id="voltarParaHome">Voltar para a Homepage</button>
            </div>
        </div>
    </main>
    <div class="container">
        <div id="section1" class="section">
            <!-- Conteúdo da seção 1 -->
            <h2>Seção 1</h2>
            <p>Conteúdo da Seção 1</p>
        </div>
        <div id="section2" class="section">
            <!-- Conteúdo da seção 2 -->
            <h2>Seção 2</h2>
            <p>Conteúdo da Seção 2</p>
        </div>
        <div id="section3" class="section">
            <!-- Conteúdo da seção 3 -->
            <h2>Seção 3</h2>
            <p>Conteúdo da Seção 3</p>
        </div>
    </div>

    <script src="home.js"></script>

    <section class="container_descricao">
        <section class="conteudo_container_descricao">
            <h2>Quem nós somos?</h2>
            <p>Nosso site é uma plataforma inovadora projetada por estudantes para facilitar a organização e gestão de tarefas escolares. Com um foco claro em melhorar a eficiência tanto para professores quanto para alunos, oferecemos uma solução intuitiva e poderosa para acompanhar e completar as tarefas de sala de aula de maneira eficaz.</p>
            <ul>
                <h2>Recursos Principais</h2>
                <li>Gestão Centralizada de Tarefas: Os professores podem facilmente atribuir tarefas, definir prazos e detalhar instruções diretamente na plataforma. Para os alunos, o sistema proporciona uma visão clara das tarefas pendentes, ajudando-os a priorizar suas atividades e evitar esquecimentos.</li>
                <br>
                <li>Notificações e Lembretes: Mantenha-se atualizado com notificações instantâneas sobre novas tarefas atribuídas, prazos iminentes e atualizações importantes. Nunca mais perca um prazo importante ou esqueça de uma tarefa essencial.</li>
            </ul>
        </section>
        <section class="imagem_container_descricao">
            <img src="MontaskLOGO2.png" alt="" srcset="">
        </section>
    </section>
</header>
</body>
</html>
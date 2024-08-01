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
            <img src="IMGmontask.png" alt="Logo do Site">
            <nav>
                <ul>
                    <li> <a href="Calendario.php"> Calendário </a></li>
                    <li> <a href="Formulario.php"> Login </a></li>
                    <li> <a href="index.php"> Home </a></li>
                </ul>
            </nav>  
        </div>
    </header>

    <div class="container">
        <h1>MonTask</h1>
        <div id="informacoes-aluno">
        </div>

        <button onclick="visualizarAgendaAluno()">Visualizar Agenda do Aluno</button>
        <button onclick="exibirFormulario('prova')">Agendar Prova</button>
        <button onclick="exibirFormulario('sala')">Agendar Sala</button>
        
        <!-- Formulário de Agendamento -->
        <div id="form-agendamento" style="display: none;">
            <h2>Formulário de Agendamento</h2>
            <label for="date">Selecione uma data:</label>
            <input type="date" id="date">
            <br>
            <label for="time">Selecione um horário:</label>
            <input type="time" id="time">
            <br>
            <label for="comment">Comentário:</label>
            <textarea id="comment" rows="4" cols="50"></textarea>
            <br>
            <button onclick="agendar()">Agendar</button>
        </div>
    </div>

    <h1>Calendário</h1>
    <div id="calendar-container">
        <div id="calendar-header">
            <button id="mes-anterior">Anterior</button>
            <h2 id="calendar-month-year"></h2>
            <button id="proximo-mes">Próximo</button>
        </div>
        <table class="calendario">
            <thead>
                <tr>
                    <th>Dom</th>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sáb</th>
                </tr>
            </thead>
            <tbody id="calendar-body">
                
            </tbody>
        </table>
    </div>

    <!-- Modal para Adicionar Comentário ou Arquivo -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Adicionar Comentário ou Arquivo</h2>
            <textarea id="comment-modal" placeholder="Digite seu comentário"></textarea>
            <center><input type="file" id="file-modal"></center>
            <button id="save-button-modal">Salvar</button>
        </div>
    </div>

    <script>
        // Função para exibir o formulário de agendamento
        function exibirFormulario(tipo) {
            const formAgendamento = document.getElementById('form-agendamento');
            
            // Define o título do formulário de acordo com o tipo de agendamento
            if (tipo === 'prova') {
                document.getElementById('form-agendamento').getElementsByTagName('h2')[0].innerText = 'Agendar Prova';
            } else if (tipo === 'sala') {
                document.getElementById('form-agendamento').getElementsByTagName('h2')[0].innerText = 'Agendar Sala';
            }

            // Exibe o formulário
            formAgendamento.style.display = 'block';
        }

        // Função para agendar o compromisso
        function agendar() {
            var data = document.getElementById("date").value;
            var hora = document.getElementById("time").value;
            var comentario = document.getElementById("comment").value;

            // Aqui você pode enviar os dados para o servidor para processamento
            // Por simplicidade, vamos apenas exibir as informações no console
            console.log("Data: " + data);
            console.log("Hora: " + hora);
            console.log("Comentário: " + comentario);

            // Limpar os campos após o agendamento
            document.getElementById("date").value = "";
            document.getElementById("time").value = "";
            document.getElementById("comment").value = "";

            alert("Compromisso agendado com sucesso!");
        }

        // Função para visualizar a agenda do aluno
        function visualizarAgendaAluno() {
            const informacoesAluno = document.getElementById('informacoes-aluno');

            // Verifica se as informações já estão visíveis ou não
            if (informacoesAluno.style.display === 'none' || informacoesAluno.style.display === '') {
                
                informacoesAluno.style.display = 'block';
                // Adiciona informações relevantes para os alunos
                informacoesAluno.innerHTML = `
                    <p>Olá, aluno!</p>
                    <p>Estas são as informações relevantes para você:</p>
                    <ul>
                        <li>Horário das aulas</li>
                        <li>Atividades extracurriculares</li>
                        <li>Provas e trabalhos</li>
                    </ul>
                `;
            } else {
                // Se já estiverem visíveis, oculta as informações
                informacoesAluno.style.display = 'none';
                informacoesAluno.innerHTML = ''; // Limpa o conteúdo
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            const calendarBody = document.getElementById("calendar-body");
            const monthYearDisplay = document.getElementById("calendar-month-year");
            const prevMonthButton = document.getElementById("mes-anterior");
            const nextMonthButton = document.getElementById("proximo-mes");
            const modal = document.getElementById("modal");
            const closeButton = document.querySelector(".close-button");
            const saveButton = document.getElementById("save-button-modal");
            const commentInput = document.getElementById("comment-modal");
            const fileInput = document.getElementById("file-modal");

            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();

            const generateCalendar = (month, year) => {
                calendarBody.innerHTML = "";
                const firstDay = new Date(year, month).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                monthYearDisplay.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;

               
                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement("tr");

                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement("td");
                        if (i === 0 && j < firstDay) {
                            cell.appendChild(document.createTextNode(""));
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            cell.appendChild(document.createTextNode(date));
                            cell.addEventListener("click", () => openModal(date, month, year));
                            date++;
                        }
                        row.appendChild(cell);
                    }

                    calendarBody.appendChild(row);
                }
            };

            const openModal = (date, month, year) => {
                modal.style.display = "block";
                saveButton.onclick = () => saveData(date, month, year);
            };

            const closeModal = () => {
                modal.style.display = "none";
            };

            const saveData = (date, month, year) => {
                const comment = commentInput.value;
                const file = fileInput.files[0];
                // Aqui você pode adicionar a lógica para salvar o comentário e o arquivo
                console.log(`Comentário para ${date}/${month + 1}/${year}: ${comment}`);
                if (file) {
                    console.log(`Arquivo para ${date}/${month + 1}/${year}: ${file.name}`);
                }
                closeModal();
            };

            prevMonthButton.addEventListener("click", () => {
                if (currentMonth === 0) {
                    currentMonth = 11;
                    currentYear--;
                } else {
                    currentMonth--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            nextMonthButton.addEventListener("click", () => {
                if (currentMonth === 11) {
                    currentMonth = 0;
                    currentYear++;
                } else {
                    currentMonth++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            closeButton.addEventListener("click", closeModal);
            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });

            generateCalendar(currentMonth, currentYear);
        });
    </script>

<div class="container">
        <h1>Calendário</h1> <!-- Título principal da página -->
        <div class="cabecalho-calendario">
            <button id="mesAnterior">&#10094;</button> <!-- Botão para o mês anterior com um ícone de seta -->
            <h2 id="mesAno"></h2> <!-- Título que exibirá o mês e o ano atual -->
            <button id="proximoMes">&#10095;</button> <!-- Botão para o próximo mês com um ícone de seta -->
            <button id="botaoNovoEvento">Novo Evento</button> <!-- Botão para adicionar um novo evento -->
        </div>
        <div class="grid-calendario" id="calendarioGrid"></div> <!-- Div que conterá a grade do calendário -->
        <div class="detalhes-evento" id="detalhesEvento"></div> <!-- Div que mostrará os detalhes de um evento selecionado -->
        <div class="formulario-evento" id="formularioEvento">
            <h3>Criar Novo Evento</h3> 
            <form>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo"><br><br> <!-- Campo para inserir o título do evento -->
                <label for="data">Data:</label>
                <input type="date" id="data" name="data"><br><br> <!-- Campo para inserir a data do evento -->
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao"></textarea><br><br> <!-- Campo para inserir a descrição do evento -->
                <button type="submit">Criar Evento</button> <!-- Botão para submeter o formulário e criar o evento -->
            </form>
        </div>
    </div>

    <script src="Calendario.js"></script> <!-- Inclusão do arquivo de script JavaScript -->

</body>
</html>

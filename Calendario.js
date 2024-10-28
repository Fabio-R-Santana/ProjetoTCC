// Obtém elementos HTML usando o método getElementById 
const calendarioGrid = document.getElementById('calendarioGrid'); // Elemento onde o calendário será exibido
const mesAno = document.getElementById('mesAno'); // Elemento para exibir o mês e ano atual
const mesAnterior = document.getElementById('mesAnterior'); // Botão para exibir o mês anterior
const proximoMes = document.getElementById('proximoMes'); // Botão para exibir o próximo mês
const detalhesEvento = document.getElementById('detalhesEvento'); // Elemento para exibir detalhes do evento (não utilizado no código atualizado)
const formularioEvento = document.getElementById('formularioEvento'); // Formulário para adicionar ou editar eventos
const botaoNovoEvento = document.getElementById('botaoNovoEvento'); // Botão para mostrar o formulário de novo evento
const muralEventos = document.getElementById('muralEventos'); // Elemento para exibir a lista de eventos

// Variáveis para armazenar dados e estado
let eventos = []; // Array para armazenar todos os eventos
let eventoEditando = null; // Armazena o índice do evento que está sendo editado (ou null se não houver evento em edição)

// Array com os nomes dos meses para exibição 
const nomesMeses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                   'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

// Função para gerar o calendário de um mês específico
function gerarCalendario(ano, mes) {
    calendarioGrid.innerHTML = ''; // Limpa o conteúdo anterior do calendário
    detalhesEvento.innerHTML = ''; // Limpa o conteúdo anterior dos detalhes do evento (não utilizado no código atualizado)

    // Obtém o número de dias no mês atual
    const diasNoMes = new Date(ano, mes + 1, 0).getDate(); // 'getDate()' retorna o número de dias no mês
    // Obtém o dia da semana do primeiro dia do mês (0 = Domingo)
    const primeiroDiaSemana = new Date(ano, mes, 1).getDay(); // 'getDay()' retorna o dia da semana (0 a 6)
    // Array com os nomes dos dias da semana abreviados
    const diasDaSemana = ['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB'];

    // Cria os elementos para os dias da semana no cabeçalho do calendário
    diasDaSemana.forEach(dia => { // Itera sobre cada nome de dia da semana
        const elementoDia = document.createElement('div'); // Cria um novo elemento HTML <div>
        elementoDia.classList.add('dia'); // Adiciona a classe 'dia' ao elemento para estilização
        elementoDia.textContent = dia; // Define o texto do elemento como o nome do dia
        calendarioGrid.appendChild(elementoDia); // Adiciona o elemento ao calendário
    });

    let contadorDia = 1; // Contador para os dias do mês

    // Loop para criar as células dos dias no calendário
    for (let i = 0; i < 6; i++) { // Loop para as linhas do calendário (máximo de 6)
        for (let j = 0; j < 7; j++) { // Loop para as colunas do calendário (dias da semana)
            const elementoDia = document.createElement('div'); // Cria um novo elemento HTML <div>
            elementoDia.classList.add('dia'); // Adiciona a classe 'dia' ao elemento

            // Calcula o número do dia para a célula atual
            const diaAtual = i * 7 + j - primeiroDiaSemana + 1;
            if (diaAtual > 0 && diaAtual <= diasNoMes) { // Verifica se o dia está dentro do mês
                elementoDia.textContent = diaAtual; // Define o texto do elemento como o dia do mês

                // Verifica se o dia atual é hoje
                const dataAtual = new Date();
                if (ano === dataAtual.getFullYear() && mes === dataAtual.getMonth() && diaAtual === dataAtual.getDate()) {
                    elementoDia.classList.add('hoje'); // Adiciona a classe 'hoje' se for o dia atual
                }

                // Verifica se há eventos neste dia e marca no calendário
                const dataComparacao = new Date(ano, mes, diaAtual); // Cria um objeto Date para a data do dia
                const evento = eventos.find(evento => {
                    const dataEvento = new Date(evento.data); // Cria um objeto Date para a data do evento
                    return dataEvento.toDateString() === dataComparacao.toDateString(); // Compara apenas a data (ignorando a hora)
                });

                if (evento) {
                    elementoDia.classList.add('evento'); // Adiciona a classe 'evento' se houver evento neste dia
                }

                contadorDia++; // Incrementa o contador de dias
            }
            calendarioGrid.appendChild(elementoDia); // Adiciona o elemento ao calendário
        }
    }

    // Define o texto do mês e ano no cabeçalho do calendário
    mesAno.textContent = `${nomesMeses[mes]} ${ano}`; // Exibe o nome do mês e o ano atual
    popularMuralEventos(); // Atualiza o mural de eventos
}

// Função para popular o mural de eventos com a lista de eventos
function popularMuralEventos() {
    muralEventos.innerHTML = ''; // Limpa o conteúdo do mural de eventos

    // Itera sobre a lista de eventos
    eventos.forEach((evento, index) => {
        const eventoDiv = document.createElement('div'); // Cria um novo elemento HTML <div> para o evento
        eventoDiv.classList.add('evento-item'); // Adiciona a classe 'evento-item' ao elemento para estilização
        eventoDiv.innerHTML = `
            <h4>${evento.titulo}</h4> <!-- Exibe o título do evento -->
            <p>${evento.descricao}</p> <!-- Exibe a descrição do evento -->
            <p>Data: ${evento.data.toLocaleDateString()}</p> <!-- Exibe a data do evento formatada -->
            <button class="edit" onclick="editarEvento(${index})">Editar</button> <!-- Botão para editar o evento -->
            <button onclick="excluirEvento(${index})">Excluir</button> <!-- Botão para excluir o evento -->
        `;
        muralEventos.appendChild(eventoDiv); // Adiciona o elemento ao mural de eventos
    });
}

// Função para adicionar um novo evento
function adicionarEvento(evento) {
    eventos.push(evento); // Adiciona o evento ao array de eventos
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para atualizar com o novo evento
}

// Função para excluir um evento
function excluirEvento(index) {
    eventos.splice(index, 1); // Remove o evento do array de eventos
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para atualizar sem o evento excluído
    popularMuralEventos(); // Atualiza o mural de eventos para refletir a exclusão
}

// Função para editar um evento
function editarEvento(index) {
    const evento = eventos[index]; // Obtém o evento a ser editado
    eventoEditando = index; // Define o índice do evento sendo editado
    document.getElementById('titulo').value = evento.titulo; // Define o campo de título no formulário
    document.getElementById('data').value = evento.data.toISOString().split('T')[0]; // Define o campo de data no formulário
    document.getElementById('descricao').value = evento.descricao; // Define o campo de descrição no formulário
    formularioEvento.style.display = 'block'; // Exibe o formulário de eventos
}

// Evento para mostrar o formulário de criação de novo evento
botaoNovoEvento.addEventListener('click', () => {
    formularioEvento.style.display = 'block'; // Exibe o formulário de eventos
    eventoEditando = null; // Garante que estamos criando um novo evento (não editando um existente)
});

// Evento de submit do formulário para criar ou atualizar um evento
formularioEvento.addEventListener('submit', (e) => {
    e.preventDefault(); // Previne o comportamento padrão do formulário (não recarrega a página)

    // Obtém os valores dos campos do formulário
    const titulo = document.getElementById('titulo').value.trim(); // Obtém e remove espaços do título
    const dataValue = document.getElementById('data').value; // Obtém o valor da data no formato 'yyyy-mm-dd'
    const descricao = document.getElementById('descricao').value.trim(); // Obtém e remove espaços da descrição

    // Valida se título e data foram preenchidos
    if (!titulo || !dataValue) {
        alert('Título e Data são obrigatórios.'); // Exibe um alerta se algum campo obrigatório estiver vazio
        return; // Interrompe a execução se a validação falhar
    }

    const data = new Date(dataValue + 'T00:00:00'); // Cria um objeto Date com a data do evento
    const evento = { data, titulo, descricao }; // Cria um objeto de evento

    // Adiciona ou atualiza o evento
    if (eventoEditando === null) {
        adicionarEvento(evento); // Adiciona um novo evento se não estamos editando um existente
    } else {
        eventos[eventoEditando] = evento; // Atualiza o evento existente
        eventoEditando = null; // Limpa a variável de edição
    }

    formularioEvento.style.display = 'none'; // Oculta o formulário de eventos após a submissão
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para refletir as mudanças
});

// Inicializa o ano e mês atuais
let anoAtual = new Date().getFullYear(); // Obtém o ano atual
let mesAtual = new Date().getMonth(); // Obtém o mês atual (0 a 11)

// Evento para ir para o mês anterior
mesAnterior.addEventListener('click', () => {
    mesAtual--; // Decrementa o mês
    if (mesAtual < 0) { // Verifica se o mês é menor que 0
        mesAtual = 11; // Define o mês para Dezembro
        anoAtual--; // Decrementa o ano
    }
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para o mês anterior
});

// Evento para ir para o próximo mês
proximoMes.addEventListener('click', () => {
    mesAtual++; // Incrementa o mês
    if (mesAtual > 11) { // Verifica se o mês é maior que 11
        mesAtual = 0; // Define o mês para Janeiro
        anoAtual++; // Incrementa o ano
    }
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para o próximo mês
});

// Gera o calendário inicial com o mês e ano atuais
gerarCalendario(anoAtual, mesAtual); // Chama a função para gerar o calendário inicial


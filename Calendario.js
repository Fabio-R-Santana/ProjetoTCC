const calendarioGrid = document.getElementById('calendarioGrid'); // Obtém o elemento HTML onde será exibido o calendário
const mesAno = document.getElementById('mesAno'); // Obtém o elemento HTML para exibir o mês e ano
const mesAnterior = document.getElementById('mesAnterior'); // Obtém o botão para o mês anterior
const proximoMes = document.getElementById('proximoMes'); // Obtém o botão para o próximo mês
const detalhesEvento = document.getElementById('detalhesEvento'); // Obtém o elemento HTML para exibir detalhes do evento
const formularioEvento = document.getElementById('formularioEvento'); // Obtém o formulário para adicionar novo evento
const botaoNovoEvento = document.getElementById('botaoNovoEvento'); // Obtém o botão para mostrar o formulário de novo evento

let eventos = []; // Array para armazenar os eventos

// Função para gerar o calendário de um mês específico
function gerarCalendario(ano, mes) {
    calendarioGrid.innerHTML = ''; // Limpa o conteúdo anterior do calendário
    detalhesEvento.innerHTML = ''; // Limpa os detalhes do evento

    // Obtém o número de dias no mês atual
    const diasNoMes = new Date(ano, mes + 1, 0).getDate(); // 'getDate()' retorna o número de dias no mês
    // Obtém o dia da semana do primeiro dia do mês (0 = Domingo)
    const primeiroDiaSemana = new Date(ano, mes).getDay(); // 'getDay()' retorna o dia da semana (0 a 6)

    // Array com os nomes dos dias da semana abreviados
    const diasDaSemana = ['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB'];

    // Cria os elementos para os dias da semana no cabeçalho do calendário
    for (let dia of diasDaSemana) {
        const elementoDia = document.createElement('div'); // Cria um novo elemento HTML <div>
        elementoDia.classList.add('dia'); // Adiciona a classe 'dia' ao elemento
        elementoDia.textContent = dia; // Define o texto do elemento como o nome do dia
        calendarioGrid.appendChild(elementoDia); // Adiciona o elemento ao calendário
    }

    let contadorDia = 1;
    // Loop para criar as células dos dias no calendário
    for (let i = 0; i < 6; i++) { // 'i' representa as linhas no calendário (máximo de 6)
        for (let j = 0; j < 7; j++) { // 'j' representa as colunas no calendário (dias da semana)
            const elementoDia = document.createElement('div'); // Cria um novo elemento HTML <div>
            elementoDia.classList.add('dia'); // Adiciona a classe 'dia' ao elemento

            if (i === 0 && j < primeiroDiaSemana) {
                elementoDia.textContent = ''; // Deixa em branco células fora do mês
            } else if (contadorDia > diasNoMes) {
                elementoDia.textContent = ''; // Deixa em branco células fora do mês
            } else {
                elementoDia.textContent = contadorDia; // Define o texto do elemento como o dia do mês atual

                // Marca o dia atual no calendário
                const dataAtual = new Date();
                if (ano === dataAtual.getFullYear() && mes === dataAtual.getMonth() && contadorDia === dataAtual.getDate()) {
                    elementoDia.classList.add('hoje'); // Adiciona a classe 'hoje' se for o dia atual
                }

                // Verifica se há eventos neste dia e marca no calendário
                const dataComparacao = new Date(ano, mes, contadorDia);
                const evento = eventos.find(evento => {
                    const dataEvento = new Date(evento.data);
                    return dataEvento.toDateString() === dataComparacao.toDateString(); // Compara apenas a data (ignorando a hora)
                });

                if (evento) {
                    elementoDia.classList.add('evento'); // Adiciona a classe 'evento' se houver evento neste dia

                    // Adiciona um evento de clique para mostrar detalhes do evento
                    elementoDia.addEventListener('click', () => {
                        detalhesEvento.innerHTML = `
                            <h3>${evento.titulo}</h3>
                            <p>Data: ${evento.data.toLocaleDateString()}</p>
                            <p>Descrição: ${evento.descricao}</p>
                        `;
                    });
                }

                contadorDia++;
            }
            calendarioGrid.appendChild(elementoDia); // Adiciona o elemento ao calendário
        }
    }

    // Define o texto do mês e ano no cabeçalho do calendário
    mesAno.textContent = `${nomesMeses[mes]} ${ano}`; // Exibe o nome do mês e o ano atual
}

// Array com os nomes completos dos meses
const nomesMeses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 
                   'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

// Obtém o ano e mês atuais
let anoAtual = new Date().getFullYear(); // Obtém o ano atual
let mesAtual = new Date().getMonth(); // Obtém o mês atual (0 a 11)

// Gera o calendário inicial com o mês atual
gerarCalendario(anoAtual, mesAtual);

// Evento para ir para o mês anterior
mesAnterior.addEventListener('click', () => {
    mesAtual--; // Decrementa o mês atual
    if (mesAtual < 0) {
        mesAtual = 11; // Volta para Dezembro se o mês atual for Janeiro
        anoAtual--; // Decrementa o ano se voltar um ano
    }
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário com o novo mês
});

// Evento para ir para o próximo mês
proximoMes.addEventListener('click', () => {
    mesAtual++; // Incrementa o mês atual
    if (mesAtual > 11) {
        mesAtual = 0; // Volta para Janeiro se o mês atual for Dezembro
        anoAtual++; // Incrementa o ano se avançar um ano
    }
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário com o novo mês
});

// Evento para mostrar o formulário de criação de evento
botaoNovoEvento.addEventListener('click', () => {
    formularioEvento.style.display = 'block'; // Exibe o formulário de criação de evento ao clicar no botão
});

// Evento de submit do formulário para criar um evento
formularioEvento.addEventListener('submit', (e) => {
    e.preventDefault(); // Previne o comportamento padrão do formulário (não recarrega a página)

    // Obtém os valores dos campos do formulário
    const titulo = document.getElementById('titulo').value; // Obtém o valor do campo de título
    const dataValue = document.getElementById('data').value; // Obtém o valor do campo de data no formato 'yyyy-mm-dd'
    const data = new Date(dataValue + 'T00:00:00'); // Cria um objeto Date com a data do evento
    const descricao = document.getElementById('descricao').value; // Obtém o valor do campo de descrição

    // Cria o objeto de evento com os dados fornecidos
    const evento = { data, titulo, descricao };
    eventos.push(evento); // Adiciona o evento ao array de eventos
    formularioEvento.style.display = 'none'; // Esconde o formulário após adicionar o evento
    gerarCalendario(anoAtual, mesAtual); // Regenera o calendário para atualizar com o novo evento
});

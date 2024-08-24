document.addEventListener("DOMContentLoaded", function() {
    let section1 = document.getElementById("section1");
    let section2 = document.getElementById("section2");
    let section3 = document.getElementById("section3");

    // Adicionar conteúdo dinâmico às seções
    section1.innerHTML = "<h2>Objetivo do Site</h2><p>Esse site é um organizador de tarefas desenvolvido para ajudar alunos e professores no dia a dia escolar</p>";
    section2.innerHTML = "<h2>Construção do Site</h2><p>O site está sendo desenvolvido baseado na agenda escolar de atividades e prova de forma dinâmica.</p>";
    section3.innerHTML = "<h2>Participantes</h2><ul><li>Felipe Eduardo Santana</li><li>Fábio Rafael Santana</li><li>Kalí Gomes de Freitas Costa</li><li>Emily Gabrieli Gomes Do Nascimento</li></ul>";
});

function buscarInformacoes() {
    let searchTerm = document.getElementById("searchInput").value.toLowerCase();
    let encontrouResultado = false;

    // Buscar nas seções da homepage
    let sections = document.querySelectorAll('.section');
    sections.forEach(function(section) {
        let content = section.textContent.toLowerCase();
        if (content.includes(searchTerm)) {
            section.style.display = "block";
            encontrouResultado = true;
            // Rolar para a seção encontrada
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            section.style.display = "none";
        }
    });

    // Buscar na descrição do site
    let descricao = document.querySelector('.conteudo_container_descricao').textContent.toLowerCase();
    let descricaoContainer = document.querySelector('.container_descricao');
    if (descricao.includes(searchTerm)) {
        descricaoContainer.style.display = "block";
        encontrouResultado = true;
        // Rolar para a descrição encontrada
        descricaoContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        descricaoContainer.style.display = "none";
    }

    // Atualizar o conteúdo da section2
    let section2 = document.getElementById("section2");
    let noResultDiv = document.getElementById("noResult");
    if (encontrouResultado) {
        // Se algum resultado foi encontrado, restaurar o conteúdo original da section2 e ocultar a mensagem de nenhum resultado
        section2.innerHTML = "<h2>Construção do Site</h2><p>O site está sendo desenvolvido baseado na agenda escolar de atividades e prova de forma dinâmica.</p>";
        noResultDiv.classList.add("hidden"); // Ocultar a mensagem de nenhum resultado
        document.getElementById('voltarParaHome').style.display = "block";
    } else {
        // Se nenhum resultado foi encontrado, exibir a mensagem na section2 e mostrar a mensagem de nenhum resultado
        section2.innerHTML = "<h2>Não foi encontrado nada referente a sua busca</h2><p>Não foi encontrado nada referente a sua busca.</p>";
        noResultDiv.classList.remove("hidden"); // Exibir a mensagem de nenhum resultado
        document.getElementById('voltarParaHome').style.display = "block";
    }
}

function voltarParaHomepage() {
    window.location.href = "Index.php"; // Redireciona para a homepage
}
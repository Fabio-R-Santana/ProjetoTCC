// Script para adicionar conteúdo dinâmico às seções
document.addEventListener("DOMContentLoaded", function() {
    var section1 = document.getElementById("section1");
    var section2 = document.getElementById("section2");
    var section3 = document.getElementById("section3");

    // Aqui você pode adicionar conteúdo dinâmico
    section1.innerHTML = "<h2>Objetivo do Site</h2><p>Esse site è um organizador de tarefas desenvolvido para ajudar alunos e professores no dia a dia escolar</p>";
    section2.innerHTML = "<h2>Construção do Site</h2><p>O site esta sendo desenvolvido baseados na agenda escolar de atividades e prova de forma dinamica.</p>";
    section3.innerHTML = "<h2>Participantes</h2><ul><li>Felipe Eduardo Santana</li><li>Fábio Rafael Santana</li><li>Kalí Gomes de Freitas Costa</li><li>Emily Gabrieli Gomes Do Nascimento</li></ul>";
});


function buscarInformacoes() {
    var searchTerm = document.getElementById("searchInput").value.toLowerCase();
    var encontrouResultado = false;

    // Buscar nas seções da homepage
    var sections = document.querySelectorAll('.section');
    sections.forEach(function(section) {
        var content = section.textContent.toLowerCase();
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
    var descricao = document.querySelector('.conteudo_container_descricao').textContent.toLowerCase();
    var descricaoContainer = document.querySelector('.container_descricao');
    if (descricao.includes(searchTerm)) {
        descricaoContainer.style.display = "block";
        encontrouResultado = true;
        // Rolar para a descrição encontrada
        descricaoContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        descricaoContainer.style.display = "none";
    }

    // Exibir ou ocultar o botão de voltar para a homepage
    if (encontrouResultado) {
        document.getElementById('voltarParaHome').style.display = "block";
    } else {
        document.getElementById('voltarParaHome').style.display = "none";
    }
}

function voltarParaHomepage() {
    window.location.href = "Home.php"; // Redireciona para a homepage
}
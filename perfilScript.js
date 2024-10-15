document.addEventListener('DOMContentLoaded', () => { // Adiciona um ouvinte de evento que executa a função quando o DOM estiver totalmente carregado
    const carregarImagem = document.getElementById('carregar-imagem'); // Seleciona o campo de input de arquivo pelo seu ID
    const excluirImagem = document.getElementById('excluir-imagem'); // Seleciona o botão para excluir a imagem pelo seu ID
    const imagemPerfil = document.getElementById('imagem-perfil'); // Seleciona o elemento de imagem do perfil pelo seu ID
    const editarImagem = document.getElementById('editar-imagem'); // Seleciona o botão para editar a imagem pelo seu ID

    carregarImagem.addEventListener('change', () => { // Adiciona um ouvinte de evento para o evento 'change' no campo de input de arquivo
        const arquivo = carregarImagem.files[0]; // Obtém o primeiro arquivo selecionado no input
        if (arquivo) { // Verifica se um arquivo foi selecionado
            const leitor = new FileReader(); // Cria um novo objeto FileReader para ler o conteúdo do arquivo
            leitor.onload = () => { // Define uma função para executar quando a leitura do arquivo estiver completa
                imagemPerfil.src = leitor.result; // Define o src da imagem do perfil como o resultado da leitura (a URL da imagem)
            };
            leitor.readAsDataURL(arquivo); // Lê o arquivo como uma URL de dados (Data URL)
        }
    });

    excluirImagem.addEventListener('click', () => { // Adiciona um ouvinte de evento para o evento 'click' no botão de excluir imagem
        imagemPerfil.src = 'https://via.placeholder.com/150'; // Define a imagem do perfil como uma imagem de placeholder padrão
        carregarImagem.value = ''; // Limpa o valor do input de arquivo (reseta o campo de upload)
    });

    editarImagem.addEventListener('click', () => { // Adiciona um ouvinte de evento para o evento 'click' no botão de editar imagem
        carregarImagem.click(); // Aciona o clique no campo de input de arquivo, abrindo o seletor de arquivos
    });
});

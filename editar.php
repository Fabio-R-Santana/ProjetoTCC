<?php
     if(isset($_POST['submit']))
      { 
 
         include_once('config.php');
         $nome = $_POST['nome'];
         $senha = $_POST['senha'];
         $email = $_POST['email'];
         $telefone = $_POST['telefone'];
         $permissao = $_POST['permissao'];
 
         $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,permissao) VALUES ('$nome','$senha','$email','$telefone','$permissao')");
 
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Link para a biblioteca de ícones Font Awesome -->
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #ffe3e3;
            background-image: url("https://www.transparenttextures.com/patterns/cartographer.png");
            color: #333;
            margin-top: 30px;  
        }
        
        .box {
            color: #000000;
            background-color: rgba(255, 255, 255, 1);
            padding: 20px;
            border-radius: 15px;
            width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        fieldset {
            border: 2px solid #cd0d19;
            padding: 20px;
            margin: 0;
        }
        legend {
            border: 1px solid #c40f09;
            padding: 8px 15px;
            background-color: #9e1614;
            color: white;
            border-radius: 8px;
            text-align: center;
        }
        .inputBox {
            margin-top: 15px;
            position: relative;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid #333;
            outline: none;
            width: 100%;
            font-size: 16px;
            padding: 8px 0;
        }
        .labelInput {
            position: absolute;
            top: 0;
            left: 0;
            transition: .5s;
            color: #666;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: #333;
        }
        #submit {
            background: linear-gradient(to right, #7e1010, #e90e0e);
            width: 100%;
            border: none;
            padding: 12px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            margin-top: 15px;
            transition: 2s ;
        }
        #submit:hover {
            background: linear-gradient(to right, #7e1010, #7e1010);
        }
        .radio-group {
            margin-top: 15px;
        }
        .radio-group label {
            margin-right: 10px;
        }
        .imagem-perfil {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #ccc;
        }

        #imagem-perfil {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Input para carregar arquivo */
        .input-arquivo {
            margin: 20px 0;
        }

        .input-arquivo input {
            display: none;
        }
        .icone-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Espaçamento entre os ícones */
            margin-top: 10px;
        }
        .icone-editar,
        .icone-excluir {
            cursor: pointer;
            font-size: 18px;
            padding: 8px;
            background: linear-gradient(to right, #7e1010, #e90e0e);
            border-radius: 8px;
            border: 20px; 
            border-color: black;
            margin-left: 110px;
            margin-right: 110px;
            margin-top: 10px;
            color: white;
            text-align: center;
        }
        .icone-editar:hover,
        .icone-excluir:hover {
            background: linear-gradient(to right, #7e1010, #7e1010);
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="Cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <!-- Inicia uma <div> com a classe "imagem-perfil" para a seção da imagem de perfil -->
                <div class="imagem-perfil">
                <img id="imagem-perfil" src="https://via.placeholder.com/150" alt="Imagem do Perfil">
                    <!-- Adiciona uma imagem com o ID "imagem-perfil", usando um URL de placeholder -->
                </div>
                <!-- Inicia uma <div> com a classe "icone-editar" e ID "editar-imagem" para o ícone de edição -->
                <div class="icone-editar" id="editar-imagem">
                <i class="fas fa-pencil-alt"> Adicionar imagem</i>
                    <!-- Adiciona um ícone de lápis (editar) usando a biblioteca Font Awesome -->
                </div>
                <!-- Inicia uma <div> com a classe "icone-excluir" e ID "excluir-imagem" para o ícone de exclusão -->
                <div class="icone-excluir" id="excluir-imagem">
                <i class="fas fa-times"> Excluir imagem</i>
                    <!-- Adiciona um ícone de "x" (excluir) usando a biblioteca Font Awesome -->
                </div>
                <!-- Inicia uma <div> com a classe "input-arquivo" para o campo de carregamento de arquivo -->
                    <div class="input-arquivo">
                    <input type="file" id="carregar-imagem" accept="image/*">
                    <!-- Adiciona um campo de entrada para arquivos, aceitando apenas imagens -->
                </div>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="radio-group">
                    <p>Cargo:</p>
                    <input type="radio" id="Professor" name="permissao" value="Professor" required>
                    <label for="Professor">Professor</label>
                    <input type="radio" id="aluno" name="permissao" value="aluno" required>
                    <label for="aluno">Aluno</label>
                </div>
                <input type="submit" name="submit" id="submit" value="Criar conta">
            </fieldset>
        </form>
    </div>
    <script>
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

    </script>
</body>
</html>

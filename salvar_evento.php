<?php
session_start();

// Verifica se a sessão 'eventos' já existe
if (!isset($_SESSION['eventos'])) {
    $_SESSION['eventos'] = [];
}

// Captura os dados enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

    // Verifica se os campos obrigatórios estão preenchidos
    if ($titulo && $data) {
        // Cria um array para o novo evento
        $novoEvento = [
            'titulo' => $titulo,
            'data' => $data,
            'descricao' => $descricao,
        ];

        // Adiciona o novo evento à sessão
        $_SESSION['eventos'][] = $novoEvento;
    }
}

// Redireciona de volta para a página do calendário
header('Location: Calendario.php');
exit();
?>
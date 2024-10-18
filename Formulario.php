<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Aluno e Professor</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Formulario.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
                    <a href="perfil.phtml">
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
</header>
  <div class="container">
    <img class="logo" src="MontaskLOGO2.png" alt="Logo da Escola">
    <h2>Formulário de Cadastro</h2>

    <div id="select-type" class="form-group">
      <label for="user-type">Selecione o tipo de usuário:</label>
      <select id="user-type" onchange="toggleForm()">
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
      </select>
    </div>
    
    <div id="aluno-form" class="form-group">
      <label for="aluno-email">E-mail do Aluno (Ex: aluno@escola.com)</label>
      <input type="email" id="aluno-email" name="aluno-email">
      <button class="btn-next" onclick="nextPage('aluno')">Próxima Página</button>
    </div>

    <div id="professor-form" class="form-group" style="display: none;">
      <label for="professor-email">E-mail do Professor (Ex: professor@escola.com)</label>
      <input type="email" id="professor-email" name="professor-email">
      <button class="btn-next" onclick="nextPage('professor')">Próxima Página</button>
    </div>
  </div>

  <script>
    function toggleForm() {
      var userType = document.getElementById("user-type").value;
      if (userType === "aluno") {
        document.getElementById("aluno-form").style.display = "block";
        document.getElementById("professor-form").style.display = "none";
      } else {
        document.getElementById("aluno-form").style.display = "none";
        document.getElementById("professor-form").style.display = "block";
      }
    }

    function nextPage(userType) {
      console.log("Avançando para próxima página como " + userType);
      
    }
  </script>

</body>
</html>

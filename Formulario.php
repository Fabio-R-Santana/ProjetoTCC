<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Aluno e Professor</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Formulario.css">
</head>
<body>
  <header>
    <div class="logoM">
        <img src="IMGmontask.jpeg" alt="Logo do Site">
          <nav>
              <ul>
                  <li> <a href="Calendario.php"> Calendário </a></li>
                  <li> <a href="Formulario.php"> Login </a></li>
                  <li> <a href="Index.php"> Home </a></li>
              </ul>
          </nav>  
      
    </div>
    
  </header>
  <div class="container">
    <img class="logo" src="IMGmontask.jpeg" alt="Logo da Escola">
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

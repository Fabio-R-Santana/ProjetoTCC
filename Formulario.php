<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Aluno e Professor</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f3f3;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="text"], input[type="email"], select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .btn-next {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn-next:hover {
      background-color: #0056b3;
    }
    .logo {
      display: block;
      margin: 0 auto 20px;
      max-width: 200px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logoM">
        <img src="IMGmontask.jpeg" alt="Logo do Site">
          <nav>
              <ul>
                <li> <a href="index.php"> Home </a></li>
                <li> <a href="Formulario.php"> Cadastro </a></li>
                <li> <a href="index.php"> Calendário </a></li>
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

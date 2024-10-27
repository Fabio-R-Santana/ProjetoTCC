<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Formulario.css">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Link para a biblioteca de ícones bootstrap icons -->
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
              <a href="perfil.php">
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
              <a href="Turmas.php">
                  <span class="icon"><i class="bi bi-book"></i></span>
                  <span class="tct-link">Turmas</span>
              </a>
          </li>
          <li class="item-menu">
                <a href="logout.php">
                    <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="tct-link">Logout</span>
                </a>
            </li>
      </ul>
  </nav>
</header>
  
<body>
  
    <div class="login-container">
        <img class="logo" src="MontaskLOGO2.png" alt="Logo da Escola">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" value="Entrar" name="submit">
        </form>
        <div class="register-option">
            <p>Não possui uma conta? <a href="Cadastro.php">Clique aqui para cadastrar</a></p>
        </div>
    </div>
</body>
</html>

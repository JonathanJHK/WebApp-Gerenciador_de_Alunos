  <?php
  $link = mysqli_connect('localhost','root','','seamanbd');
  session_start();
  ?>
  <html lang="pt-br">
  <style>
  input[type=text], select {
	  color:white;
  }
    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    margin-top: 3em;
    flex: 1 0 auto;
  }

  </style>
  <head>
    <title>Tela de Login - Seaman Náutica</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/seaman.css" />

    <!--Let browser know website is optimized for mobile-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <header>
   <nav class="nav-extended">
    <div class="nav-content">
      <div class="nav-wrapper white">  <a href="http://www.seaman.com.br/">
        <img src="images/logo.png" style="width:200px;"></a>
      </div>
    </div>
  </nav>

  </header>

  <main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

        <div class="row card-panel grey darken-4"> <!-- section grey darken-4 -->

          <div class="container">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="input-field col l12">
            <input id="last_name" name="nome" type="text" class="validate">
            <label for="last_name">Usuário</label>  
          </div>

          <div class="input-field col l12">
            <input id="password" name="senha" type="password" class="validate">
            <label for="password">Senha</label>
            <input type="hidden" name="acao" value="logar" />
            <input type="submit" value="Logar" class="btn" />
          </div>
          </form>
        </div>
        </div>
   <?php
  if(isset($_POST['acao']) && $_POST['acao'] == 'logar'){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    if(empty($nome) || empty($senha)){
      echo '<script>alert("Preencha todos os campos");</script>';
    }
    elseif($nome == 'admin'){
      $selecionaUser = mysqli_query($link, "SELECT * FROM admin WHERE senha = '$senha'");
      $conta = @mysqli_num_rows($selecionaUser);

      while($lnUser = mysqli_fetch_array($selecionaUser)){
        $_SESSION['nome'] = $lnUser['login'];
        $_SESSION['senha'] = $lnUser['senha'];
        $_SESSION['id'] = $lnUser['id'];
        $_SESSION['admin'] = 'sim';
        echo '<script>location.href="admin.php";</script>';
      }
    }
    else{
      $selecionaUser = mysqli_query($link,"SELECT * FROM secretaria WHERE login = '$nome' AND senha = '$senha'"); /* ARRUMAR LOGIN ADMIN*/
      $conta = @mysqli_num_rows($selecionaUser);
      
      if($conta <= 0){
        echo '<script>alert("Login errado!");</script>';
      }else{
        while($lnUser = mysqli_fetch_array($selecionaUser)){
          $_SESSION['nome'] = $lnUser['login'];
          $_SESSION['senha'] = $lnUser['senha'];
          $_SESSION['unidade'] = $lnUser['unidade'];
          echo '<script>location.href="admin.php";</script>';
        }
      }
    }
  }
?>


  </main>

  <footer class="page-footer grey darken-3">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
      <img src="images/logo-footer.png" style="width:70px; float: left;">
        <h5 class="white-text">Grupo B - Seaman Náutica Cursos</h5>
      </div>
      <div class="col l4 offset-l2 s12">

      </div>
    </div>
  </div>
  <div class="footer-copyright grey darken-4">
    <div class="container">
      © 2017 Copyright| Todos os direitos reservados.
      <a class="grey-text text-lighten-4 right" href="http://www.seaman.com.br/">More Links</a>
    </div>
  </div>
</footer>
</html>
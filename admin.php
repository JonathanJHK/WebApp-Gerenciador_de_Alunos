<?php
$link = mysqli_connect('localhost', 'root', '', 'seamanbd');

mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,'SET character_set_connection=utf8');
mysqli_query($link,'SET character_set_client=utf8');
mysqli_query($link,'SET character_set_results=utf8');

session_start();
if(!isset($_SESSION['nome']) || !isset($_SESSION['senha'])){
	header("Location:index.php");
} else if (isset($_GET['acao']) && $_GET['acao'] == 'sair'){
	unset($_SESSION['nome']);
	unset($_SESSION['senha']);
	session_destroy();
	header("Location:index.php");
}

?>

<?php
$nomeUser = $_SESSION['nome'];
$senhaUser = $_SESSION['senha'];
$id = 0;

if($nomeUser != 'admin'){
	$unidade = $_SESSION['unidade'];
	$nome = $_SESSION['nome'];
	$senha = $_SESSION['senha'];   
}
else{
	$selUser = mysqli_query($link,"SELECT id FROM secretaria");
	$conta = mysqli_num_rows($selUser);
	$id = $conta + 1;
}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="css/lis.css"/>

	<title>Painel de Controle Seaman Cursos</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


	<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="opcoes.js"></script>

</head>

<header class="z-depth-5">

	<div id="side-nav">
		<ul id="slide-out" class="side-nav grey darken-4">
			<li><div class="userView grey darken-3" style="border-bottom: 3px groove cornflowerblue;">
				
				<?php 
				if(isset($unidade)){
				$procuraUnidade = mysqli_query($link,"SELECT * FROM unidadeseaman WHERE id = '".$unidade."'");
				$lnUni = mysqli_fetch_array($procuraUnidade);}

				if($nomeUser != 'admin'){
					echo "<a href='#!name' class='active'><span class='white-text name'>Secretária</span></a>";
					echo "<a href='#!name' class='active'><span class='white-text name'>".$lnUni['nome']."</span></a>";
				}else{
					echo "<a href='#!email' class='active'><span class='white-text name'>Administrador</span></a>";
					echo "<a href='#!email' class='active'><span class='white-text name'>Seaman Náutica</span></a>";
				}
				?>
			</div></li>
			
			<li><a href="?acao=sair" class="waves-effect"><i class="material-icons">skip_previous</i>Deslogar</a></li>
			<li><a href="#!" class="waves-effect"><i class="material-icons">settings</i>Configurações</a></li>
		</ul>

		<a style="float: right;margin: 96px 120px 10px 10px;" href="#" data-activates="slide-out" class="button-collapse btn-floating btn-large btn-flat"><i class="large material-icons right">person</i> Profile</a>


	</div> 

	<nav class="nav-extended">
		<div class="nav-content">
			<div class="nav-wrapper white">
				<a href="http://www.seaman.com.br/">
					<img src="images/logo.png" style="width:200px;"></a>
				</div>
				<div class="nav-wrapper light-blue darken-4 col l6">
					<span class="nav-title">Painel de Gerenciamento Seaman</span>

				</div>
			</div>
			<div class="nav-wrapper light-blue darken-2">
				<ul class="left hide-on-med-and-down">
					<li class='active' style="border-right: 1px solid white;"><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons right">keyboard_arrow_down</i>Consultar Dados</a>

						<!-- Dropdown Structure -->
						<ul id='dropdown1' class='dropdown-content'>
							<?php
							if($nomeUser != 'admin'){
								echo "<li><a href='admin.php?pg=list-aluno'>Consultar aluno</a></li>";
								echo "<li><a href='admin.php?pg=listturmas'>Consultar turma</a></li>";
							}
							else{
								echo "<li><a href='admin.php?pg=list-aluno'>Consultar aluno</a></li>";
								echo "<li><a href='admin.php?pg=list-sec'>Consultar secretária</a></li>";

							}
							?>
						</ul></li>
						<li class='active' style="border-right: 1px solid white;"><a class='dropdown-button' href='#' data-activates='dropdown2'><i class="material-icons right">keyboard_arrow_down</i>Casdastrar Dados</a>
							<ul id='dropdown2' class='dropdown-content'>
								<?php
								if($nomeUser == 'admin'){
									echo "<li><a href='admin.php?pg=addsec'>Adicionar secretária</a></li>";
								}
								else{
									echo "<li><a href='admin.php?pg=addaluno'>Cadastrar aluno</a></li>";
									echo "<li><a href='admin.php?pg=addturma'>Adicionar turma</a></li>";
								}
								?>
							</ul>
						</div>

					</nav>




				</header>


				<main>
					<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
					<script type="text/javascript" src="js/materialize.min.js"></script>

					<script type="text/javascript">$('.button-collapse').sideNav({
      menuWidth: 240, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
  }
  );</script>

  <div id="centro">

  	<div id="conteudo">

  		<div id="dir">
  			<?php
  			if(isset($_GET['pg']) && $_GET['pg'] == 'addaluno'){
  				include('pages/addaluno.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'list-aluno'){
  				include('pages/list-aluno.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'addsec'){
  				include('pages/addsec.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'addturma'){
  				include('pages/addturma.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'editar'){
  				include('pages/editar.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'listturmas'){
  				include('pages/list-turma.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'editarturma'){
  				include('pages/editarturma.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'list-sec'){
  				include('pages/list-sec.php');
  			}elseif(isset($_GET['pg']) && $_GET['pg'] == 'editarsec'){
  				include('pages/editarsec.php');
  			}
  			?>
  		</div>
  	</div>
  </div>




</main>
<footer class="page-footer blue darken-3">
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
	<div class="footer-copyright">
		<div class="container">
			© 2017 Copyright| Todos os direitos reservados.
			<a class="grey-text text-lighten-4 right" href="http://www.seaman.com.br/cursos.html">More Links</a>
		</div>
	</div>
</footer>

</html> 
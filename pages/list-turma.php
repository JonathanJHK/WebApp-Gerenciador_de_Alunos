
<h2 style="border-bottom: 2px solid #4db6ac;">Consultar turma</h2>
<html>

<head>
	<link type="text/css" rel="stylesheet" href="css/lis.css"/>
</head>

<form action="" method="post" enctype="multipart/form-data">
	<div class="input-field inline col s8">
		<i class="material-icons prefix">recent_actors</i>
		<select name="turma" class="validate" required>
			<option value="" disabled selected>Escolha a Turma</option>
			<?php
			$selecionaPosts = mysqli_query($link,"SELECT turma.id, turma.nome FROM turma,curso WHERE curso.id = turma.curso AND curso.unidade = '$unidade'");
			while($lnMsg = mysqli_fetch_array($selecionaPosts)){
				echo "<option value='".$lnMsg['id']."'>".$lnMsg['nome']."</option>";
			}
			?>
		</select>
		<script type="text/javascript">
			$(document).ready(function() {
				$('select').material_select();
			});
		</script>

	</div>
	<button class="btn-floating waves-effect waves-light" type="submit" name="acao" value="pesquisa"><i class="material-icons left">search</i>
	</button>
</form>

<?php
$conta = 0;
if(isset($_POST['acao']) && $_POST['acao'] == 'pesquisa'){
	$pesquisar = ucfirst(trim($_POST['turma']));
	$selecionaPosts = mysqli_query($link,"SELECT * FROM aluno WHERE turma = '$pesquisar'");
	$conta = @mysqli_num_rows($selecionaPosts);
	$selecionaTurma = mysqli_query($link,"SELECT * FROM turma WHERE turma.id = '$pesquisar'");
	$turma = mysqli_fetch_array($selecionaTurma);

	echo "<table id='t01'>

	<thead>
		<tr>
			<th style='background-color:#b3e5fc'colspan='5'>Turma ".$turma['nome']."</th>
			<th style='background-color:#b3e5fc' colspan='1'><a href='admin.php?pg=editarturma&id=".$pesquisar."' class='lk'>Editar turma </a><a onclick='return confirm(\"Confirma exclusão de Turma?\")' href='admin.php?pg=listturmas&removt=sim&id=".$pesquisar."'>| Remover</a></th>
			
		</tr>
	</thead>
	<tbody>
		<tr style='background-color: #CCC;'>
			<td>Nome</td>
			<td>CPF</td>
			<td>E-mail</td>
			<td>Data do CFPN</td>
			<td>Data do CBSN</td>
			<td>Editar Aluno</td>
		</tr>";
		if($conta != 0){
			while($lnMsg = mysqli_fetch_array($selecionaPosts)){
				$procuraUnidade = mysqli_query($link,"SELECT * FROM unidadeseaman WHERE id = '".$lnMsg['unidade']."'");
				$lnUni = mysqli_fetch_array($procuraUnidade);

				echo "<tr><td> " . $lnMsg['nome'] . " </td>";
				echo "<td> " . $lnMsg['CPF'] . " </td>";
				echo "<td> " . $lnMsg['email'] . " </td>";
				echo "<td> " . $lnMsg['dataCFPN'] . " </td>";
				echo "<td> " . $lnMsg['dataCBSN'] . " </td>";
				echo "<td><a href='admin.php?pg=editar&id=".$lnMsg['CPF']."'>Editar</a> <a onclick='return confirm(\"Confirma exclusão de Aluno?\")' href='admin.php?pg=listturmas&remov=sim&id=".$lnMsg['CPF']."'>| Remover</a></td></tr>";}

		}else { echo '<script>alert("Nenhum dado encontrado.");</script>'; }

		echo"</tbody>
		<tfoot>
			<tr>
				<td colspan ='6'> Total de Alunos:";
					if ($conta == 0){
						echo "Não possui Alunos";   
					}else{
						echo $conta;
					}
					echo"</td>
				</tr>
			</tfoot>
		</table><br>";

	}

	if(isset($_GET['id']) && isset($_GET['remov']) && $_GET['remov'] == 'sim' ){
		$pegaId = $_GET['id'];
		$deleteDados = mysqli_query($link,"DELETE FROM aluno WHERE cpf ='".$pegaId."'");
		echo '<script>location.href="admin.php?pg=listturmas";</script>';
	} 

	if(isset($_GET['id']) && isset($_GET['removt']) && $_GET['removt'] == 'sim' ){
		$pegaId = $_GET['id'];
		$selecionaPosts = mysqli_query($link,"SELECT * FROM aluno WHERE turma = '$pegaId'");
		$conta = @mysqli_num_rows($selecionaPosts);
		if($conta != 0){
			echo'<script>alert("Há aluno na turma!");</script>';
			echo '<script>location.href="admin.php?pg=listturmas";</script>';
		}else{
			$deleteDados = mysqli_query($link,"DELETE FROM turma WHERE id ='".$pegaId."'");
			echo '<script>location.href="admin.php?pg=listturmas";</script>';
		}
	}
	?>


	</html>
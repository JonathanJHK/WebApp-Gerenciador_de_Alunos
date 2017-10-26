
<h2 style="border-bottom: 2px solid #4db6ac;">Consultar secretária</h2>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/lis.css"/>
</head>


<?php


if($nomeUser == 'admin'){
	$selecionaPosts = mysqli_query($link, "SELECT * FROM secretaria");
}


$conta = @mysqli_num_rows($selecionaPosts);
?>




<table id="t01">

	<caption>Tabela de Secretária</caption>
	<thead>
		<tr>
			<th>Login</th>
			<th>Senha</th>
			<th>Unidade</th>
			<th>Editar Secretária</th>
		</tr>
	</thead>
	<tbody>
		<?php

		if($conta != 0){
			while($lnMsg = mysqli_fetch_array($selecionaPosts)){
				$procuraUnidade = mysqli_query($link,"SELECT * FROM unidadeseaman WHERE id = '".$lnMsg['unidade']."'");
				$lnUni = mysqli_fetch_array($procuraUnidade);

				echo "<tr><td> " . $lnMsg['login'] . " </td>";
				echo "<td> " . $lnMsg['senha'] . " </td>";
				echo "<td>". $lnUni['nome'] ."</td>";
				echo "<td><a href='admin.php?pg=editarsec&id=".$lnMsg['id']."'>Editar |</a><a onclick='return confirm(\"Confirma exclusão de Secretária?\")' href='admin.php?pg=list-sec&remov=sim&id=".$lnMsg['id']."' class='lk'> Remover</a></td></tr>";
			}
		}else { echo '<script>alert("Nenhum dado encontrado.");</script>'; }

		?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan ="4"> Total de Secretária: 
				<?php 
				if ($conta == 0){
					echo "Não possui Secretária";   
				}else{
					echo $conta;
				}
				?></td>
			</tr>
		</tfoot>
	</table><br>




	<?php
	if(isset($_GET['id']) && $_GET['remov'] == 'sim'){
		$pegaId = $_GET['id'];
		$deleteDados = mysqli_query($link,"DELETE FROM secretaria WHERE id ='".$pegaId."'");
		echo '<script>location.href="admin.php?pg=list-sec";</script>';
	} ?>

	</html>
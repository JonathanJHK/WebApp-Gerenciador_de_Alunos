
<h2 style="border-bottom: 2px solid #4db6ac;">Consultar aluno</h2>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/lis.css"/>
</head>

<form action="" method="post" enctype="multipart/form-data">
	<div class="col s12">
		Pesquisar aluno:
		<div class="input-field inline">
			<input id="pesquisar" name="pesquisar" type="text" onkeypress="mascara(this, mcpf)" maxlength="14" placeholder="000.000.000-00" class="validate"> 
		</div>
		<button class="btn-floating waves-effect waves-light" type="submit" name="acao" value="pesquisar"><i class="material-icons left">search</i>
		</button><br><br>
	</div>
	

</form>
<?php
if(isset($_GET['pag'])){
	$pg = (int)$_GET['pag'];
}else{
	$pg = 1;
}

$maximo = 200;
$inicio = ($pg * $maximo) - $maximo;
if(isset($_POST['acao']) && $_POST['acao'] == 'pesquisar' && $nomeUser != 'admin'){
	$pesquisar = ucfirst(trim($_POST['pesquisar']));
	$selecionaPosts = mysqli_query($link,"SELECT * FROM aluno WHERE unidade = '$unidade' AND CPF = '$pesquisar'");
}
elseif($nomeUser == 'admin'){
	$selecionaPosts = mysqli_query($link, "SELECT * FROM aluno ORDER BY unidade DESC");
	if(isset($_POST['acao']) && $_POST['acao'] == 'pesquisar'){
		$pesquisar = ucfirst(trim($_POST['pesquisar']));
		$selecionaPosts = mysqli_query($link,"SELECT * FROM aluno WHERE CPF = '$pesquisar'");
	}

}
else{
	$selecionaPosts = mysqli_query($link,"SELECT * FROM aluno WHERE unidade = '$unidade'");
}


$conta = @mysqli_num_rows($selecionaPosts);
?>




<table id="t01">

	<caption>Tabela de Alunos</caption>
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>E-mail</th>
			<th>Data do CFPN</th>
			<th>Data do CBSN</th>
			<?php
			if($nomeUser == 'admin'){
				echo "<th>Unidade</th>";
			}else{
				echo "<th>Editar Aluno</th>";
			}
			?>
			
			
		</tr>
	</thead>
	<tbody>
		<?php
			
			if($conta != 0){
				while($lnMsg = mysqli_fetch_array($selecionaPosts)){
					$procuraUnidade = mysqli_query($link,"SELECT * FROM unidadeseaman WHERE id = '".$lnMsg['unidade']."'");
					$lnUni = mysqli_fetch_array($procuraUnidade);

					echo "<tr><td> " . $lnMsg['nome'] . " </td>";
					echo "<td> " . $lnMsg['CPF'] . " </td>";
					echo "<td> " . $lnMsg['email'] . " </td>";
					echo "<td> " . $lnMsg['dataCFPN'] . " </td>";
					echo "<td> " . $lnMsg['dataCBSN'] . " </td>";
					if($nomeUser == 'admin'){
						echo "<td>". $lnUni['nome'] ."</td>";
					}else{
					echo "<td><a href='admin.php?pg=editar&id=".$lnMsg['CPF']."'>Editar</a> <a onclick='return confirm(\"Confirma exclusão de Aluno?\")' href='admin.php?pg=list-aluno&remov=sim&id=".$lnMsg['CPF']."'>| Remover</a></td></tr>";}

				}
			}else { echo '<script>alert("Nenhum dado encontrado.");</script>'; }

			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan ="7"> Total de Alunos: 
					<?php 
					if ($conta == 0){
						echo "Não possui Alunos";   
					}else{
						echo $conta;
					}
					?></td>
				</tr>
			</tfoot>
		</table><br>

		<script>
			function mascara(o,f){
				v_obj=o
				v_fun=f
				setTimeout("execmascara()",1)
			}
			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}

			function mcpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v;
}


</script>

<?php
	if(isset($_GET['id']) && isset($_GET['remov']) && $_GET['remov'] == 'sim' ){
		$pegaId = $_GET['id'];
		$deleteDados = mysqli_query($link,"DELETE FROM aluno WHERE cpf ='".$pegaId."'");
		echo '<script>location.href="admin.php?pg=list-aluno";</script>';
	} ?>

</html>
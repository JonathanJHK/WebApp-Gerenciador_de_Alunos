<h2 style="border-bottom: 2px solid #1565c0;">Editar Secretária</h2>
<?php
$pegaId = $_GET['id'];
$selecionaPostsEditar = mysqli_query($link,"SELECT * FROM secretaria WHERE id = '$pegaId' LIMIT 1");
$linha = mysqli_fetch_array($selecionaPostsEditar);
?>
<?php
$dia = date("d");
$mes = date("m");
$ano = date("Y");
date_default_timezone_set('America/Sao_Paulo');
?>
<div class="row card-panel"> <!-- section grey darken-4 -->

	<div class="container">
		<form method="post" enctype="multipart/form-data">



			<div class="input-field col l12">
				<i class="material-icons prefix">account_circle</i>
				<input id="last_name" name="login" type="text" class="validate" value="<?php echo $linha['login'];?>" autofocus required>
				<label for="last_name">Login</label>  
			</div>

			<div class="input-field col l6">
				<i class="material-icons prefix">vpn_key</i>
				<input id="password" name="senha" type="text" class="validate" value="<?php echo $linha['senha'];?>" required>
				<label for="password">Senha</label>

			</div>

			<div class="input-field col l6">
				<i class="material-icons prefix">report_problem</i>
				<input id="password" name="senhaConf" type="text" class="validate" value="<?php echo $linha['senha'];?>" required>
				<label for="password">Confirmar Senha</label>
			</div>


			<?php
							$ae = $linha['unidade'];
							$curso = mysqli_query($link,"SELECT nome FROM unidadeseaman WHERE id = '$ae'");
							$mostra = mysqli_fetch_array($curso);

			?>

			<div class="input-field col s12">
				<i class="material-icons prefix">store</i>
				<select name="unidade" class="validate" required>
					<option value="<?php echo $linha['unidade'];?>" selected><?php echo $mostra['nome'];?></option>
					<?php
					$selecionaPosts = mysqli_query($link,"SELECT unidadeseaman.id, unidadeseaman.nome FROM unidadeseaman");
					while($lnMsg = mysqli_fetch_array($selecionaPosts)){
						echo "<option data-icon='images/favicon.png' class='left circle' value='".$lnMsg['id']."'>".$lnMsg['nome']."</option>";
					}

					?>

				</select>

				<script type="text/javascript">
					$(document).ready(function() {
						$('select').material_select();
					});
				</script>

			</div>

			<div class="input-field col l12">
				<button class="btn waves-effect waves-light" type="submit" name="acao" value="cadastrar">Alterar
					<i class="material-icons right">done</i>
				</button>
				<button class="btn waves-effect waves-teal white black-text" type="reset">Desfazer altera&ccedil;&otilde;es
					<i class="material-icons right">fast_rewind</i>
				</button>

			</div>	

		</form>
	</div>



</div>

<?php
if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
	$login = trim($_POST['login']);
	$senha = trim($_POST['senha']);
	$senhaC = trim($_POST['senhaConf']);
	$unidade = trim($_POST['unidade']);

	if($senha != $senhaC){
		echo "<script>alert('Erro: As senhas não conferem!');</script>";
	}else{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		if(!empty($login) && !empty($senha)&& !empty($unidade)){

			$insereDados = mysqli_query($link,"UPDATE secretaria SET login = '$login', senha = '$senha', unidade = '$unidade', admin = '1010101' WHERE id = '$pegaId'");
			echo '<script>alert("Editado com sucesso!");</script>';		
		}else{
			echo '<script>alert("Não alterou!");</script>';
		}
	}
}
?>

<script>
	function mascara(o,f){
		v_obj=o
		v_fun=f
		setTimeout("execmascara()",1)
	}
	function execmascara(){
		v_obj.value=v_fun(v_obj.value)
	}
	function mtempo(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d{2})/,"$1:$2");	
    return v;
}
</script>

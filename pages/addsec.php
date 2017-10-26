<h2 style="border-bottom: 2px solid #1565c0;">Cadastrar Secretária</h2>

<?php
$dia = date("d");
$mes = date("m");
$ano = date("Y");
date_default_timezone_set('America/Sao_Paulo');
?>
<div id="msgs">
	<div id="menu">
		<div class="row card-panel"> <!-- section grey darken-4 -->

			<div class="container">
				<form method="post" enctype="multipart/form-data">



					<div class="input-field col l12">
						<i class="material-icons prefix">account_circle</i>
						<input id="last_name" name="login" type="text" class="validate" autofocus required>
						<label for="last_name">Login</label>  
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">vpn_key</i>
						<input id="password" name="senha" type="text" class="validate" required>
						<label for="password">Senha</label>
						
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">report_problem</i>
						<input id="password" name="senhaConf" type="text" class="validate" required>
						<label for="password">Confirmar Senha</label>
					</div>

					


					<div class="input-field col s12">
						<i class="material-icons prefix">store</i>
						<select name="unidade" class="validate" required>
							<option value="" disabled selected>Escolha a Unidade</option>
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
						<button class="btn waves-effect waves-light" type="submit" name="acao" value="cadastrar">Cadastrar
						<i class="material-icons right">done</i>
						</button>
						<button class="btn waves-effect waves-teal white black-text" type="reset">Limpar dados
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

			$sql = "SELECT * FROM secretaria Where login ='" . $login . "'";
			$query = mysqli_query($link, $sql);
			$result = mysqli_num_rows($query);

			if($senha != $senhaC){
				echo "<script>alert('Erro: As senhas não conferem!');</script>";
			}else{
				if($result == 0){
					$insereDados3 = mysqli_query($link,"INSERT INTO secretaria (id, login, senha, unidade, admin) VALUES ('$id', '$login', '$senha', '$unidade', '1010101');");
					echo '<script>alert("Enviado com sucesso!");</script>';
				}else{
					echo '<script>alert("LOGIN de secretária já está em uso");</script>';

				}}

			}
			?>
		</div>
	</div>
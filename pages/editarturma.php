<h2 style="border-bottom: 2px solid #1565c0;">Editar turma</h2>
<?php
	$pegaId = $_GET['id'];
	$selecionaPostsEditar = mysqli_query($link,"SELECT * FROM turma WHERE id = '$pegaId' LIMIT 1");
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
						<i class="material-icons prefix">assignment</i>
						<input type="text" name="nome" id="nome" class="validate" value="<?php echo $linha['nome'];?>" autofocus required>
						<label for="name">Nome da Turma</label>  
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">av_timer</i>
						<input type="text" name="horario" placeholder="Horário (hora:minuto)" onkeypress="mascara(this, mtempo)" maxlength="5" class="validate" required value="<?php echo $linha['horario'];?>">
						<label for="hour">Hor&aacute;rio</label>
						
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">view_list</i>
						<input type="number" name="sala" placeholder="Sala" min="1" class="validate" required value="<?php echo $linha['sala'];?>">
						<label for="sala">Sala</label>
					</div>

					
						<?php
							$ae = $linha['curso'];
							$curso = mysqli_query($link,"SELECT nome FROM curso WHERE id = '$ae'");
							$mostra = mysqli_fetch_array($curso);

						?>

					<div class="input-field col s12">
						<i class="material-icons prefix">note_add</i>
						<select name="curso" class="validate" required>

						<option value="<?php echo $linha['curso'];?>" selected><?php echo $mostra['nome'];?></option>
							<?php
							$selecionaPosts = mysqli_query($link,"SELECT curso.id, curso.nome FROM curso WHERE curso.unidade = '$unidade'");
							while($lnMsg = mysqli_fetch_array($selecionaPosts)){
								echo "<option data-icon='images/logo-footer.png' class='left circle' value='".$lnMsg['id']."'>".$lnMsg['nome']."</option>";
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
						<button class="btn waves-effect waves-teal white black-text" type="reset">Desfazer alterações
							<i class="material-icons right">fast_rewind</i>
						</button>
						
					</div>	

				</form>
			</div>



		</div>

<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
		$nome = trim($_POST['nome']);
		$horario = trim($_POST['horario']);
		$sala = trim($_POST['sala']);
		$curso = trim($_POST['curso']);
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		if(!empty($nome) && !empty($horario)&& !empty($sala)&& !empty($curso)){
					
			$insereDados = mysqli_query($link,"UPDATE turma SET nome = '$nome', horario = '$horario', sala = '$sala', curso = '$curso' WHERE id = '$pegaId'");
				echo '<script>alert("Editado com sucesso!");</script>';		
			}else{
				echo '<script>alert("Não alterou!");</script>';
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

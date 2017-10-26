<h2 style="border-bottom: 2px solid #1565c0;">Editar aluno</h2>
<?php
$pegaId = $_GET['id'];
$selecionaPostsEditar = mysqli_query($link,"SELECT * FROM aluno WHERE cpf = '$pegaId' LIMIT 1");
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
				<input type="text" name="nome" id="nome" class="validate" value="<?php echo $linha['nome']; ?>">
				<label for="name">Nome Completo</label>  
			</div>

			<div class="input-field col l6">
				<i class="material-icons prefix">verified_user</i>
				<input type="text" name="cpf" onkeypress="mascara(this, mcpf)"  maxlength="14" value="<?php echo $linha['CPF']; ?>" class="validate" required/>
				<label for="password">CPF</label>
			</div>

			<div class="input-field col l6">
				<i class="material-icons prefix">description</i>
				<input type="text" name="rg" onkeypress="mascara(this, mrg)" maxlength="17"  value="<?php echo $linha['rg']; ?>" class="validate" required>
				<label for="password">RG</label>
			</div>

			<div class="input-field col s12">
				<?php 
				$dataFormatada = trim($linha['dataNasci']);
				if(!empty($dataFormatada)){
					$dataFormatada = date("Y-m-d", strtotime($dataFormatada));} ?>

					<span>Data Nascimento</span>
					<input type="date" name="dataNasc" id="datansc" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>" value="<?php echo $dataFormatada; ?>" class="validate" required>
				</div>

				<div class="input-field col l12">
					<i class="material-icons prefix">my_location</i>
					<input type="text" name="endereco"  value="<?php echo $linha['endereco']; ?>" class="validate" required>
					<label for="name">Endere&ccedil;o</label>  
				</div>

				<div class="input-field col s6">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" id="email" class="validate" required value="<?php echo $linha['email']; ?>" >
					<label for="email" data-error="formato do e-mail inv&aacute;lido" data-success="formato do e-mail v&aacute;lido">Email</label>
				</div>

				<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input type="tel" name="telefone" onkeypress="mascara(this, mtel)" maxlength="15" value="<?php echo $linha['telefone']; ?>"  id="tel" class="validate" required>
					<label>Telefone</label>
				</div>

				<div class="input-field col s6">
					<?php 
					$dataFormatada = trim($linha['dataCBSN']);
					if(!empty($dataFormatada)){
						$dataFormatada = date("Y-m-d", strtotime($dataFormatada));} ?>
						<span>Data do CBSN</span>
						<input type="date" name="dataCbsn" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>" value="<?php echo $dataFormatada; ?>" >
					</div>

					<div class="input-field col s6">
						<?php 
						$dataFormatada = trim($linha['dataCFPN']);
						if(!empty($dataFormatada)){
							$dataFormatada = date("Y-m-d", strtotime($dataFormatada));} ?>
							<span>Data do CFPN</span>
							<input type="date" name="dataCfpn" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>" value="<?php echo $dataFormatada; ?>" >

						</div>
						<?php
						$turma = mysqli_query($link, "SELECT nome FROM turma WHERE id IN (SELECT turma FROM aluno WHERE CPF = '$pegaId')");
						$turmas = mysqli_fetch_array($turma);

						?>
						<div class="input-field col s12">
							<i class="material-icons prefix">recent_actors</i>
							<select name="turma" class="validate" required>

								<option value="<?php echo $linha['turma']; ?>" selected><?php echo $turmas['nome'];?></option>

								<?php
								$selecionaPosts = mysqli_query($link,"SELECT turma.id, turma.nome FROM turma,curso WHERE curso.id = turma.curso AND curso.unidade = '$unidade'");
								while($lnMsg = mysqli_fetch_array($selecionaPosts)){
									echo "<option value='".$lnMsg['id']."'>".$lnMsg['nome']."</option>";
								}
								?>	</select>
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
					$nome = $_POST['nome'];
					$cpf = $_POST['cpf'];
					$rg = $_POST['rg'];
					$dataNasci = $_POST['dataNasc'];
					$endereco = $_POST['endereco'];
					$email = $_POST['email'];
					$telefone = $_POST['telefone'];
					$dataCSBN = $_POST['dataCbsn'];
					$dataCFPN = $_POST['dataCfpn'];
					$turma = $_POST['turma'];

					mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
					if(!empty($nome) && !empty($cpf)){

						$insereDados = mysqli_query($link,"UPDATE aluno SET nome = '$nome', CPF = '$cpf', rg = '$rg', dataNasci = '$dataNasci', endereco = '$endereco', email = '$email', telefone = '$telefone', dataCBSN = '$dataCSBN', dataCFPN = '$dataCFPN', turma = '$turma' WHERE CPF = '$pegaId'");
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
					function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") 	//Esse é tão fácil que não merece explicações
    return v
} 
function mtel(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}
function cnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}
function mcpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       

    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mtempo(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{1})(\d{2})(\d{2})/,"$1:$2.$3");	
    return v;
}
function mhora(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1h$2");       
    return v;
}
function mrg(v){
    v=v.replace(/\D/g,"");					//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{10})$/,"$1.$2");
	v=v.replace(/(\d)(\d{7})$/,"$1.$2");	//Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v=v.replace(/(\d)(\d{4})$/,"$1.$2");	//Coloca o . antes dos últimos 3 dígitos, e antes do verificador
	v=v.replace(/(\d)(\d)$/,"$1-$2");		//Coloca o - antes do último dígito
	return v;
}
function mnum(v){
    v=v.replace(/\D/g,"");					//Remove tudo o que não é dígito
    return v;
}
</script>

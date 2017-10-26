<h2 style="border-bottom: 2px solid #1565c0;">Cadastrar aluno</h2>

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
						<input type="text" name="nome" id="nome" class="validate" autofocus required>
						<label for="name">Nome Completo</label>  
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">verified_user</i>
						<input type="text" name="cpf" onkeypress="mascara(this, mcpf)" maxlength="14" placeholder="000.000.000-00" class="validate" required/>
						<label for="password">CPF</label>
					</div>

					<div class="input-field col l6">
						<i class="material-icons prefix">description</i>
						<input type="text" name="rg" onkeypress="mascara(this, mrg)" maxlength="17" placeholder="000.000.000-0" class="validate" required>
						<label for="password">RG</label>
					</div>

					<div class="input-field col s12">
						<span>Data Nascimento</span>
						<input type="date" name="dataNasc" id="datansc" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>" placeholder=" " class="validate" required>
					</div>

					<div class="input-field col l12">
						<i class="material-icons prefix">my_location</i>
						<input type="text" name="endereco" placeholder="Rua,n.,Bairro/Cidade-Estado CEP" class="validate" required>
						<label for="name">Endere&ccedil;o</label>  
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input type="email" name="email" id="email" class="validate" required>
						<label for="email" data-error="formato do e-mail inv&aacute;lido" data-success="formato do e-mail v&aacute;lido">Email</label>
					</div>

					<div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input type="tel" name="telefone" onkeypress="mascara(this, mtel)" maxlength="15" placeholder="(00) 0000-0000" id="tel" class="validate" required>
						<label>Telefone</label>
					</div>

					<div class="input-field col s6">
						<span>Data do CBSN</span>
						<input type="date" name="dataCbsn" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>">
						
					</div>

					<div class="input-field col s6">
						<span>Data do CFPN</span>
						<input type="date" name="dataCfpn" max="<?php echo $ano.'-'.$mes.'-'.$dia; ?>">
						
					</div>
					



					<div class="input-field col s12">
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
			$nome = ucfirst(trim($_POST['nome']));
			$cpf = ucfirst(trim($_POST['cpf']));
			$rg = ucfirst(trim($_POST['rg']));
			$email = trim($_POST['email']);
			$endereco = ucfirst(trim($_POST['endereco']));
			$telefone = ucfirst(trim($_POST['telefone']));
			$turma = ucfirst(trim($_POST['turma']));
			$dataNasc = trim($_POST['dataNasc']);
			$dataCfpn = trim($_POST['dataCfpn']);
			$dataCbsn = trim($_POST['dataCbsn']);


			

			$sql = "SELECT * FROM aluno Where CPF ='" . $cpf . "'";
			$query = mysqli_query($link, $sql);
			$result = mysqli_num_rows($query);
			


			if($result == 0){

				$insereDados3 = mysqli_query($link,"INSERT INTO aluno (CPF, telefone, dataNasci, unidade, email, rg, nome, endereco, dataCFPN, dataCBSN, turma) VALUES ('$cpf','$telefone','$dataNasc','$unidade','$email','$rg','$nome','$endereco','$dataCfpn','$dataCbsn','$turma');");
				echo $nome;	
				echo '<script>alert("Enviado com sucesso!");</script>';

			}else{
				echo '<script>alert("CPF consta no banco de dados!");</script>';
				
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

</div>
</div>
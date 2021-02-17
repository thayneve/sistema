<div class="login">
	<div class="inf-cadastro2">
		<div>
		<img src="<?= $imgPath ?>logo-branco.png"  alt="...">
		<h1>Falta pouco</h1>
		<h3>Para você aproveitar as vantagens exclusivas QueroMed. Cadastre-se agora para ter mais praticidade na hora de agendar consultas e exames.</h3>
		</div>
	</div>
	<div class="form">
		<div class="text-center">
			<?php if ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
				<?php $this->session->flashdata('error', ''); ?>
			<?php endif; ?>

			<?php if ($this->session->flashdata('message')) : ?>
				<div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
				<?php $this->session->flashdata('message', ''); ?>
			<?php endif; ?>
		</div>
		<?= form_open_multipart(base_url('cadastro_novocadastro'), ' id="formCadastroNovoCliente"'); ?>
			<?php if($this->session->agendamento):?>
				<input type="hidden" name="agendamento" value="<?= $this->session->agendamento ?>">
			<?php endif?>
			<div class="text-center">
          	<h3 class="titulos" style="margin-top: 5%;">Cadastre-se<br>gratuitamente</h3>
            </div>
			<div class="col-lg-10 form-cad">
				<div class="form-group">
					<label for="inputNome">Nome *</label>
					<input type="text" class="form-control" id="inputNome" name="inputNome"
						placeholder="Escreva seu nome aqui" value="<?php echo set_value('inputNome')?>" required>
				</div>
				<div class="form-group">
					<label for="inputEmail">E-mail *</label>
					<input type="email" class="form-control" id="inputEmail" name="inputEmail"
						placeholder="seuemail@exemplo.com" value="<?php echo set_value('inputEmail')?>"
						required>
				</div>
				<div class="form-check-inline">
					<label class="label mr-5" for="inputSEXO">Sexo *</label>
					<input type="radio" class="form-check radio" id="inputSexo" name="inputSexo" value="F" <?php echo (set_value('inputSexo')=="F")?"checked":''?> required> 
					<label class="form-check-label" for="inputSEXO">Feminino </label>
					<input type="radio" class="form-check radio" id="inputSexo" name="inputSexo" value="M" <?php echo (set_value('inputSexo')=="M")?"checked":''?> required> 
					<label class="form-check-label" for="inputSEXO">Masculino </label>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputCPF">CPF *</label>
						<input type="text" class="form-control" id="cpf" name="inputCPF"
							placeholder="000.000.000-00" onkeypress="$(this).mask('000.000.000-00')" onpaste="$(this).mask('000.000.000-00')" value="<?php echo set_value('inputCPF')?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputData">Data de nascimento *</label>
						<input type="date" class="form-control" id="inputData" name="inputData" placeholder="25/03/1996"
						value="<?php echo set_value('inputData')?>" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-lg-4"> 
						<label class="label" for="inputCep">CEP * <a class="link-cep" target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" >Não sabe?</a></label>
						<input type="text" placeholder="60.000-000" class="form-control" name="inputCep" value="<?php echo set_value('inputCep')?>" onpaste="$(this).mask('00.000-000')" onkeypress="$(this).mask('00.000-000')" id="inputCep" required>
					</div>
					<div class="form-group col-lg-8"> 
						<label class="label" for="inputRua">Endereço </label>
						<input type="text" class="form-control" name="inputRua" id="inputRua" value="<?php echo set_value('inputRua')?>" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-lg-6"> 
						<label class="label" for="inputBairro">Bairro </label>
						<input type="text" class="form-control" name="inputBairro" id="inputBairro" value="<?php echo set_value('inputBairro')?>" required>
					</div>
					<div class="form-group col-lg-6"> 
						<label class="label" for="inputNumero">Número </label>
						<input type="text" class="form-control" id="inputNumero" value="<?php echo set_value('inputNumero')?>" name="inputNumero" onpaste="$(this).mask('00000000')" onkeypress="$(this).mask('00000000')"> 
					</div> 
				</div>
				<div class="form-row">
					<div class="form-group col-lg-4"> 
						<label class="label" for="inputComplemento">Complemento</label>
						<input type="text" class="form-control" id="inputComplemento" value="<?php echo set_value('inputComplemento')?>" name="inputComplemento"> 
					</div>
					<div class="form-group col-lg-4"> 
						<label class="label" for="inputMunicipio">Município</label>
						<input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" value="<?php echo set_value('inputMunicipio')?>"> 
					</div>
					<div class="form-group col-lg-4"> 
						<label class="label" for="inputUf">UF</label>
						<input type="text" class="form-control" id="inputUf" name="inputUf" value="<?php echo set_value('inputUf')?>"> 
					</div>
				</div>
				<div class="row">
				<div class="form-group senha">
					<label for="inputSenha">Senha *</label>
					<input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="*******"
						required>
				</div>
				<div class="form-group senha">
					<label for="inputsenha2">Confirmar senha *</label>
					<input type="password" class="form-control" id="inputsenha2" name="inputsenha2" placeholder="*******"
						required>
				</div>
				</div>
				<div class="form-check form-check-inline concordo">
				<input  type="checkbox" id="termos" onclick="concordar()" required>
				<label>Li e concordo com os <a class="link-green" href="<?= base_url('termos_de_uso') ?>">Termos de Uso</a> e <a class="link-green" href="<?= base_url('politicas_de_privacidade') ?>">Políticas de Privacidade</a>.</label>
				</div>
				<div class="text-center">
					<button type="submit" id="submit" disabled>Cadastrar</button>
				</div>
				<div class="text-center mt-3">
					<a class="link-green" href="<?= base_url('login') ?>">Já possui cadastro? Faça login em sua conta</a>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(function () {
		$(document).on('blur', '#inputData', function (e) {
			let dataAtual = new Date();
			let data = new Date($(this).val());
			if (data > dataAtual) {
				$(this).val('');
				alert('O campo DATA NASCIMENTO inválido.');
				return;
			}
		});
	});
	function concordar()
    {
        if(document.getElementById('termos').checked == true){
            document.getElementById('submit').disabled = false;
        }
        if(document.getElementById('termos').checked == false){
            document.getElementById('submit').disabled = true;
        }
    }
</script>

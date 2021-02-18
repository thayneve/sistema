<div class="row">
	<div class="col-sm banner-resp">
		<img src="<?= $imgPath ?>argos-img.jpg" class="img-fluid img-argos" alt="Imagem responsiva">
	</div>

	<div class="col-sm">
		<a href="<?= base_url(); ?>">
			<img class="seta" src="<?= $imgPath ?>chevron-left-solid.svg">
		</a>

		<div class="text-center img-cad">
			<img src="<?= $imgPath ?>queromed_logo.png" class="img-fluid " alt="Imagem responsiva">
			<br/>
		</div>

		<div class="form-group mx-sm-3 mb-2 input">
			<?= form_open_multipart(base_url('Acesso/cadastrar/medico'), ' id="formCadastroNovoMedico"'); ?>
			<div class="form-group">
				<label for="inputName">Nome</label>
				<input type="text" class="form-control" id="inputName" name="inputName"
					   placeholder="Escreva seu nome aqui" value="<?php echo set_value('inputName')?>" required>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputCPF">CPF</label>
					<input type="text" class="form-control" id="cpf" name="inputCPF" value="<?php echo set_value('inputCPF')?>"
						   placeholder="000.000.000-00" onkeypress="$(this).mask('000.000.000-00')" onpaste="$(this).mask('000.000.000-00')" required>
				</div>
				<div class="form-group col-md-6">
					<label for="inputdata">Data de nascimento</label>
					<input type="date" class="form-control" id="inputdata" name="inputdata" placeholder="25/03/1996"
						value="<?php echo set_value('inputdata')?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="inputemail">E-mail</label>
				<input type="email" class="form-control" id="inputemail" value="<?php echo set_value('inputemail')?>" name="inputemail"
					   placeholder="seuemail@exemplo.com"
					   required>
			</div>
			<div class="form-group">
				<label for="inputsenha">Senha</label>
				<input type="password" class="form-control" id="inputsenha" name="inputsenha" placeholder="*******"
					   required>
			</div>
			<div class="form-group">
				<label for="inputsenha2">Confirmar senha</label>
				<input type="password" class="form-control" id="inputsenha2" name="inputsenha2" placeholder="*******"
					   required>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary btn-login">Cadastre-se</button>
			</div>
			</form>
			<div class="text-center link">
				<a href="<?= base_url('login') ?>">Já possui cadastro? Faça login em sua conta</a>
			</div>
		</div>
		<br/><br/>
		
	</div>
</div>
<script>
	$(function () {
		$(document).on('blur', '#inputdata', function (e) {
			let dataAtual = new Date();
			let data = new Date($(this).val());
			if (data > dataAtual) {
				$(this).val('');
				alert('O campo DATA NASCIMENTO inválido.');
				return;
			}
		});
	});
</script>


<div class="login">
	<div class="inf-cadastro2">
		<div>
		<img src="<?= $imgPath ?>logo-branco.png"  alt="...">
		<h1>Olá!</h1>
		<h3>Entre agora na sua conta para aproveitar as vantagens do<BR>Queromed.</h3>
		</div>
    </div>
	<div class="form">
		<div class="text-center">
			<!-- <img src="<= $imgPath ?>queromed_logo.png" class="img-fluid" alt="Imagem responsiva"> -->
			<?php if ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
				<?php $this->session->flashdata('error', ''); ?>
			<?php endif; ?>
			<?php if ($this->session->flashdata('message')) : ?>
				<div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
				<?php $this->session->flashdata('message', ''); ?>
			<?php endif; ?>
			<?php if ($this->session->flashdata('info')) : ?>
				<div class="alert alert-warning"> <?= $this->session->flashdata('info') ?> </div>
				<?php $this->session->flashdata('info', ''); ?>
			<?php endif; ?>
		</div>
		
		<?= form_open_multipart(base_url('Acesso/index'), ' id="formLogin"'); ?>
			<?php if($this->session->agendamento):?>
				<input type="hidden" name="agendamento" value="<?= $this->session->agendamento ?>">
			<?php endif?>
			<div class="form-group col-lg-10 text-left">
			<h3 class="titulos">Entrar</h3>
			<span class="desc">Para continuar, inicie a sessão com sua conta.</span>
			</div>
			<div class="form-group col-lg-12 text-left">
				<input type="hidden" class="form-control" id="inputTipoLogin" name="tipoLogin" value="clinica">
				<label for="inputEmail">E-mail</label>
				<input type="email" class="form-control login-field" id="inputEmail" name="inputEmail"
					aria-describedby="emailHelp" value="<?php echo set_value('inputEmail')?>" required>
				<small id="emailHelp" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-lg-12 text-left">
				<label for="inputPassword">Senha</label>
				<input type="password" class="form-control login-field" id="inputPassword" name="inputPassword" required>
				<div class="link" align="right">
					<a href="<?= base_url('Acesso/recuperarsenha') ?>">Esqueceu sua senha?</a>
				</div>
			</div>
			<div class="text-center form-group col-lg-12" align="right">
				<button class="btn-login" type="submit"  >Entrar</button>
			</div>
			<div class="text-center" style="text-decoration: underline #109393;">
				<a class="link-green" href="<?= base_url('cadastro_novocadastro') ?>">Ainda não tem conta? Clique aqui e faça seu cadastro!</a>
			</div>
		</form>
		
	</div>
</div>
<!-- form-center py-5 mb-3 -->


<div class="login">
	<div class="inf-cadastro">
		<div>
		<img src="<?= $imgPath ?>logo-branco.png"  alt="...">
		<h1>Olá!</h1>
		<h3>Otimize sua agenda e seja<BR>
		encontrado com mais facilidade<BR>por quem precisa de você!</h3>
		</div>

    </div>

	<div class="form ">
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
		<?= form_open_multipart(base_url('Acesso/index'), ' id="formLogin"'); ?>
			<div class="form-group col-lg-10">
			<!-- <img src="<?= $imgPath ?>queromed_logo.png"> -->
			<h3 class="titulos">Entrar</h3>
			<span class="desc">Para continuar, inicie a sessão com sua conta.</span>
			</div>
			<div class="form-group col-lg-10">
				<input type="hidden" class="form-control" id="inputTipoLogin" name="tipoLogin" value="clinica">
				<label for="inputEmail">E-mail</label>
				<input type="email" class="form-control login-field" placeholder="Informe seu e-mail" id="inputEmail" name="inputEmail"
					aria-describedby="emailHelp" value="<?php echo set_value('inputEmail')?>" required>
				<small id="emailHelp" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-lg-10">
				<label for="inputPassword">Senha</label>
				<input type="password" class="form-control login-field" placeholder="Digite sua senha" id="inputPassword" name="inputPassword" required>
				<div class="link" align="right">
					<a href="<?= base_url('Acesso/recuperarsenha') ?>">Esqueceu sua senha?</a>
				</div>
			</div>
			<div class="text-center form-group col-lg-10">
				<button class="btn-login" type="submit" >Entrar</button>
				
			</div>
			<div class="text-center" style="text-decoration: underline #109393;">
				<a class="link-green" href="<?= base_url('Acesso/cadastrar_empresa') ?>">Ainda não tem conta? Clique aqui e faça seu cadastro!</a>
			</div>
		</form>
	</div>
</div>


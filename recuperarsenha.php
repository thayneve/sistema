<div class="login">
	<div class="inf-cadastro2">
		<div>
		<img src="<?= $imgPath ?>logo-branco.png"  alt="...">
		<h2>Se você esqueceu ou perdeu sua senha, não se preocupe!</h2>
		<h3>É só seguir a recomendação ao lado.</h3>
		</div>
    </div>
	<div class="form">
		<?php if ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
			<?php $this->session->flashdata('error', ''); ?>
		<?php endif; ?>
									
		<?php if ($this->session->flashdata('message')) : ?>
			<div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
			<?php $this->session->flashdata('message', ''); ?>
		<?php endif; ?>
		
		<?= form_open_multipart(base_url('Acesso/recuperarsenha'), ' id="formRecuperarSenha"  class="col-sm"'); ?>
			<div class="form-group col-lg-9 text-left"><br>
				<a class="btn btn-primary btn-voltar" href="<?= base_url('login') ?>"><i class="fas fa-chevron-left"></i> Voltar</a>
				<h3 class="titulos">Recuperação de senha</h3>
				<span class="desc">Adicione seu email cadastrado abaixo e enviaremos uma nova senha de acesso.</span>
			</div>

			<div class="form-group col-lg-9 text-left">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" required>
				<small id="emailHelp" class="form-text text-muted"></small>
				<div class="text-center form-group col-lg-12" align="right">
					<button class="btn-login" style="width: 100%;margin-top: 2%;" type="submit" >Enviar</button>
				</div>
			</div>

		</form>
	</div>
</div>


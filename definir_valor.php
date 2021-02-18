<div class="row">
	<div class="row mx-0 alert-100 text-center">
    <?php if ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
			<?php $this->session->flashdata('error', ''); ?>
		<?php endif; ?>

		<?php if ($this->session->flashdata('message')) : ?>
			<div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
			<?php $this->session->flashdata('message', ''); ?>
		<?php endif; ?>
	</div>
</div>
<div class="edit2">
<h3 class="titulo-pages">Serviço</h3>
<a class="btn btn-primary btn-voltar" href="<?= base_url('Sistema/produtos/'.$empresa_id) ?>"><i class="fas fa-caret-left"></i>  Voltar</a>
	<div class="form-int">
		<?= form_open_multipart(base_url('Sistema/salvar_valores'), ' id="formDefinirValoresProduto"'); ?>
		<input type="hidden" name="empresa_id" value="<?= $empresa_id ?>" >
		<div class="form-group form">
			<label for="nome">Exame/Consulta</label>
			<select class="custom-select" name="produto_empresa">
				<option  selected></option>
				<?php foreach($listaProdutos as $p):?>
					<option value="<?php echo $p['id']; ($p['id']) == 'selected'?$id = $p['id']:'';?>"><?php echo $p['produto_descricao'].' - '.$p['produto_tipo'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group form">
			<label for="nome">Convênio</label>
			<select class="custom-select" name="convenio">
				<option  selected></option>
				<?php foreach($convenios as $c):?>
					<option value="<?php echo $c['id']; ($c['id']) == 'selected'?$id = $c['id']:'';?>"><?php echo $c['nome_convenio'].' - '.$c['codigo_convenio'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group form">
			<label for="nome">Valor</label>
			<input type="text" class="form-control" id="nome" name="valor" onkeyup="k(this);" required>
			<label for="codigo">Comissão</label>
			<input type="text" class="form-control" id="codigo" name="comissao" onkeyup="k(this);" required>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-login" type="submit" >Cadastrar</button>
		</div>
		</form>
	</div>
</div>

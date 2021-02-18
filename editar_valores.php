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
<h3 class="titulo-pages">Editar Serviço</h3>
<div class="m-5">
<h4 class="text-center"><?= $produto_convenio['descricao']." - ".$produto_convenio['tipo_produto'] ?></h4>
<a class="btn btn-primary btn-voltar" href="javascript:history.go(-1)"><i class="fas fa-caret-left"></i>  Voltar</a>
	<?= form_open_multipart(base_url('Sistema/salvar_valores'), ' id="formEditarValoresProduto"'); ?>
	<input type="hidden" name="id" value="<?= $produto_convenio['id'] ?>" >
	<input type="hidden" name="empresa_id" value="<?= $produto_convenio['empresa_id'] ?>" >
	<input type="hidden" name="editar" value="<?= TRUE ?>" >
    <div class="form-group">
        <input type="hidden" name="produto_empresa" value="<?= $produto_convenio['empresa_produto_id']?>">
	</div>
	<div class="form-group form">
		<label for="conv">Convênio</label>
        <select class="custom-select" name="convenio">
            <option   value="<?php echo $produto_convenio['convenio_id'];?>"><?php echo $produto_convenio['nome_convenio']?></option>
            <?php foreach($convenios as $c):?>
                <option value="<?php echo $c['id']; ($c['id']) == 'selected'?$id = $c['id']:'';?>"><?php echo $c['nome_convenio'].' - '.$c['codigo_convenio'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
	<div class="form-group form">
		<label for="nome">Valor</label>
		<input type="text" class="form-control" id="nome" name="valor" value="<?= $produto_convenio['valor']?>" onkeyup="k(this);" required>
		<label for="codigo">Comissão</label>
		<input type="text" class="form-control" id="codigo" name="comissao" value="<?= $produto_convenio['comissao']?>" onkeyup="k(this);" required>
	</div>
	<div class="text-center">
		<button class="btn btn-primary btn-login" type="submit" >Editar</button>
	</div>
	</form>
</div>
</div>

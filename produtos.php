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
<h3 class="titulo-pages">Serviços/Valores</h3>
<!-- <a class="btn btn-primary btn-voltar" href="<?= base_url('Empresa/listar_empresas')?>"><i class="fas fa-caret-left"></i>  Voltar</a> -->
<table id="tab_prod_valor" class="display container tabela-conv responsive nowrap">
    <thead>
        <tr>
            <th>Serviço</th>
            <th>Convênio</th>
            <th>Valor</th>
            <th>Comissão</th>
            <?php if($this->usuario->perfil_id != $this->meta['empresaUsuarioClinicaPerfil']):?>
                <th>Editar</th>
                <th><a href="<?= base_url('Sistema/definir_valores/'.$empresa_id)?>"><i class="fas fa-plus"></i> novo</a></th>
            <?php endif ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach($produtos as $p):?>
        <tr>
            <td data-label="Serviço"><?= $p['descricao'] .' - '. $p['tipo_produto']?></td>
            <td data-label="Convênio"><?= $p['nome_convenio']?></td>
            <td data-label="Valor"><?= $p['valor']?></td>
            <td data-label="Comissão"><?= $p['comissao']?></td>
            <?php if($this->usuario->perfil_id != $this->meta['empresaUsuarioClinicaPerfil']):?>
                <td><a href="<?= base_url('Sistema/editar_valores/'.$p['id'])?>"><i class="fas fa-edit"></i></a></td>
                <td><a href="<?= base_url('Sistema/apagar_valores/'.$p['id'])?>"><i class="fas fa-trash-alt"></i></a></td>
            <?php endif ?>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
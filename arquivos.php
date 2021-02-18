<div class="container">
	<!-- w3-->
	<div class="stepform">
		<div class="step"
			 style="text-align:center; background: url(<?= $imgPath ?>calendar-day-solid.svg) no-repeat center; background-size:60% 60%;">
			<p>Agendamento</p>
		</div>
		<div class="step"
			 style="text-align:center;background: url(<?= $imgPath ?>file-medical-alt-solid.svg) no-repeat center;
				 background-size:60% 60%;">
			<p>Dados do pacientes</p>
		</div>
		<div class="step step1" style="text-align:center;background: url(<?= $imgPath ?>id-card-solid.svg) no-repeat center;
			background-size:60% 60%;">
			<p>Requisição Médica</p>
		</div>
		<div class="step"
			 style="text-align:center;background: url(<?= $imgPath ?>notes-medical-solid.svg) no-repeat center;
				 background-size:60% 60%;">
			<p>Informações </p>
		</div>
		<div class="step" style="text-align:center;background: url(<?= $imgPath ?>check-solid.svg) no-repeat center;
			background-size:60% 60%;">
			<p>Finalizar</p>
		</div>
	</div>
</div>
<div class="row">
	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
		<?php $this->session->flashdata('error', ''); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('message')) : ?>
		<div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
		<?php $this->session->flashdata('message', ''); ?>
	<?php endif; ?>
</div>

<div class="row agendamento" id="regForm" style="border-radius: 30px;width: 41% !important;">
	<?php
	$pedido =  $idPedido . '-' . $idPacientePedido;
	$URL = 'Pedidos/Arquivos/' .$pedido ?>
	<?= form_open_multipart(base_url($URL), ' id="formPedidosArquivo"'); ?>
	<input type="hidden" name="idTagData" id="<?= $pedido ?>"/>
	<div class="tabb">
		<div class="tit-tab">Requisição Médica</div>
		<p>Inserir foto ou arquivo legível da Requisição Médica</p>
		<div class="upload">
			<input type="file" id="input-file-now-custom-1" name="arquivo" placeholder="Arraste os arquivos para cá"
				   class="file-upload" required/>
		</div>
	</div>
	<br/><br/>
	<div class="btn-solic" style="overflow:auto;">
		<div align="center">
			<button type="submit" class="btn-next">Próximo</button>
		</div>
	</div>
	</form>
</div>

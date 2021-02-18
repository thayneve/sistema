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
		<div class="step" style="text-align:center;background: url(<?= $imgPath ?>id-card-solid.svg) no-repeat center;
			background-size:60% 60%;">
			<p>Requisição Médica</p>
		</div>
		<div class="step step1"
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
<div class="row agendamento" id="regForm" style="border-radius: 30px;box-shadow: 0px 0px 20px #C4C4C4;width: 43% !important;">
	<?php
	$pedido = $idPedido . '-' . $idPacientePedido;
	$URL = 'Pedidos/InformacoesPaciente/' . $pedido ?>
	<?= form_open_multipart(base_url($URL), ' id="formPedidosInformacoes"'); ?>
	<input type="hidden" name="dadosPedido" value="<?= $pedido ?>">
	<div class="tabb">
		<div class="tit-tab">Informações</div>
		<p>Quais sintomas o paciente apresentou?</p>
		<div class="row">
			<?php foreach ($infoSintomas as $key => $value): ?>
				<div class="radio-inline col-6">
					<input type="checkbox" class="checkbox2" value="<?= $value->id ?>" name="sintomas[]"
						   aria-label="teste">
					<p><?= $value->descricao ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<div><BR>
			<p>Quais condições de saúde o paciente tem?</p>

			<?php foreach ($infoCondicoes as $key => $value): ?>
				<div class="radio-inline">
					<input type="checkbox" class="checkbox3" value="<?= $value->id ?>" name="condicoes[]"
						   aria-label="teste">
					<p><?= $value->descricao ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div><BR>
	<div class="btn-solic" style="overflow:auto;">
		<div align="center">
			<button type="submit" class="btn-next">Próximo</button>
		</div>
	</div>
	</form>
</div>

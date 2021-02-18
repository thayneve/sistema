<div class="container">
	<!-- w3-->
	<div class="stepform">
		<div class="step step1"
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
<div class="row agendamento-resp" >
	<div class="row" style="margin-left: 35%;margin-top: 2%;width: 31%;margin-bottom: -56px;display: none;"
		 id="pedidosPendenteRealizados">
		<div class="col">
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Botão dropdown
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Alguma ação</a>
					<a class="dropdown-item" href="#">Outra ação</a>
					<a class="dropdown-item" href="#">Alguma coisa aqui</a>
				</div>
			</div>
		</div>
		<div class="col">
			<button type="button" class="btn btn-primary">
				Pendentes <span class="badge badge-light">4</span>
			</button>
		</div>
	</div>
	<?= form_open_multipart(base_url('Pedidos/NovaSolicitacaoCliente/' . $numeroPedido), ' id="formPedidosNovaSolicitacao" class="agendamento"'); ?>
	<!-- Tab1 de Agendamento -->
	<input type="hidden" value="<?= $numeroPedido; ?>" name="numero_pedido">
	<div class="tabb tab1">
		<div class="tit-tab">Agendamento</div>
		<p><span style="color: #000000; font-weight: bold">Escolha a quantidade de solicitações desejadas.</span>
			<br/>
			<span style="color: #aa0000; font-weight: bold">
			A cada solicitação selecionada é equivalente para 1 pessoa fazer o exame.
			</span>
		</p>
		<div class="input-group ">
			<select class="form-control quantexame" style="max-width: 18%;margin-top: 3%;" name="quantidade"
					id="exampleFormControlSelect1">
				<option value="0">0</option>
				<?php for ($i = 0; $i < count($filasQuantidade); $i++): ?>
					<option value="<?= (1 + $i) ?>"><?= (1 + $i) ?></option>
				<?php endfor; ?>
			</select>
		</div>

		<br/>
		<!-- <p>Escolha o dia da coleta</p> -->
		<!-- <div id="datetimepicker13"></div> -->
		<!-- <br/> -->
		<div style="text-align: center !important;">
			<p style="color: #000000; font-weight: bold">Selecione a(s) coleta(s) desejada(s) com o sua respectiva(s)
				data(s) e horáiro(s) livre(s):</p>
		</div>
		<p style="color: #aa0000; font-weight: bold">
			<br/>
			Pesquise entre as coletas as data(s) e hora(s) livre(s).
			<br/>
			Após selecionar a(s) desejada(s), marque ao lado.</p>
		<div class="form-row hora1 text-center">
			<?php $i = 0;
			$arrayFilas = array(); ?>
			<div class="col-md-2 coleta" id="id_fila_<?= $value->id ?>" style="color: #000000; font-weight: bold">

			</div>
			<div class="col-md-4 info-select-pc" id="data_<?= $value->id ?>" style="color: #000000; font-weight: bold">
				Data
			</div>
			<div class="col-md-4 info-select-pc" id="horario_<?= ($i + 1) ?>" style="color: #000000; font-weight: bold">
				Horário
			</div>
			<div class="col-md-2 info-select-pc" id="check_fila_<?= $value->id ?>" style="color: #000000; font-weight: bold">
				Selecione
			</div>
			<?php foreach ($filasQuantidade as $key => $value): ?>
				<?php $arrayFilas[] = $i + 1; ?>
				<div class="col-md-2 coleta" id="id_fila_<?= $value->id ?>" style="display: block;">
					<?php if ($key < 10): ?>
						<span style="font-weight: bold">Coleta 0<?= ($key + 1) ?></span>
					<?php else: ?>
						<span style="font-weight: bold">Coleta <?= ($key + 1) ?></span>
					<?php endif; ?>
				</div>
				<div class="col-md-4 info-select-mb" id="data_<?= $value->id ?>" style="color: #000000; font-weight: bold">
				Data
			</div>
				<div class="col-md-4 data" id="data_<?= $value->id ?>" style="display: block;">
					<select class="form-control quantexame select_data" style="max-width: 100%;"
							id="data_<?= $value->id ?>" name="data_<?= $value->id ?>">
						<option value="">Selecione...</option>
						<?php foreach ($filasHorarios as $key => $valeu): ?>
							<option value="<?= $key ?>"><?= date('d/m/Y', strtotime($key)) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-4 info-select-mb" id="data_<?= $value->id ?>" style="color: #000000; font-weight: bold">
				Horário
			</div>
				<div class="col-md-4 hora" id="horario_<?= ($i + 1) ?>" style="display: block;">
					<select class="form-control quantexame select_hora" style="max-width: 100%;"
							id="hora_<?= $value->id ?>" name="hora_<?= $value->id ?>">
					</select>
				</div>
				<div class="col-md-4 info-select-mb" id="data_<?= $value->id ?>" style="color: #000000; font-weight: bold">
				Selecione
			</div>
				<div class="col-md-2" id="check_fila_<?= $value->id ?>" style="display: block;">
					<input type="checkbox" id="check_fila_<?= $value->id ?>" name="check_fila_<?= $value->id ?>"
						   value="<?= $value->id ?>" class="checkBoxFilaSelect">
				</div>
				<?php $i++; endforeach; ?>
		</div>
	</div>
	<br/><br/>
	<div class="btn-solic" style="overflow:auto;">
		<div align="center">
			<button type="submit" class="btn-next" id="btnProximo">Próximo</button>
		</div>
	</div>
</div>
</form>
</div>
<div class="col-8"></div>
</div>
<script type="text/javascript">
	var arrayFilasHorarios = <?= json_encode($filasHorarios);?>;
	var qtdChecked = 0;

	$(function () {
		$('.select_data').change(function (e) {
			let idSelect = $(this).attr('id').split('_');
			let valueSelect = $(this).val();
			let comboHora = 'hora_' + idSelect[1].toString();

			$('#' + comboHora).empty();

			for (var i in arrayFilasHorarios) {
				let selecionado = arrayFilasHorarios[i];
				for (var j in selecionado) {
					let valor = selecionado[j];

					if ((parseInt(valor.fila_id) == parseInt(idSelect[1])) && (valor.data == valueSelect)) {
						let horario = valor.horario.split(':');
						$('#' + comboHora).append($('<option>', {
							value: valor.id,
							text: horario[0] + ':' + horario[1]
						}));
					}
				}
			}
		});
		$("#datetimepicker13").datetimepicker({inline: true, format: 'L'});
	});
</script>

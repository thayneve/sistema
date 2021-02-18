<?php
$nomeExame = '';
$valorExame = 5;
$qtdExame = 1;
$idPag = '';
?>
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
		<div class="step"
			 style="text-align:center;background: url(<?= $imgPath ?>notes-medical-solid.svg) no-repeat center;
				 background-size:60% 60%;">
			<p>Informações </p>
		</div>
		<div class="step step1" style="text-align:center;background: url(<?= $imgPath ?>check-solid.svg) no-repeat center;
			background-size:60% 60%;">
			<p>Finalizar</p>
		</div>
	</div>
</div><BR/>
<row class="covid" align="center">
	<i class="fas fa-shield-virus"></i>Atente-se ao nosso <a class="nav-link" data-toggle="modal" data-target="#modalExemplo" href="#modalExemplo" >MANUAL DE EXAME - COVID 19</a>

	
</row>
<div class="row" style="margin-top: -6%;">
	<form id="regForm" class="agendamento" action="" method="post">
		<div class="tabb">
			<div class="tit-tab">Finalizar</div>
			<div class="row">
				<div class="col" value="num-solicitacoes">
					<p><?= count($pedidosConcluidos); ?> exame(s) solicitado(s)</p>
				</div>
				<?php if ($emAberto > 0): ?>
					<div class="col" value="num-solicitacoes">
						<p><?= $emAberto; ?> exame(s) a inclur</p>
					</div>
				<?php endif; ?>
			</div>
			<?php foreach ($resumoPedidos as $key => $value): ?>
				<div class="row resumo">
					<div class="col-3 date">
						<p class="diastyle" value="dia"><?= date('d', strtotime($value->data)) ?></p>
						<?php switch (date('m', strtotime($value->data))) {
							case 1:
								echo '<p class="messtyle" value="mes">DE JANEIRO</p>';
								break;
							case 2:
								echo '<p class="messtyle" value="mes">DE FEVEREIRO</p>';
								break;
							case 3:
								echo '<p class="messtyle" value="mes">DE MARÇO</p>';
								break;
							case 4:
								echo '<p class="messtyle" value="mes">DE ABRIL</p>';
								break;
							case 5:
								echo '<p class="messtyle" value="mes">DE MAIO</p>';
								break;
							case 6:
								echo '<p class="messtyle" value="mes">DE JUNHO</p>';
								break;
							case 7:
								echo '<p class="messtyle" value="mes">DE JULHO</p>';
								break;
							case 8:
								echo '<p class="messtyle" value="mes">DE AGOSTO</p>';
								break;
							case 9:
								echo '<p class="messtyle" value="mes">DE SETEMBRO</p>';
								break;
							case 10:
								echo '<p class="messtyle" value="mes">DE OUTUBRO</p>';
								break;
							case 11:
								echo '<p class="messtyle" value="mes">DE NOVEMBRO</p>';
								break;
							case 12:
								echo '<p class="messtyle" value="mes">DE DEZEMBRO</p>';
								break;
						} ?>
						<p class="horastyle" value="hora">às <?= date('H:i', strtotime($value->horario)) ?></p>
					</div>
					<div class="col-6">
						<p class="examestyle" value="nome-exame"><?= $value->descricao ?></p>
						<p class="nomestyle" value="nome-paciente"><?= $value->nome ?></p>
					</div>
					<div class="col-3">
						<p class="preco" value="valor-exame">R$ <?= number_format($value->valor, 2, ',', '.'); ?></p>
					</div>
				</div>
				<br/><br/>
				<?php
				$nomeExame = $value->descricao;
				$valorExame = $value->valor;
				$qtdExame = count($resumoPedidos);
				$idPag = $value->numero_pedido;
				?>
			<?php endforeach; ?>
			<div class="btn-solic" style="overflow:auto;">
				<div align="center">
					<?php if ($emAberto > 0): ?>
						<a type="button" class="btn-next"
						   href="<?= base_url('Pedidos/AgendarReservarFilas/' . $idPedido) ?>">Cadastrar a próxima solicitação</a>
					<?php endif; ?>
					<?php if ($emAberto == 0): ?>
						<button type="button" class="btn-next" id="btnPagarPagSeguro">Pagar com PagSeguro</button>
					<?php endif; ?>
				</div>
			</div>
	</form>
</div>
<br/><br/>

</div>

</div>
<div class="col-8"></div>
</div>
<form action="https://pagseguro.uol.com.br/v2/checkout/payment.html" method="post" id="formPagamentoPagSeguro">
	<input name="receiverEmail" type="hidden" value="argoslaboratorio@gmail.com">
	<input name="currency" type="hidden" value="BRL">
	<input name="itemId1" type="hidden" value="0001">
	<input name="itemDescription1" type="hidden" value="<?= $nomeExame ?>">
	<input name="itemAmount1" id="itemAmount1" type="hidden" value="<?= $valorExame ?>">
	<input name="itemQuantity1" id="itemQuantity1" type="hidden" value="<?= $qtdExame ?>">
	<input name="itemWeight1" type="hidden" value="1">
	<input name="reference" id="reference" type="hidden" value="<?= $idPag ?>">
</form>
<script type="text/javascript">
	$(function () {
		$('#btnPagarPagSeguro').click(function (e) {
			$('#formPagamentoPagSeguro').submit();
		});
	});
</script>

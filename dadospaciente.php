<div class="container">
	<!-- w3-->
	<div class="stepform">
		<div class="step "
			 style="text-align:center; background: url(<?= $imgPath ?>calendar-day-solid.svg) no-repeat center; background-size:60% 60%;">
			<p>Agendamento</p>
		</div>
		<div class="step step1"
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
<div class="row ">
	<div class="row" style="margin-left: 35%;margin-top: 2%;width: 31%;margin-bottom: -56px;"
		 id="pedidosPendenteRealizados">
		<div class="col" style="display: none;">
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
		<?php if ($emAberto > 0): ?>
			<div class="col" align="center">
				<button type="button" class="btn btn-primary btn-pen">
					Pendentes <span class="badge badge-light"><?= $emAberto ?></span>
				</button>
			</div>
		<?php endif; ?>
	</div>
	<br/>

	<br/>
	<form id="regForm" class="agendamento" action="" method="post">
		<!-- Tab1 de Agendamento -->
		<div class="tabb tab2">
			<div class="tit-tab">Dados do paciente</div>
			<div class="form-group">
				<p>Selecione a data e hora para este paciente*</p>
				<select class="form-control quantexame" style="max-width: 100%;" name="dataHoraExame" id="dataHoraExame">
					<?php foreach ($horariosDisponiveis as $key => $value) : ?>
						<option
							value="<?= $value->idFila ?>|<?= $value->data ?>"><?= date('d/m/Y', strtotime($value->data)) ?> <?= $value->horario ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<p>Nome completo*</p>
				<input type="text" class="form-control datapacien" id="inputName" name="inputName"
					   placeholder="Nome completo">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<p>CPF* (ou CPF do responsável)</p>
					<input type="text" class="form-control datapacien" id="cpf" name="cpf"
						   onkeypress="$(this).mask('000.000.000-00')"
						   placeholder="CPF">
				</div>
				<div class="form-group col-md-6">
					<p>É profissional da saúde?*</p>
					<div class="radio-inline">
						<input type="radio" class="input1" name="inlineRadioOptions" id="inlineRadio2"
							   value="S">
						<p class="form-check-label radio2" for="inlineRadio2">Sim</p>
						<input type="radio" class="input1" name="inlineRadioOptions" id="inlineRadio3" value="N" checked>
						<p class="form-check-label " for="inlineRadio2">Não</p>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<p>Data de nascimento*</p>
					<input type="date" class="form-control datapacien" id="inputdata" name="nascimento"
						   placeholder="25/03/1996">
				</div>
				<div class="form-group col-md-6">
					<p>Sexo*</p>
					<div class="radio-inline">
					    <input type="radio" class="input1" name="inlineRadioOptions1" id="inlineRadio1" checked
							   value="N">
						<p class="form-check-label" for="inlineRadio2">Não Informar</p>
						<input type="radio" class="input1" name="inlineRadioOptions1" id="inlineRadio1"
							   value="F">
						<p class="form-check-label radio2" for="inlineRadio2">Feminino</p>
						<input type="radio" class="input1" name="inlineRadioOptions1" id="inlineRadio1" value="M">
						<p class="form-check-label" for="inlineRadio2">Masculino</p>
					</div>
				</div>
			</div>
			<BR>
			<div class="divisor">
				<hr WIDTH=30% ALIGN=left>
				Endereço
				<hr WIDTH=30% ALIGN=right>
			</div>
			<div class="form-row">
				<div class="col-md-4">
					<p>CEP*</p>
					<input type="text" class="form-control datapacien" id="inputCep" name="cep"
						   onkeypress="$(this).mask('00.000-000')"
						   placeholder="CEP">
				</div>
				<div class="col-md-6">
					<p>Logradouro*</p>
					<input type="text" class="form-control datapacien" id="inputLogradouro" name="logradouro"
						   placeholder="Logradouro">
				</div>
				<div class="col-md-2">
					<p>Número*</p>
					<input type="text" class="form-control datapacien" id="inputNumero" name="numero"
						   placeholder="Nº">
				</div>
			</div>
			<BR>
			<div class="form-row">
				<div class="col-md-3">
					<p>Complemento</p>
					<input type="text" class="form-control datapacien" id="inputComplemento" name="complemento"
						   placeholder="Complemento">
				</div>
				<div class="col-md-3">
					<p>Bairro*</p>
					<input type="text" class="form-control datapacien" id="inputBairro" name="bairro"
						   placeholder="Bairro">
				</div>
				<div class="col-md-3">
					<p>Município*</p>
					<input type="text" class="form-control datapacien" id="inputCidade" name="municipio"
						   placeholder="Cidade">
				</div>
				<div class="col-md-3">
					<p>Estado*</p>
					<input type="text" class="form-control datapacien" id="inputUF" name="uf" placeholder="UF">
				</div>
			</div>
			<BR>
			<div class="divisor">
				<hr WIDTH=30% ALIGN=left>
				Contato
				<hr WIDTH=30% ALIGN=right>
			</div>
			<div class="form-row">
				<div class="col-md-4">
					<p>Telefone Celular*</p>
					<input type="text" class="form-control datapacien" id="contato_1" name="contato_1"
						   placeholder="Tel. Celular" onkeypress="$(this).mask('(00) 00000-0000')">
				</div>
				<div class="col-md-4">
					<p>Telefone Residencial</p>
					<input type="text" class="form-control datapacien" id="contato_2" name="contato_2"
						   placeholder="Tel. Residencial" onkeypress="$(this).mask('(00) 0000-0000')">
				</div>
				<div class="col-md-4">
					<p>Telefone de contato</p>
					<input type="text" class="form-control datapacien" id="contato_3" name="contato_3"
						   placeholder="Tel. Contato" onkeypress="$(this).mask('(00) 00000-0000')">
				</div>
				<p class="obg">*Campos obrigatórios</p>
			</div>
			<BR><BR>
			<div class="btn-solic" style="overflow:auto;">
				<div align="center">
					<button type="button" class="btn-next" id="btnProximo">Próximo</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="col-8"></div>
</div>
<?php $URL = 'Pedidos/AgendarReservarFilas/' . $idPedido; ?>
<?= form_open_multipart(base_url($URL), ' id="formPedidosDadosPaciente"'); ?>
<input type="hidden" name="nome" id="nome_send" value="0"/>
<input type="hidden" name="cpf" id="cpf_send" value=""/>
<input type="hidden" name="profissional_saude" id="inlineRadioOptions_send"/>
<input type="hidden" name="nascimento" id="nascimento_send"/>
<input type="hidden" name="sexo" id="inlineRadioOptions1_send"/>
<input type="hidden" name="cep" id="cep_send"/>
<input type="hidden" name="logradouro" id="logradouro_send" value="0"/>
<input type="hidden" name="numero" id="numero_send" value=""/>
<input type="hidden" name="complemento" id="complemento_send"/>
<input type="hidden" name="bairro" id="bairro_send"/>
<input type="hidden" name="municipio" id="cidade_send"/>
<input type="hidden" name="uf" id="uf_send"/>
<input type="hidden" name="contato_1" id="contato_1_send"/>
<input type="hidden" name="contato_2" id="contato_2_send"/>
<input type="hidden" name="contato_3" id="contato_3_send"/>
<input type="hidden" name="data_hora_selecionado" id="data_hora_selecionado"/>
</form>
<script type="text/javascript">
	$(function () {
		$(document).on('blur', '#inputdata', function (e) {
			let dataAtual = new Date();
			let data = new Date($(this).val());
			if (data > dataAtual) {
				$(this).val('');
				alert('O campo DATA NASCIMENTO inválido.');
				return;
			}
		});
		$(document).on('blur', '#inputCep', function (e) {
			if ($.trim($(this).val()) == '')
				return;

			let dataSend = {
				cep: $(this).val()
			};

			$.ajax({
				url: '<?=base_url()?>Principal/Cep',
				method: 'post',
				data: dataSend,
				dataType: 'json',
				success: function (response) {
					$('#inputCep').val(response.cep);
					$('#inputLogradouro').val(response.logradouro);
					$('#inputBairro').val(response.bairro);
					$('#inputCidade').val(response.cidade);
					$('#inputUF').val(response.uf);
					if ($.trim(response.logradouro) != '')
						$('#inputNumero').focus();
				}
			});
		});

		$('#btnProximo').click(function (e) {
			$('#nome_send').val($('#inputName').val());
			$('#cpf_send').val($('#cpf').val());
			$('#inlineRadioOptions_send').val($("input[name='inlineRadioOptions']:checked").val());
			$('#nascimento_send').val($('#inputdata').val());
			$('#inlineRadioOptions1_send').val($("input[name='inlineRadioOptions1']:checked").val());
			$('#cep_send').val($('#inputCep').val());
			$('#logradouro_send').val($('#inputLogradouro').val());
			$('#numero_send').val($('#inputNumero').val());
			$('#complemento_send').val($('#inputComplemento').val());
			$('#bairro_send').val($('#inputBairro').val());
			$('#cidade_send').val($('#inputCidade').val());
			$('#uf_send').val($('#inputUF').val());
			$('#contato_1_send').val($('#contato_1').val());
			$('#contato_2_send').val($('#contato_2').val());
			$('#contato_3_send').val($('#contato_3').val());
			$('#data_hora_selecionado').val($('#dataHoraExame').val());

			let continuar = true;

			if ($.trim($("#inputName").val()) == '') {
				alert('O campo NOME não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#cpf").val()) == '') {
				alert('O campo CPF não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputdata").val()) == '') {
				alert('O campo DATA NASCIMENTO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputCep").val()) == '') {
				alert('O campo CEP não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputLogradouro").val()) == '') {
				alert('O campo LOGRADOURO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputNumero").val()) == '') {
				alert('O campo NÚMERO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputNumero").val()) == '') {
				alert('O campo NÚMERO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputBairro").val()) == '') {
				alert('O campo BAIRRO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputCidade").val()) == '') {
				alert('O campo CIDADE não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#inputUF").val()) == '') {
				alert('O campo ESTADO não pode ser em branco');
				continuar = false;
				return;
			}

			if ($.trim($("#contato_1").val()) == '') {
				alert('O campo TELEFONE CELULAR não pode ser em branco');
				continuar = false;
				return;
			}

			if (continuar)
				$('#formPedidosDadosPaciente').submit();
		});
	});
</script>

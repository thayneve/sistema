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
<div class="mx-auto tit-dados"> 
<h3 class="titulo-pages">Verifique os dados do seu agendamento</h3>
</div>
<div class="mx-auto infor-exameseconsultas">
    <div class="card-body card-info-marcacao">
    <div class="row veri-dados">
        <div class="col-6">
        <h4><?= $produto_empresa['decricao_tipo'] ?> - <?= $produto_empresa['descricao'] ?></h4>
        <h5>Data: <?= date_format(date_create($agenda->data), 'd/m/Y') ?></p>
        <h5>Horário: <?= $agenda->horario ?></h5>
        <h5>Paciente: <?= $usuario->nome ?></h5>
        <h5>Médico: <?= $medico['nome'] ?></h5>
        </div>
        <div class="col-6">
        
        <h5>Observações: <?php echo ($produto_empresa['obs'] == "")?'Nenhuma':$produto_empresa['obs'] ?></h5>
        <label for="inputFpagamento">Forma de pagamento:</label>
        <select class="select-pag"  onChange="update(this)" id="inputFpagamento"  require>
            <option selected="selected"></option>
            <?php foreach($tipo_pagamento as $p):?>
                <option value="<?= $p['id']?>" ><?= $p['nome_convenio'] ?></option>
            <?php endforeach; ?>
        </select>

        <label class="val">Valor:</label>
         <p class="valor-prod-card" id="valor-prod-card"> </p>
        </div>
    </div>
    </div>
</div>
<div class="form-center">
    <?= form_open_multipart(base_url('ConsultasMedico/marcar_consulta'), ' id="formCadastroNovoMedico"'); ?>
        <input type="hidden" name="agenda" id="inputAgendaId" value="<?= $agenda->id?>">
        <input type="hidden" name="produto" value="<?= $agenda->produto_id?>">
        <input type="hidden" name="empresa" id="inputEmpresa" value="<?= $agenda->empresa_id?>">
        <input type="hidden" name="formapagamento" id="inputFormaPagamento" value="" >
        <input type="hidden" name="outra_pessoa" id="outra_pessoa" value='0' >
        <label class="btn btn-primary btn-outra-pessoa" onclick="opcoes()" id="outra_pessoa_col" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">Esse agendamento é para outra pessoa?</label>
        <BR>

    <div class="collapse" id="collapseExample2">
        <div class="card card-body">
            <div class="form-outra-pessoa">
                <label for="nome">Nome:</label>
                <input class="form-control input-circle" type="text" name="nome" id="" value="<?php echo set_value('nome')?>">
                <BR>
                <label for="nome">RG ou CPF do Paciente ou Responsável:</label>
                <input class="form-control input-circle" type="text" value="<?php echo set_value('documento')?>" name="documento" onkeypress="$(this).mask('0000000000000000000000')" onpaste="$(this).mask('0000000000000000000000')">
                <BR>
                <label for="nascimento">Data de Nascimento:</label>
                <input class="form-control input-circle" type="date" value="<?php echo set_value('nascimento')?>"  name="nascimento" id="inputData">
                <BR>
                <label class="label mr-2" for="inputSexo">Sexo :</label>
                <div> 
                    <label class="mr-2" >Masculino 
                        <input type="radio" id="inputSexo" name="inputSexo" value="M" <?= ($produto['sexo']=='M' || set_value('inputSexo') == 'M')? 'checked':''; ?> > 
                    </label>
                    <label class="mr-2" >Feminino 
                        <input type="radio" id="inputSexo" name="inputSexo" value="F" <?= ($produto['sexo']=='F' || set_value('inputSexo') == 'F')? 'checked':''; ?> > 
                    </label>
                </div>
            </div>
        </div>
    </div>
        <button  type="submit">Confirmar agendamento <i class="fas fa-angle-right"></i></button>
    </form>
</div>

<script type="text/javascript">
    function update(e) {
       x = document.getElementById('inputFormaPagamento').value = e.value;
        <?php foreach($tipo_pagamento as $p):?>
            if( e.value == <?= json_encode($p['id'], JSON_UNESCAPED_UNICODE)?>){
                let valor = "R$" + <?= json_encode($p['valor'], JSON_UNESCAPED_UNICODE)?>;
                document.getElementById('valor-prod-card').innerHTML = valor.replace(".", ",")
            }
            <?php endforeach; ?>
        }

        function opcoes(){
            if(document.getElementById('outra_pessoa').value == '0'){
                document.getElementById('outra_pessoa').value = '1';
            }else{
                document.getElementById('outra_pessoa').value = '0';
            }
        }
        $(function () {
		$(document).on('blur', '#inputData', function (e) {
			let dataAtual = new Date();
			let data = new Date($(this).val());
			if (data > dataAtual) {
				$(this).val('');
				alert('O campo DATA NASCIMENTO inválido.');
				return;
			}
		});
	});
</script> 
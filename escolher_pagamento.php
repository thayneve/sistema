<div class="mx-auto tit-dados"> 
<h3 class="titulo-pages">Revisão dos dados</h3>
</div>
<div class="mx-auto infor-exameseconsultas">
    <div class="card-body card-info-marcacao">
    <div class="row veri-dados">
        <div class="col-6">
            <h4><?= $produto_empresa['decricao_tipo'] ?> - <?= $produto_empresa['descricao'] ?></h4>
            <h5>Data: <?= date_format(date_create($consulta->data), 'd/m/Y') ?></p>
            <h5>Horário: <?= $consulta->horario ?></h5>
            <h5>Paciente: <?= ($consulta->nome == null)?$this->usuario->nome:$consulta->nome; ?></h5>
            <h5>Observações: <?php echo ($produto_empresa['obs'] == "")?"Nenhuma":$produto_empresa['obs'] ?></h5>
        </div>
        <div class="col-6 b-dois">
        <h5>Valor: R$ <?php echo str_replace('.',',',$valor_produto['valor']) ?></h5>
        <h5>Endereço: <?= $endereco['logradouro'] ?>, <?= $endereco['numero'] ?>, <?= $endereco['cep'] ?> </h5>
        <h5>Bairro: <?= $endereco['bairro'] ?>/ <?= $endereco['complemento'] ?></h5>
        <h5>Cidade: <?= $endereco['cidade'] ?>/ <?= $endereco['uf'] ?></h5>
        </div>
    </div>
</div>    
<div class="form-center m-auto">
<?php if($valor_produto['convenio_id'] == $this->meta['id_pagseguro_pagamento']):?>
    <form action="https://pagseguro.uol.com.br/v2/checkout/payment.html" method="post" id="formPagamento">
            <input name="receiverEmail" type="hidden" value="thomazneto_1@hotmail.com">
            <input name="produto" type="hidden" value="<?= $produto_empresa['produto_id']?>">
            <?php if($consulta->nome_terceiro != null):?>
                <input name="nome" type="hidden" value="<?= $consulta->nome_terceiro?>">
                <input name="nascimento" type="hidden" value="<?= $consulta->nascimento_terceiro?>">
                <input name="sexo" type="hidden" value="<?= $consulta->sexo_terceiro?>">
                <input name="documento" type="hidden" value="<?= $consulta->documento_terceiro?>">
            <?php endif?>
            <input name="currency" type="hidden" value="BRL">
            <input name="itemId1" type="hidden" value="0001">
            <input name="itemDescription1" type="hidden" value="<?= $produto_empresa['decricao_tipo'] ?> - <?= $produto_empresa['descricao'] ?>">
            <input name="itemQuantity1" id="itemQuantity1" type="hidden" value="1">
            <input name="itemWeight1" type="hidden" value="1">
            <!-- <input name="redirectURL" type="hidden" value="http://localhost/ConsultasMedico/minhas_consultas"> -->
            <input name="reference" id="reference" type="hidden" value="<?= $consulta->cod_transacao ?>">
            <b>Forma de Pagamento:</b><BR>
            <input type="hidden" name="itemAmount1" id="itemAmount1" value="<?= $valor_produto['valor'] ?>" require>
        <button class="btn btn-primary btn-voltar" type="submit">Efetuar pagamento</button><BR><BR>
    </form>
<?php else:?>
<div class="res mt-2">
        <a class="btn btn-primary btn-outra-pessoa" onclick="confirmar(event,'Deseja realmente cancelar seu agendamento?')" href="<?= base_url('ConsultasMedico/cancelar_agendamento/'.$consulta->id) ?>">Cancelar</a>
        <a class="btn btn-primary btn-voltar mt-2" href="<?= base_url('ConsultasMedico/minhas_consultas') ?>">Ir para Minhas consultas</a>
</div>
<?php endif?>
</div>
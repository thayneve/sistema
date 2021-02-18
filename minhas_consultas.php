<?php if($this->usuario->perfil_id==$this->meta['empresaUsuarioMedicoPerfil']):?>
    <h3 class="titulo-pages">Minha agenda médica</h3>
<?php else:?>
    <h3 class="titulo-pages">Minhas consultas e exames</h3>
<?php endif?>
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

<table id="table_emp" class="minhas-consultas">
    <thead>
        <tr>
            <th>Clínica</th>
            <?php if($this->usuario->perfil_id!=$this->meta['empresaUsuarioMedicoPerfil']):?>
                <th>Médico</th>
            <?php else:?>
                <th>Paciente</th>
            <?php endif?>
            <th>Exame/Consulta</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Status</th>
            <?php if($this->usuario->perfil_id!=$this->meta['empresaUsuarioMedicoPerfil']):?>
                <th></th>
                <th></th>
            <?php else:?>
            <?php endif?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consultas as $c):?>
            <tr>
                <td data-label="Clínica"><?= $c['nomefantasia']?></td>
                <td data-label="Médico"><?= $c['nome']?></td>
                <td data-label="Exame/Consulta"><?= $c['produto']?></td>
                <td data-label="Data"><?= date('d/m/Y',strtotime($c['data']))?></td>
                <td data-label="Horário"><?= $c['horario']?></td>
                <td data-label="Status"><?php if($c['status']=="aguardando_pagamento" && $this->usuario->perfil_id!=$this->meta['empresaUsuarioMedicoPerfil']):?>
                        <b style="color: #cc8300;">aguardando pagamento</b>
                    <?php elseif($c['status'] == "pago-atendido"):?>
                        <b style="color: #00537b;">atendimento finalizado</b>
                    <?php elseif($c['status'] == "cancelada"):?>
                        <b style="color: #9c0000;">cancelado</b>
                    <?php else:?>
                        <?php if($this->usuario->perfil_id!=$this->meta['empresaUsuarioMedicoPerfil']):?>
                            <b style="color: #3a925e;"><?= $c['status'];?></b>
                        <?php else:?>
                            <b style="color: #3a925e;">Confirmada</b>
                        <?php endif?>
                    <?php endif?>
                </td>
                <?php if($this->usuario->perfil_id!=$this->meta['empresaUsuarioMedicoPerfil']):?>
                    <td>
                        <?php if( date('Y-m-d', time()) <= $c['data'] && $c['status'] != "cancelada" && $c['status'] != "pago-atendido" ): ?>
                            <a class="btn btn-primary btn-voltar" href="<?= base_url("ConsultasMedico/remarcar_consulta/".$c['id'] )?>">Remarcar</a>
                        <?php endif ?>
                    </td>
                    <td>
                    <?php if( date('Y-m-d', time()) < $c['data'] && $c['status'] != "cancelada" && $c['status'] != "pago" && $c['status'] != "pago-atendido"  ):?>
                        <a class="btn btn-primary btn-voltar" href="#" id="btn_cancelar" onclick="submit('<?= $c['transacao_pagseguro'] ?>')" >Cancelar</a>
                        <input id="transacao" name="transactionCode" type="hidden" value="<?= $c['transacao_pagseguro']?>">
                    <?php endif ?>
                <?php endif ?>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

<script>
function submit($transacao){
    var r = confirm("Deseja realmente cancelar o agendamento?");
    if (r == true) {
        $.ajax({
            type : "POST",
            url : "https://ws.pagseguro.uol.com.br/v2/transactions/cancels",
            dataType: "xml",
            data : {
                email: 'thomazneto_1@hotmail.com',
                token: '2e0dfcd2-c616-4f86-9460-1312a3d54939ab1237ca45d794143bf855a23558cd7caae8-1523-46c6-a118-8224a58a586c',
                transactionCode: $transacao,
            },
            headers : {
                'Access-Control-Request-Headers' : 'application/x-www-form-urlencoded; charset=ISO-8859-1'
            },
            success : function(msg) {
                document.querySelector('#table_emp').innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center" style="width: 100%; text-align: center !important;">
                            <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </td>
                    </tr>
                `
                setTimeout(function() {
                    location.reload();
                }, 6000);
                alert('Solicitação feita com sucesso.');
            },
            error : function (xhr, status, error) {
                document.querySelector('#table_emp').innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center" style="width: 100%; text-align: center !important;">
                            <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </td>
                    </tr>
                `
                setTimeout(function() {
                    location.reload();
                }, 6000);
            }
        });
    } else {
    }
};
</script>
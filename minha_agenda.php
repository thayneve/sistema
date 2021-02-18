<h3 class="titulo-pages">Meus horários</h3>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger text-center"> <?= $this->session->flashdata('error') ?> </div>
    <?php $this->session->flashdata('error', ''); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success text-center"> <?= $this->session->flashdata('message') ?> </div>
    <?php $this->session->flashdata('message', ''); ?>
<?php endif; ?>
<div>
    <?php if($this->usuario->perfil_id == $this->meta['empresaUsuarioClinicaPerfil']):?>
        <a class="btn btn-primary btn-voltar" href="<?= base_url('lista_usuarios')?>"><i class="fas fa-caret-left"></i> Voltar</a>
    <?php endif?>
</div>
<div class="tamanho-hor">
<table id="table_grade_horario" class="tabela-conv">
    <thead>
        <tr>
            <th>Empresa</th>
            <th>Médico</th>
            <th>Exame/Consulta</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Paciente</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($agenda as $h):?>
            <tr>
                <td><?= $h['nomefantasia']?></td>
                <td><?= $h['medico']?></td>
                <td><?= $h['produto']?></td>
                <td><?= date('d/m/Y',strtotime($h['data']))?></td>
                <td><?= $h['horario']?></td>
                <td><?= $h['nome']?></td>
                <td class="cal">
                    <?php if($h['status'] == "Disponivel"):?>
                        <a  onclick="confirmar(event,'Deseja tornar esse horário indisponível para os clientes ?')"  href="<?= base_url("GradeHorario/cancelar_horario/".$h['id'])?>"><i class="far fa-calendar-times"></i></a>
                    <?php elseif($h['status'] == "Indisponivel" || $h['status'] == "cancelada" ):?>
                        <a  onclick="confirmar(event,'Deseja tornar esse horário disponível para os clientes ?')"  href="<?= base_url("GradeHorario/disponibilizar_horario/".$h['id'])?>"><i class="far fa-calendar-alt"></i></a>
                    <?php endif?>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
</div>


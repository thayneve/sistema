<h3 class="titulo-pages">Horários</h3>
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
<table  id="table_grade_emp" class="table_emp">
    <thead>
        <tr>
            <th>#</th>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Hora Inicial</th>
            <th>Hora Final</th>
            <th><a href="<?= base_url('novo_horario')?>"><i class="fas fa-plus"></i> novo</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listaHorarios as $key => $h ):?>
            <tr>
                <td data-label=""><?= $key?></td>
                <td data-label="Data Inicial"><?= $h['dataInicial']?></td>
                <td data-label="Data Final"><?= $h['dataFinal']?></td>
                <td data-label="Hora Inicial"><?= $h['horaInicial']?></td>
                <td data-label="Hora Final"><?= $h['horaFinal']?></td>  
                <td data-label=""><a onclick="confirmar(event,'Deseja realmente excluir ?')" href="<?= base_url('Empresa/excluir_horario/'.$h['id'] )  ?>" ><i class="fas fa-trash-alt"></i><BR>
                <a class="btn btn-primary btn-voltar btn-resp-table" href="<?= base_url('novo_horario')?>"><i class="fas fa-plus"></i> novo</a>
            </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

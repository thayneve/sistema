<?php 
?>
<table class='tabela-filtro'>
    <?php foreach($listaEmpresas as $e):?>
                <tr class="tbl">
                    <th>Clínica</th>
                    <th><?= $e['empresa'] ?></th>
                </tr>
        <?php foreach($listaHorarios as $h):?>
            <?php if($e['empresa'] = $h['empresa']):?>
                <?= form_open_multipart(base_url('ConsultasMedico/marcar_consulta'), ' id="formCadastroNovoMedico"'); ?>
                    <input type="hidden" name="agenda" id="inputAgendaId" value="<?= $h['id']?>">
                    <input type="hidden" name="sala_id" id="inputSalaId" value="<?= $h['sala_id']?>">
                    <input type="hidden" name="data" id="inputData" value="<?= $h['data']?>">
                    <input type="hidden" name="horario" id="inputHorario" value="<?= $h['horario']?>">
                    <tr>
                        <th>
                            <?= $h['data']?>
                        </td>
                        <th>
                            <?= $h['horario'] ?>
                        </th>
                        <th><button  type="submit" class="btn-next2">Marcar</button></th>
                    </tr>
                </form>
            <?php endif?>
        <?php endforeach ?>
    <?php endforeach ?>
</table>


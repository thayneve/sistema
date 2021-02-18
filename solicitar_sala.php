<div>
    <a class="btn btn-primary" href="<?= base_url('GradeHorario/mostrar_empresa') ?>">Voltar</a>
</div>
<?php foreach($listaSalas as $sala):?>
<?= form_open_multipart(base_url('GradeHorario/solicitar_sala/'), ' id="formSolicitarSalas"'); ?>
<div style="margin:10px;">
    <table class="tabela-filtro">
		<tr class="tbl">
			<th>Sala</th>
			<th>Período disponivel</th>
			<th>Horário disponivel</th>
            <th>Tempo de atendimento</th>
            <th>Data Inicio</th>
            <th>Data Final</th>
            <th>Horário Inicio</th>
            <th>Horário Final</th>
		</tr>
        <tr class="tbl">
            <td>
                <?php echo $sala['sala']?>
                <input type="hidden" name="sala_id" value="<?php echo $sala['id']?>">
                <input type="hidden" name="empresa_id" value="<?php echo $sala['empresa_id']?>">
            </td>
            <td>
                <?php echo $sala['dataInicial']?> à <?php echo $sala['dataFinal']?>
            </td>
            <td>
                <?php echo $sala['horaInicial']?> à <?php echo $sala['horaFinal']?>
            </td>
            <td>
                <input type="time" name="tempo_atendimento" id="inputTempoAtendimento" alue="<?= getdate('now')?>" require>
            </td>
            <td>
                <input type="date" name="dataInicio" id="inputDataInicio">
            </td>
            <td>
                <input type="date" name="dataFinal" id="inputdataFinal">
            </td>
            <td>
                <input type="time" name="horaInicio" id="inputHoraInicio">
            </td>
            <td>
                <input type="time" name="horaFim" id="inputHoraFim">
            </td>
        </tr>
        <tr class="tbl">
            <th>Dias de Atendimento</th>
        </tr>
        <tr>
           <th><label for = "domingo"> Dom</label></th>
           <th><label for = "segunda"> Seg</label></th>
           <th><label for = "terca"> Ter</label></th>
           <th><label for = "quarta"> Qua</label></th>
           <th><label for = "quinta"> Qui</label></th>
           <th><label for = "sexta"> Sex</label></th>
           <th><label for = "sabado"> Sab</label></th>
        </tr>
        <tr class="tbl">
            <td>
                <input type = "checkbox" id="domingo" name= "dia_semana[0]">
            </td>
            <td>
                <input type = "checkbox" id="segunda" name= "dia_semana[1]">
            </td>
            <td>
                <input type = "checkbox" id="terca" name= "dia_semana[2]">
            </td>
            <td>
                <input type = "checkbox" id="quarta" name= "dia_semana[3]">
            </td>
            <td>
                <input type = "checkbox" id="quinta" name= "dia_semana[4]">
            </td>
            <td>
                <input type = "checkbox" id="sexta" name= "dia_semana[5]">
            </td>
            <td>
                <input type = "checkbox" id="sabado" name= "dia_semana[6]">
        </tr>
        <tr class="tbl">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button  type="submit" class="btn-next2">Solicitar</button>
            </td>
        </tr>
	</table>
</div>
</form>
<?php endforeach; ?>
    <div>
        <a class="btn btn-primary" href="<?= base_url('GradeHorario/mostrar_empresa') ?>">Voltar</a>
    </div>
<h3 class="titulo-pages">Definir horários</h3>
<div>
    <?php if($this->usuario->perfil_id == $this->meta['empresaUsuarioClinicaPerfil']):?>
        <a class="btn btn-primary btn-voltar" href="<?= base_url('lista_usuarios')?>"><i class="fas fa-caret-left"></i> Voltar</a>
    <?php else:?>
        <a class="btn btn-primary btn-voltar" href="<?= base_url('GradeHorario/mostrar_empresa') ?>"><i class="fas fa-caret-left"></i> Voltar</a>
    <?php endif?>
</div>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
    <?php $this->session->flashdata('error', ''); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
    <?php $this->session->flashdata('message', ''); ?>
<?php endif; ?>
<?php foreach($listaHorarios as $horario):?>
<?= form_open_multipart(base_url('GradeHorario/solicitar_horario/'), ' id="formSolicitarHorario"'); ?>
<div class="bloco-de-hor">
    <table class="tabela-horarios-empresa">
        <thead>
            <tr>
                <th>Período disponivel</th>
                <th>Horário disponivel</th>
                <th>Tempo de atendimento</th>
                <th>Data Inicio</th>
                <th>Data Final</th>
                <th>Horário Inicio</th>
                <th>Horário Final</th>
                <th>Especialidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <input type="hidden" name="horario_id" value="<?php echo $horario['id']?>">
                <input type="hidden" name="empresa_id" value="<?php echo $horario['empresa_id']?>">
                <input type="hidden" name="medico_id" value="<?= $medico?>">
                <td class="periodo text-center" data-label="Período disponivel">
                    <?php echo $horario['dataInicial']?> à <?php echo $horario['dataFinal']?>
                    <input type="hidden" name="periodo_data_inicial" value="<?php echo $horario['dataInicial']?>">
                    <input type="hidden" name="periodo_data_final" value="<?php echo $horario['dataFinal']?>">
                    <input type="hidden" name="periodo_horario_inicial" value="<?php echo $horario['horaInicial']?>">
                    <input type="hidden" name="periodo_horario_final" value="<?php echo $horario['horaFinal']?>">
                </td>
                <td class="horario-disponivel text-center" data-label="Horário disponivel">
                    <?php echo $horario['horaInicial']?> à <?php echo $horario['horaFinal']?>
                </td>
                <td class="tempo-atendimento text-center" data-label="Tempo de atendimento">
                    <input type="time" name="tempo_atendimento" id="inputTempoAtendimento" alue="<?= getdate('now')?>" require>
                </td>
                <td class="data-inicio" data-label="Data Inicio">
                    <input type="date" name="dataInicio" id="inputDataInicio">
                </td>
                <td class="data-final" data-label="Data Final">
                    <input type="date" name="dataFinal" id="inputdataFinal">
                </td>
                <td class="horario-inicio text-center" data-label="Horário Inicio">
                    <input type="time" name="horaInicio" id="inputHoraInicio">
                </td>
                <td class="horario-final text-center" data-label="Horário Final">
                    <input type="time" name="horaFim" id="inputHoraFim">
                </td>
                <td class="especialidade" data-label="Especialidade">
                    <select class="custom-select" name="especialidade">
                        <option selected></option>
                        <?php foreach($listaEspecialidades as $e) :?>
                            <option value="<?php echo $e['produto_id']?>"><?php echo $e['produto_descricao'] ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
        </tbody> 
	</table>
    <div class="tab-hor-emp">
    <span>Dias de Atendimento</span>
    </div>
    <table class="tabela-horarios-empresa">
        <thead>
                <tr>
                    <th><label for = "domingo"> Dom</label></th>
                    <th><label for = "segunda"> Seg</label></th>
                    <th><label for = "terca"> Ter</label></th>
                    <th><label for = "quarta"> Qua</label></th>
                    <th><label for = "quinta"> Qui</label></th>
                    <th><label for = "sexta"> Sex</label></th>
                    <th><label for = "sabado"> Sab</label></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="dias-cx">                    
                <tr class="dias-atendimento" data-label="Dias de Atendimento">
                    <td class="dom text-center" data-label="Dom">
                        <input type = "checkbox" id="domingo" name= "dia_semana[0]">
                    </td>
                    <td class="seg text-center" data-label="Seg">
                        <input type = "checkbox" id="segunda" name= "dia_semana[1]">
                    </td>
                    <td class="ter text-center" data-label="Ter">
                        <input type = "checkbox" id="terca" name= "dia_semana[2]">
                    </td>
                    <td class="qua text-center" data-label="Qua">
                        <input type = "checkbox" id="quarta" name= "dia_semana[3]">
                    </td>
                    <td class="qui text-center" data-label="Qui">
                        <input type = "checkbox" id="quinta" name= "dia_semana[4]">
                    </td>
                    <td class="sex text-center" data-label="Sex">
                        <input type = "checkbox" id="sexta" name= "dia_semana[5]">
                    </td>
                    <td class="sab text-center" data-label="Sab">
                        <input type = "checkbox" id="sabado" name= "dia_semana[6]">
                    </td>
                    <td class="btn-table">
                        <button  type="submit" class="btn btn-primary btn-voltar">Cadastrar</button>
                    </td>
                </tr>
            </tbody>
    </table>
</div>
</form>
<?php endforeach; ?>




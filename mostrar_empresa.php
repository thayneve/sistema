<h3 class="titulo-pages">Definir horário</h3>

<table class="tabela-filtro tab-hor">
		<tr class="tbl">
			<th class="prod-value tit-emp">Empresa</th>
		</tr>
        <tr class="tbl">
        <?= form_open_multipart(base_url('GradeHorario/pesquisar_horarios_empresa/'), ' id="formSolicitarHorario"'); ?>
            <td>
                <select class="custom-select sel-emp" name="empresa_id">
                    <option  selected></option>
                    <?php foreach($listaEmpresa as $empresa):?>
                        <option value="<?php echo $empresa['id']; ($empresa['id']) == selected?$id = $empresa['id']:'';?>"><?php echo $empresa['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <button  type="submit" class="btn btn-primary btn-login"><i class="fas fa-search"></i></button>
            </td>
        </tr>
        </form>
	</table>

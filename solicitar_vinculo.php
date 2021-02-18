<table class="tabela-filtro">
		<tr class="tbl">
			<th>Empresa</th>
		</tr>
        <tr class="tbl">
        <?= form_open_multipart(base_url('Medico/solicitar_vinculo/'), ' id="formSolicitarVinculo"'); ?>
            <td>
                <select class="custom-select" name="empresa_id">
                    <option  selected></option>
                    <?php foreach($listaEmpresa as $empresa):?>
                        <option value="<?php echo $empresa['id']; ($empresa['id']) == selected?$id = $empresa['id']:'';?>"><?php echo $empresa['nomefantasia'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <button  type="submit" class="btn-next2">Solicitar</button>
            </td>
        </tr>
        </form>
</table>
<div>
    <a class="btn btn-primary" href="<?= base_url('Principal/principal') ?>">Voltar</a>
</div>
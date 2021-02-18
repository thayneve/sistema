<div class="row text-center" style="margin-left: 100px;">
	<?= form_open_multipart(base_url('Produtos/criar_produto'), ' id="formNovoProduto"'); ?>
	<div class="form-group">
		<label for="inputDescricao">Descrição</label>
		<input type="text" class="form-control" id="inputDescricao" name="inputDescricao" required>
	</div>
	<div class="form-group">
		<label for="inputTipo">Tipo de produto</label>
		<select class="form-control" name="inputTipo" required>
			<?php foreach ($tipos_produto as $produto):?>
				<option value="<?=$produto['id']?>"><?=$produto['descricao']?></option>
			<?php endforeach?>
		</select>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary btn-login">Cadastrar</button>
	</div>
	</form>
</div>

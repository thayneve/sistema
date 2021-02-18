<div class="editar-regras">

<h3 class="titulo-pages">Editar regras</h3>

<div class="form-int form">
    <?= form_open_multipart(base_url('Empresa/selecionar_produto'), ' id="formRegrasProduto"'); ?>
<a class="btn btn-primary btn-voltar" href="javascript:history.go(-1)"><i class="fas fa-caret-left"></i>  Voltar</a>

        <input type="hidden" name="produtoId" value="<?= $produto['id']?>">
        <input type="hidden" name="produtoEmpresaId" value="<?= $produto['ep_id']?>">
        <!-- Produto: Nome -->
        <div class="form-group "> 
            <label class="label" for="inputNome">Nome </label>
            <input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $produto['descricao'] ?>" disabled > 
        </div>
		<!-- Produto: Tipo -->
        <div class="form-group">
                <label class="label" for="inputTipo">Tipo</label>
                <input type="text" class="form-control" id="inputTipo" name="inputTipo" value="<?= $produto['decricao_tipo'] ?>" disabled> 
		</div>
        <!-- Produto: SEXO -->
        <div class="form-group">
			<label class="label mr-2" for="inputSexo">Exame/Consulta para o sexo :</label>
			<div > 
                <input class="input-radio" type="radio" id="inputSexo" name="inputSexo" value="M" <?= ($produto['sexo']=='M')? 'checked':''; ?> required> 
				<label class="form-check-label " for="inputSexo">Masculino </label>
				<input class="input-radio" type="radio" id="inputSexo" name="inputSexo" value="F" <?= ($produto['sexo']=='F')? 'checked':''; ?> required> 
				<label class="form-check-label " for="inputSexo">Feminino </label><BR>
				<input class="input-radio" type="radio" id="inputSexo" name="inputSexo" value="T" <?= ($produto['sexo']=='T')? 'checked':''; ?> required> 
			    <label class="form-check-label" for="inputSexo">Todos </label>
			</div>
		</div>
        <!-- Produto:Limite Idade -->
        
            <b class="label">Limite de Idade: <?= ($produto['idade'])?$produto['idade']:'';?></b>
            
            <div class="form-group row"> 
                <div class="col-6">
                    <label class="label" for="inputIdade">Idade maior que:</label><BR>
                    <input type="number" class="form-control" name="inputIdadeMaior" id="inputIdade">
                </div>
                <div class="col-6">
                    <label class="label" for="inputIdade">Idade menor que:</label><BR>
				    <input type="number" class="form-control" name="inputIdadeMenor" id="inputIdade">
                </div>
            </div>
			 <!-- Produto: Observação-->
			 <div class="form-group"> 
                <label class="label" for="inputObs">Observação</label><BR>
                <textarea class="textarea-total" name="inputObs" id="inputObs" rows="5" ><?= ($produto['obs'])?$produto['obs']:'';?></textarea>
            </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-login">Salvar</button>
        </div>
    </form>
</div>


</div>
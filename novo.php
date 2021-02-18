<!-- <div class="login">
  <div class="inf-cadastro cad-clinica">
  </div> -->

  <div class="form" id="regForm">
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
  <!-- </form> -->
  <?= form_open_multipart(base_url('Acesso/cadastrar_empresa'), ' id="formNovaEmpresa"'); ?>
  
  <a class="btn btn-primary btn-voltar" style="margin-top: 3%;" href="javascript:history.go(-1)"><i class="fas fa-caret-left"></i>  Voltar</a>
 
      <div class="text-center">
          <h1 class="titulos" style="margin-top: 3%;">Cadastre-se gratuitamente como clínica médica</h1>
          <h6>Preencha os dados abaixo para solicitar seu cadastro como clínica ou hospital.</h6><BR>
      </div>

      <input type="hidden" name="inputEmpresa" value="inputEmpresa">

          <!-- Empresa: Nome Social -->
          <div class="form-group row">
            <div class="col-6"> 
                <label class="label" for="inputNomeSocial">Nome Social *</label>
                <input type="text" class="form-control" id="inputNomeSocial" name="inputNomeSocial"  value="<?php echo set_value('inputNomeSocial')?>" required> 
            </div>
          <!-- Empresa: Nome Fantasia  -->
            <div class="col-6"> 
                <label class="label" for="inputNomeFantasia">Nome Fantasia *</label>
                <input  type="text"  class="form-control"  id="inputNomeFantasia"  name="inputNomeFantasia" value="<?php echo set_value('inputNomeFantasia')?>" required > 
            </div>
        </div>
        <div class="form-group row">
             <!-- Empresa: CNPJ/CPF -->
             <div class="col-3"> 
                  <label class="label" for="inputCNPJ">CNPJ*</label>
                  <input type="text" class="form-control" id="inputCNPJ" name="inputCNPJ" value="<?php echo set_value('inputCNPJ')?>" placeholder="00.000.000/0000-00" onkeypress="$(this).mask('00.000.000/0000-00')" onpaste="$(this).mask('00.000.000/0000-00')" required> 
            </div>
            <!-- Empresa: CEP/Numero -->
            <div class="col-2"> 
                    <label class="label" for="inputCep">CEP * <a class="link-cep" target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" >Não sabe seu CEP?</a></label><BR>
                    <input type="text" name="inputCep" value="<?php echo set_value('inputCep')?>" placeholder="60.000-000" onpaste="$(this).mask('00.000-000')" onkeypress="$(this).mask('00.000-000')" id="inputCep">
            </div>
            <!-- Empresa: Rua/AV -->
            <div class="col-5"> 
                  <label class="label" for="inputRua">Endereço</label><BR>
                  <input  type="text"  class="form-control"  id="inputRua"  name="inputRua" value="<?php echo set_value('inputRua')?>" required > 
            </div>
            <div class="col-2"> 
                    <label class="label" for="inputNumero">Número</label>
                    <input type="text" class="form-control" id="inputNumero" name="inputNumero" value="<?php echo set_value('inputNumero')?>" required> 
            </div>
        </div>
        <div class="form-group row">
            <!-- Empresa: Bairro -->
            <div class="col-3"> 
                <label class="label" for="inputBairro">Bairro</label>
                <input type="text" class="form-control" id="inputBairro" value="<?php echo set_value('inputBairro')?>" name="inputBairro"> 
            </div>
            <!-- Empresa: Complemento -->
            <div class="col-3"> 
                <label class="label" for="inputComplemento">Complemento</label>
                <input type="text" class="form-control" id="inputComplemento" value="<?php echo set_value('inputComplemento')?>" name="inputComplemento"> 
            </div>
            <!-- Empresa: Município -->
            <div class="col-3"> 
                <label class="label" for="inputMunicipio">Cidade</label>
                <input type="text" class="form-control" id="inputMunicipio" value="<?php echo set_value('inputMunicipio')?>" name="inputMunicipio"> 
            </div>
            <!-- Empresa: UF -->
            <div class="col-3"> 
                <label class="label" for="inputUf">UF</label>
                <input type="text" class="form-control" id="inputUf" value="<?php echo set_value('inputUf')?>" name="inputUf"> 
            </div>
        </div>
        <div class="form-group row">
            <!-- Empresa: Telefone 1 -->
            <div class="col-4"> 
                    <label class="label" for="inputTelefone_1">Telefone principal *</label>
                    <input type="text" class="form-control" id="inputTelefone_1" name="inputTelefone_1" value="<?php echo set_value('inputTelefone_1')?>" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()" required> 
            </div> 
            <!-- Empresa: Telefone 2 -->
            <div class="col-4"> 
                    <label class="label" for="inputTelefone_2">Telefone secundário</label>
                    <input type="text" class="form-control" id="inputTelefone_2" name="inputTelefone_2" value="<?php echo set_value('inputTelefone_2')?>" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()"  > 
            </div>
            <!-- Empresa: Whastapp -->
            <div class="col-4"> 
                  <label class="label" for="inputTelefone_3">Whatsapp <i class="fab fa-whatsapp"></i></label>
                  <input type="text" class="form-control" id="inputTelefone_3" name="inputTelefone_3" value="<?php echo set_value('inputTelefone_3')?>" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()"  > 
            </div> 
        </div> 
        <div class="form-group row">
            <!-- Empresa: Inscrição Municipal -->
            <div class="col-6"> 
                <label class="label" for="inputIM">Inscrição Municipal</label>
                <input type="text" class="form-control" id="inputIM" name="inputIM" value="<?php echo set_value('inputIM')?>"> 
            </div>
            <!-- Empresa: Inscrição Estadual -->
            <div class="col-6"> 
                <label class="label" for="inputIE">Inscrição Estadual</label>
                <input type="text" class="form-control" id="inputIE" name="inputIE" value="<?php echo set_value('inputIE')?>"> 
            </div>
        </div>
        <div class="form-group row">
            <!-- Empresa: Email 1 -->
            <div class="col-4">
                <label class="label" for="inputEmail">Email *</label>
                <input type="text" class="form-control" id="inputEmail" placeholder="seuemail@exemplo.com" value="<?php echo set_value('inputEmail')?>" name="inputEmail" required> 
            </div>
            <!-- Administrador: Senha  -->
            <div class="col-4">
                  <label for="inputSenha">Senha *</label>
                  <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="*******" required>
            </div>
            <!-- Administrador: Confirmação senha  -->
            <div class="col-4">
                  <label for="inputSenha2">Confirmar senha *</label>
                  <input type="password" class="form-control" id="inputSenha2" name="inputSenha2" placeholder="*******" required>
            </div>
        </div>
        <span class="link-cep">* são os campos obrigatórios.</span>
        <div class="form-check form-check-inline concordo">
			<input  type="checkbox" id="termos" onclick="concordar()" required>
			<label>Li e concordo com os <a class="link-green" href="<?= base_url('termos_de_uso') ?>">Termos de Uso</a> e <a class="link-green" href="<?= base_url('politicas_de_privacidade') ?>">Políticas de Privacidade</a>.</label>
		</div>
          <!-- <button type="submit" >Cadastrar</button> -->
        <div class="text-center btn-cad">
            <button class="btn-login" type="submit" id="submit" disabled >Solicitar cadastro</button>
        </div>
    </form>
  </div>
</div>
<script>
    function concordar()
    {
        if(document.getElementById('termos').checked == true){
            document.getElementById('submit').disabled = false;
        }
        if(document.getElementById('termos').checked == false){
            document.getElementById('submit').disabled = true;
        }
    }
</script>
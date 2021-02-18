<div class="content">
    <div class="edit">
	<?= form_open_multipart(base_url('Empresa/editar_empresa'), 'id="idEmpresa"'); ?>
        <!-- Nome Social -->
        <h3 class="titulo-pages">Editar empresa</h3>
        	
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="w-alert alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
            <?php $this->session->flashdata('error', ''); ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="w-alert alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
            <?php $this->session->flashdata('message', ''); ?>
        <?php endif; ?>
        <div class="m-3 form">
        <a class="btn btn-primary btn-voltar" href="javascript:history.go(-1)"><i class="fas fa-caret-left"></i>  Voltar</a>
            <div class="form-group"> 
                <!-- Empresa: IMG empresa -->
                <!-- <label class="label" for="inputTipo">Logo</label> -->
                <?php if($empresa['logo'] !=""):?>
                    <div class="text-center mb-3">
                        <img src="<?= $imagensuploads.$empresa['logo'] ?>" alt="Logo Empresa">
                    </div>
                <?php endif?>
                <!-- INPUT -->
                <div class="text-center mb-3">
                    <button class="btn btn-voltar" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Adicionar imagem</button>
                    <div class="file-upload">
                        <BR><BR>
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" id="inputImagem" name="inputImagem" type='file' onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <h5>O arquivo ou imagem apareceram aqui</h5>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Feito</span></button>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- FIM INPUT -->
            </div>
            <div class="form-group form row">
                <div class="col-4"> 
                    <label class="label" for="inputNomeSocial">Nome social</label>
                    <input value="<?=$empresa['nomesocial']?>" type="text" class="form-control" id="inputNomeSocial" name="inputNomeSocial" required> </input> 
                </div>
                <!-- Nome Fantasia -->
                <div class="col-4"> 
                    <label class="label" for="inputNomeFantasia">Nome fantasia</label>
                    <input value="<?=$empresa['nomefantasia']?>" type="text" class="form-control" id="inputNomeFantasia" name="inputNomeFantasia" required></input> 
                </div>
                <!-- E-mail -->
                <div class="col-4"> 
                    <label class="label" for="inputEmail_1">E-mail</label>
                    <input value="<?=$empresa['email_1']?>" type="text" class="form-control" id="inputEmail_1" name="inputEmail_1" required > </input> 
                </div>
            </div>
            <div class="form-group form row">
                <!-- CNPJ -->
                <div class="col-4"> 
                    <label class="label" for="inputNomeFantasia">CNPJ</label>
                    <input value="<?=$empresa['cnpj']?>" type="text" class="form-control" id="inputCNPJ" name="inputCNPJ" required> </input> 
                </div>
                <!-- Data de abertura -->
                <!-- <div class="form-group flex-container"> 
                    <label class="label" for="inputDataAbertura">Data abertura</label>
                    <input value="<?=$empresa['data_abertura']?>" type="date"  class="form-control"  id="inputDataAbertura"  name="inputDataAbertura" required > </input> 
                </div> -->
                <!-- CEP -->
                <div class="col-2"> 
                    <label class="label" for="inputCEP">CEP</label>
                    <input class="form-control" type="text" onpaste="$(this).mask('00.000-000')" onkeypress="$(this).mask('00.000-000')"  name="inputCEP" id="inputCep" value="<?=$empresa['cep']?>" require>
                </div>
                <!-- Numero -->
                <div class="col-2"> 
                    <label class="label" for="inputNumero">Número</label>
                    <input value="<?=$empresa['numero']?>" type="text"  class="form-control"  id="inputNumero"  name="inputNumero"  required></input> 
                </div> 
                <!-- Complemento -->
                <div class="col-4"> 
                    <label class="label" for="inputComplemento">Complemento</label>
                    <input value="<?=$empresa['complemento']?>" type="text"  class="form-control"  id="inputComplemento"  name="inputComplemento" > </input> 
                </div>
            </div>
            <div class="form-group form row">    
                <div class="col-4"> 
                    <label class="label" for="inputRua">Logradouro</label>
                    <input value="<?=$empresa['logradouro']?>" type="text"  class="form-control"  id="inputRua"  name="inputRua" > </input>         
                </div>
                <div class="col-4"> 
                    <label class="label" for="inputBairro">Bairro</label>
                    <input value="<?=$empresa['bairro']?>" type="text"  class="form-control"  id="inputBairro"  name="inputBairro" > </input>         
                </div>
                <div class="col-2"> 
                    <label class="label" for="inputMunicipio">Cidade</label>
                    <input value="<?=$empresa['cidade']?>" type="text"  class="form-control"  id="inputMunicipio"  name="inputMunicipio" > </input>         
                </div>
                <div class="col-2"> 
                    <label class="label" for="inputUf">UF</label>
                    <input value="<?=$empresa['estado']?>" type="text"  class="form-control"  id="inputUf"  name="inputUf" > </input>         
                </div>
            </div>
            <div class="form-group form row">    
                <!-- Telefone 1 -->
                <div class="col-4"> 
                    <label class="label" for="inputTelefone_1">Telefone primário</label>
                    <input value="<?=$empresa['telefone_1']?>" type="text"  class="form-control"  id="inputTelefone_1"  name="inputTelefone_1" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()"   required> </input> 
                </div> 

                <!-- Telefone 2 -->
                <div class="col-4"> 
                    <label class="label" for="inputTelefone_2">Telefone secundário</label>
                    <input value="<?=$empresa['telefone_2']?>" type="text"  class="form-control"  id="inputTelefone_2"  name="inputTelefone_2" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()" ></input> 
                </div> 

                <!-- Telefone 3 -->
                <div class="col-4"> 
                    <label class="label" for="inputTelefone_3">Whatsapp  <i class="fab fa-whatsapp"></i></label>
                    <input value="<?=$empresa['telefone_3']?>" type="text"  class="form-control"  id="inputTelefone_3"  name="inputTelefone_3" placeholder="(00)00000-0000" onfocusout="mask(event)" onfocus="$(this).unmask()"  ></input> 
                </div> 
                <input type="hidden" name="idEmpresa" value="<?=$empresa['id']?>"></input>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-login ">Salvar</button>
        </div>
    </form>
        </div>
    </div>
</div>
</div>
<style>
    .flex-container {
        display: flex;
        flex-direction: row;
    }
    .label {
        margin-right: 20px;
    }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

</script>



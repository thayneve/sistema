<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
<div class="pesquisa-index" id="pesq-btn">
  
    <h1>Agende sua consulta ou exame em apenas alguns cliques</h1>
    <h2>Escolha o serviço desejado para fazer seu agendamento.</h2>
    <div class="form-index">
      <?= form_open_multipart(base_url('Pesquisa/pesquisa_por/'), ' id="formPesquisarEspecializacao"', 'autocomplete="off",'); ?>
        <input class="hradio" type="checkbox" name="tipoConsulta" value="exame"   checked="true" id="exame">
        <input class="hradio" type="checkbox" name="tipoConsulta" value="consulta" id="consulta">
        <label class="mr-2 btn-index-active" id="labelExame" for="exame"  onclick="escolheTipoConsulta('exame')">Exame</label>
        <label class="btn-index" id="labelConsulta" for="consulta"  onclick="escolheTipoConsulta('consulta')">Consulta</label>
        <div class="forms-field">
          <div id="PEX" class="tipoConsultas">
            <select class="pesquisar_por_exames" name="pesquisar_por_exames" id="inputPesquisaPorExame" >
              <option value="" selected="selected">Selecione um Exame</option>
              <?php foreach($listaExames as $e):?>
                <option value="<?php echo $e['id']; ($e['id']) == 'selected'?$id = $e['id']:'';?>"><?php echo $e['descricao'] ?></option>
              <?php endforeach; ?>
            </select>
            <select class="localidade "  name="localidade_exame" id="inputLocalidadeExame" >
              <option value="" selected="selected">Escolha uma Cidade</option>
              <?php foreach($localidade as $l):?>
                <option value="<?php echo $l; ?>"><?php echo $l ?></option>
                <?php endforeach; ?>
              </select>
              <button  type="submit" class="btn-pesquisa-index ml-3"><i class="fas fa-search"></i> Pesquisar</button>
          </div>
          
          <div id="PES" class="d-none">
            <select class="pesquisar_por_especialidades" name="pesquisar_por_especialidades" id="inputPesquisaPorEspecialidades" >
              <option value="" selected="selected">Selecione uma Especialidade</option>
              <?php foreach($listaEspecialidades as $e):?>
                <option value="<?php echo $e['id']; ($e['id']) == 'selected'?$id = $e['id']:'';?>"><?php echo $e['descricao'] ?></option>
              <?php endforeach; ?>
            </select>
            <select class="localidade"  name="localidade_consulta" id="inputLocalidadeConsulta" >
              <option value="" selected="selected">Escolha uma Cidade</option>
              <?php foreach($localidade as $l):?>
                <option value="<?php echo $l; ?>"><?php echo $l ?></option>
                <?php endforeach; ?>
              </select>
              <button  type="submit" class="btn-pesquisa-index ml-3"><i class="fas fa-search"></i> Pesquisar</button>
          </div>
        </div>
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="w-alert alert alert-danger" > <?= $this->session->flashdata('error') ?> </div>
          <?php $this->session->flashdata('error', ''); ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('message')) : ?>
          <div class="w-alert alert alert-success" > <?= $this->session->flashdata('message') ?> </div>
          <?php $this->session->flashdata('message', ''); ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('message_t')) : ?>
          <div class="w-alert alert alert-success" > <?= $this->session->flashdata('message_t') ?> </div>
          <?php $this->session->flashdata('message_t', ''); ?>
        <?php endif; ?>
      </form>
    </div>
  
</div>

<div class="container informativo">
    <div class="row inf-banner bg-qmed">
        <div class=" inf-img">
            <img src="<?= $imgPath ?>icon_encontre-especialistas.png" alt="Icone de um medico" >
        </div>
        <h4>Encontre especialistas</h4>
        <p>Escolha a especialidade, profissional e horário para agendar online sua consulta em poucos cliques.</p>
    </div>
    <div class="row inf-banner bg-qmed">
        <div class="inf-img">
            <img src="<?= $imgPath ?>icon_marque-consultas.png" alt="Icone marcar exame">
        </div>
        <h4>Marque exames</h4>
        <p>Reunimos mais de 50 tipos de exames para você. Encontre seu exame e marque em minutos.</p>
    </div>
    <div class="row inf-banner bg-qmed">
        <div class="inf-img">
            <img src="<?= $imgPath ?>icon_receba-lembretes.png" alt="Icone de agendamento">
        </div>
        <h4>Agende online</h4>
        <p>Acesse facilmente sua agenda de consultas e exames marcados em um só lugar.</p>
    </div>
</div>
<div class="como-funciona container mb-5">
  <div class="row">
    <div class="col-md-6 img">
      <img src="<?= $imgPath ?>como-funciona.png" alt="Como funciona">
    </div>
    <div class="col-md-6 inf">
        <h3 class="mb-5">Como Funciona</h3>
        <p class="mb-5">Escolha a consulta ou exame que deseja e ajudaremos a encontrar o melhor atendimento perto de você. Com o QueroMed, você tem acesso a diversos serviços médicos na palma da mão, além de agendar online o serviço que precisa, em poucos cliques!</p>
          <?php if(!$this->usuario):?>
            <a class="btn-como-funciona mb-3" href="<?= base_url('cadastro_novocadastro') ?>">Quero me cadastrar</a>
          <?php else:?>
          <a class="btn-como-funciona mb-3" href="#pesq-btn">Pesquisar consultas e exames</a>
          <?php endif?>
      </div>
  </div>
</div>

<div id="veja"  class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>Clínicas parceiras do Queromed</h3>
    </div>
    <div class="col-md-6" align="right"> 
      <!-- <button class="btn-vermais mb-5" href="#">Ver mais</button> -->
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="lista-especialidades">
      <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card2 mb-5">
              <div align="center">
                <img src="<?= $imagensuploads.'/radiogenesis-min.png' ?>" alt="">
              </div>
        </div> 
      </div>
      <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card2 mb-5">
              <div align="center">
                <img src="<?= $imagensuploads.'/omnimagem-min.png' ?>" alt="">
              </div>
        </div> 
      </div>
      <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card2 mb-5">
              <div align="center">
                <img src="<?= $imagensuploads.'/max-clinica-min.png' ?>" alt="">
              </div>
        </div> 
      </div>
      <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card2 mb-5">
              <div align="center">
                <img src="<?= $imagensuploads.'/otomagem-min.png' ?>" alt="">
              </div>
        </div> 
      </div>
      <!-- <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card2 mb-5">
              <div align="center">
                <img src="<?= $imagensuploads.'/otomagem-min.png' ?>" alt="">
              </div>
        </div> 
      </div> -->
  </div>
</div>

<div id="veja"  class="container">
  <div class="row">
    <div class="col-md-6">
      <h3>Especialidades</h3>
    </div>
    <div class="col-md-6" align="right"> 
      <!-- <button class="btn-vermais mb-5" href="#">Ver mais</button> -->
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="lista-especialidades">
    <?php foreach($listaEspecialidades as $e) :?>
      <div class="col-md-3"  onclick="searchC(<?= $e['id']?>)">
        <div class="card sombra-card mb-5">
          <?php if(isset($e['imagem'])):?>
              <div align="center">
                <img src="<?= $imagensuploads.$e['imagem'] ?>" alt="Foto do especialidade">
              </div>
          <?php else:?>
              <div align="center">
                <img src="<?= $imagensuploads.'/imgPadrao.png' ?>" alt="">
              </div>
          <?php endif ?>
          <div class="card-body text-center">
            <h4 class="card-title index-card"><?= $e['descricao']?></h4>
            <a class="link-green"  href="#"><i class="fas fa-search"></i> Pesquisar</a>
            <?= form_open_multipart(base_url('Pesquisa/pesquisa_rapida'), ' id="formEspecialidade"'); ?>
              <input type="hidden" id="search_consulta" name="consulta">
            </form>
          </div>
        </div> 
      </div>
    <?php endforeach?>
  </div>
</div>

<div class="container ">
  <div class="row">
    <div class="col-md-6">
      <h3>Exames</h3>
    </div>
    <div class="col-md-6" align="right"> 
      <!-- <button class="btn-vermais mb-5" href="#">Ver mais</button> -->
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="lista-exames">      
    <?php foreach($listaExames as $ex) :?>
      <div class="col-md-3" onclick="searchE(<?= $ex['id']?>)">
        <div class="card sombra-card mb-5" >
          <?php if(isset($ex['imagem'])):?>
            <div align="center">
              <img src="<?= $imagensuploads.$ex['imagem'] ?>" alt="Foto do especialidade">
            </div>
            <?php else:?>
            <div align="center">
              <img src="<?= $imagensuploads.'/imgPadrao.png' ?>" alt="">
            </div>
          <?php endif ?>
          <div class="card-body text-center" >
            <h4 class="card-title index-card"><?= $ex['descricao']?></h4>
            <a class="link-green" href="#" ><i class="fas fa-search"></i> Pesquisar</a>
            <?= form_open_multipart(base_url('Pesquisa/pesquisa_rapida'), ' id="formExame"'); ?>
              <input type="hidden" id="search_exame" name="exame" >
            </form>
          </div>
        </div> 
      </div>
    <?php endforeach?>
  </div>
</div>
<div class="row">
  <div class="col-6"><img class="img-duv-6" src="<?= $imgPath ?>duv_sug.png" alt="Como funciona"></div>
  <div class="col-6" align="center" id="duv_sug">
    <h1 class="duvida">Dúvidas e Sugestões?</h1>
      <?php if ($this->session->flashdata('error_ds')) : ?>
        <div class="w-alert alert alert-danger" > <?= $this->session->flashdata('error_ds') ?> </div>
        <?php $this->session->flashdata('error_ds', ''); ?>
      <?php endif; ?>
      <?php if ($this->session->flashdata('message_ds')) : ?>
        <div class="w-alert alert alert-success" > <?= $this->session->flashdata('message_ds') ?> </div>
        <?php $this->session->flashdata('message_ds', ''); ?>
      <?php endif; ?>
      <button type="button" class="btn btn-primary btn-login" data-toggle="modal" data-target="#for-duv">Fale conosco!</button>
      <div class="modal fade" id="for-duv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Deixe aqui sua dúvida ou sugestão!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
              <?= form_open_multipart(base_url('Pesquisa/duvidas_sugestoes'), ' id="formDuvidas"'); ?>
              <div class="form form-group">
                  <label for="">Nome*</label><BR>
                  <input class="form-control" type="text" name="ds_nome" require><BR>
                  <label for="">Telefone*</label><BR>
                  <input class="form-control" type="text" name="ds_telefone" require><BR>
                  <label for="">E-mail*</label><BR>
                  <input class="form-control" type="email" name="ds_email" require><BR>
                  <label for="">Deixe aqui suas dúvidas ou sugestões*</label><BR>
                  <textarea class="form-control text-duv" type="textarea" name="ds_texto" require></textarea>
                  <BR>
                  <input class="btn btn-primary btn-voltar" type="submit" value="Enviar">
                  </div>
              </form>
              
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
      </div>  
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

    $(document).ready(function() {
        theme: "classic";
        selectOnClose: true;
        placeholder: "Escolha o tipo de exame";
        data = <?=json_encode($listaExames, JSON_UNESCAPED_UNICODE)?>;
      $('.pesquisar_por_exames').select2();
    });

    $(document).ready(function() {
        theme: "classic";
        selectOnClose: true;
        placeholder: "Escolha o tipo de especialidades";
        data = <?=json_encode($listaEspecialidades, JSON_UNESCAPED_UNICODE)?>;
      $('.pesquisar_por_especialidades').select2();
    });
    $(document).ready(function() {
        theme: "classic";
        selectOnClose: true;
        data = <?=json_encode($localidade, JSON_UNESCAPED_UNICODE)?>;
      $('#inputLocalidadeExame').select2();
    });
    $(document).ready(function() {
        theme: "classic";
        selectOnClose: true;
        data = <?=json_encode($localidade, JSON_UNESCAPED_UNICODE)?>;
      $('#inputLocalidadeConsulta').select2();
    });

    $("[name='tipoConsulta']").click(function(){
        var group = "input:checkbox[name='"+$(this).attr("name")+"']";
        $(group).prop("checked",false);
        $(this).prop("checked",true);

    });

    function escolheTipoConsulta($id){
        if($id == 'exame'){
            if ( !document.getElementById('PES').classList.contains('d-none') ){
                document.getElementById('PES').classList.add('d-none');
                if ( document.getElementById('PES').classList.contains('tipoConsultas') ){
                  document.getElementById('PES').classList.remove('tipoConsultas');
                }
                if ( document.getElementById('PEX').classList.contains('d-none') ){
                  document.getElementById('PEX').classList.remove('d-none');
                  document.getElementById('PEX').classList.add('tipoConsultas');
                }
            }
            if ( document.getElementById('labelConsulta').classList.contains('btn-index-active') ){
                document.getElementById('labelConsulta').classList.remove('btn-index-active');
                document.getElementById('labelConsulta').classList.add('btn-index');
            }
            if (!document.getElementById('labelExame').classList.contains('btn-index-active') ){
                document.getElementById('labelExame').classList+="-active";
                document.getElementById('inputPesquisaPorExame').placeholder ="Escolha o tipo de exame";
            }
        }
        if($id =='consulta'){
            if ( !document.getElementById('PEX').classList.contains('d-none') ){
                document.getElementById('PEX').classList.add('d-none');
              if ( document.getElementById('PEX').classList.contains('tipoConsultas') ){
                document.getElementById('PEX').classList.remove('tipoConsultas');
              }
              if ( document.getElementById('PES').classList.contains('d-none') ){
                document.getElementById('PES').classList.remove('d-none');
                document.getElementById('PES').classList.add('tipoConsultas');

              }
            }
            if ( document.getElementById('labelExame').classList.contains('btn-index-active') ){
                document.getElementById('labelExame').classList.remove('btn-index-active');
                document.getElementById('labelExame').classList.add('btn-index');
            }
            if (!document.getElementById('labelConsulta').classList.contains('btn-index-active') ){
                document.getElementById('labelConsulta').classList+="-active";
                document.getElementById('inputPesquisaPorEspecialidades').placeholder ="Escolha o tipo de Consulta";
            }
        }
    }
    function searchC($c){
      document.getElementById("search_consulta").value = $c;
      document.getElementById("formEspecialidade").submit()
    }
    function searchE($e){
      document.getElementById("search_exame").value = $e;
      document.getElementById("formExame").submit()
    }
</script>
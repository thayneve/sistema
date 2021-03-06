<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
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
<section class="cp-cinza">
    <div class="container">
        <h1 class="resul-pesq">Resultado da pesquisa</h1>
        <?php foreach($lista as $medico => $datas):?>
            <div class="bl-medico-hora row">
                <div class="col-md-3">
                    <div class="perfil-medico">
                        <div class="card1-info-pesq">
                        <?php if($datas['foto'] == null): ?>
                            <img src="<?= $imagensuploads.'/imgPadrao.png' ?>" alt="">
                        <?php else: ?>
                            <img src="<?= $imagensuploads.$datas['foto'] ?>" alt="">
                        <?php endif ?>
                        <h1><?= $medico ?></h1>
                        </div>
                        <div class="card-info-pesq">
                            <h4><?= $datas['endereco']['empresa'] ?></h4>
                            <p><i class="fa fa-phone"></i><?= $datas['telefone']?></p>
                            <p><i class="fas fa-user-md"></i> <?= $datas['produto']?></p>
                            <p><i class="fas fa-map-marked-alt"> </i> <?= $datas['endereco']['cidade']."-".$datas['endereco']['uf'] ." - " .$datas['endereco']['cep'] ?></p>
                            <p> <?= $datas['endereco']['rua'].", ".$datas['endereco']['numero'] ?></p>
                            <p> <?= ($datas['endereco']['complemento']=='n/a')? $datas['endereco']['bairro']:$datas['endereco']['complemento'].", ".$datas['endereco']['bairro'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="bl-medico">
                        <div class="lista-hora responsive carousel">
                            <?php foreach($datas['datas'] as $data => $horario):?>
                                <div class="dias">
                                    <h4><?= ucfirst(strftime("%A", $data))?></h4>
                                    <p><?= date("d/m/Y", $data)?></p>
                                    <div class="d-flex flex-wrap cx-hora">
                                        <?php foreach($horario as $hora => $inf):?>
                                            <?php if($inf['status'] == "Disponivel" && $this->usuario):?>
                                                <a href="#" onclick="marcar(<?= $inf['id']?>)"><?= date("H:i", strtotime($hora)) ?></a>
                                                <?= form_open_multipart(base_url('ConsultasMedico/verificar_dados'), ' id="formMarcarConsulta"'); ?>
                                                 <input id="agenda" type="hidden" name="agenda">
                                                </form>
                                            <?php elseif($inf['status'] != "Disponivel") :?>
                                                <p class="color gray" onclick="alert('Horário indisponível.')" ><?= date("H:i", strtotime($hora)) ?></p>
                                            <?php else :?>
                                                <a href="#" onclick="logar_marcar(<?= $inf['id']?>)"><?= date("H:i", strtotime($hora)) ?></a>
                                                <?= form_open_multipart(base_url('Acesso/novo_usuario_agendamento'), ' id="formLogarMarcarConsulta"'); ?>
                                                    <input id="agenda" type="hidden" name="agenda">
                                                </form>
                                            <?php endif?>
                                        <?php endforeach?>
                                    </div>           
                                </div>
                            <?php endforeach?>
                        </div>
                    </div>
                </div>                            
            </div>                           
        <?php endforeach ?>
    </div>
</section>

<script>
    function marcar($a){
        document.getElementById('agenda').value=$a ; 
        document.getElementById("formMarcarConsulta").submit();
    }
    function logar_marcar($a){
        document.getElementById('agenda').value=$a ; 
        document.getElementById("formLogarMarcarConsulta").submit();
    }

    /*$(".carousel").slick({
        dots: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5
    });*/

    $('.responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
            breakpoint: 1025,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: false,
                dots: false
            }
            },
            {
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });
</script>
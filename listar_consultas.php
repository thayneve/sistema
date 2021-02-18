<?php if ($this->session->flashdata('error')) : ?>
    <div class="w-alert alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
    <?php $this->session->flashdata('error', ''); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('message')) : ?>
    <div class="w-alert alert alert-success"> <?= $this->session->flashdata('message') ?> </div>
    <?php $this->session->flashdata('message', ''); ?>
<?php endif; ?>

<head>    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">        
            <div class="content">
                <div class="container-fluid">
                	<h2 class="card-title-geral text-center">Calendário Geral</h2>            			                			                    
                    <div class="card-f">
                        <div class="card-f-body">
                            <div class="row">
                                <div class="col-md-2 sidebar-creditos">
                                    <h4>Legenda</h4>
                                    <div class="creditos">
                                        <div class="row legenda-calendar">
                                            <div class="col-md-2"><i class="fa fa-circle bolinha-pago-atendido"></i></div>
                                            <div class="col-md-10 text-left"><p>ATENDIMENTO REALIZADO</p></div>
                                        </div>
                                        <div class="row legenda-calendar">
                                            <div class="col-md-2"><i class="fa fa-circle bolinha-pago"></i></div>
                                            <div class="col-md-10 text-left"><p>PAGO</p></div>
                                        </div>
                                        <div class="row legenda-calendar">
                                            <div class="col-md-2"><i class="fa fa-circle bolinha-aguardando"></i></div>
                                            <div class="col-md-10 text-left"><p>AGUARDANDO PAGAMENTO</p></div>
                                        </div>
                                        <div class="row legenda-calendar">
                                            <div class="col-md-2"><i class="fa fa-circle bolinha-cancelada"></i></div>
                                            <div class="col-md-10 text-left"><p>CANCELADO</p></div>
                                        </div>                                                                                       
                                    </div>
                                </div>
                                <div class="col-md-10 qm-calendario">                                            
                                    <div id="bootstrapModalFullCalendar"></div>
                                </div>
                            </div>
                            <div id="fullCalModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="modalTitle" class="modal-title"></h4>
                                            <p >Consulta/Exame </p>
                                        </div>
                                        <div id="modalBody" class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">ocultar detalhes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		            	                
                </div>
            </div>
        </div>
    </div>
</body>


<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#bootstrapModalFullCalendar').fullCalendar({
            eventLimitText: 'Mais',
            eventLimit: true,
        	views: {
		      basicDay: { buttonText: 'Dia' },
		      basicWeek: { buttonText: 'Semana' },
		      month: { eventLimit: 3, buttonText: 'Mês' }
		    },
            header: {
                left: '',
                center: 'prev title next',
                right: 'basicDay,basicWeek,month'
            },
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#modalBody').html(event.description);
                $('.modal-horario').html(event.start);
                $('#eventUrl').attr('href',event.url);
                $('#fullCalModal').modal();
                return false;
            },
            events:
            [
                <?php foreach($consultas as $c):?>
               {
                  "title":"<?= $c['horario']?>",
                  "allday":"false",
                  "className" : "status-bolinha <?= $c['status']?>",
                  "description":"<h4>Paciente: <?= ($c["nome"] != null)?$c["nome"]:$c['nome_paciente']?></h3><br><h5>Documento: <?= ( $c["nome"]!= null)?$c["documento"]:$c["cpf_paciente"]?></h5><br><h5>Data de Nascimento: <?= ($c['nome'] != null)?date('d/m/Y',strtotime($c['nascimento'])):date('d/m/Y',strtotime($c['nascimento_paciente']))?></h5><br><h5>Tel: <?= $c['contato_1']?> &nbsp <?= $c['contato_2']?></h5><br><h5>Médico: <?= $c['nome_medico']?></h5><br><p><bold>Data: </bold><span><?= date('d/m/Y',strtotime($c['data']))?></span></p><h5><?php echo $c['status'] == 'aguardando_pagamento'?'aguardando pagamento':($c['status'] == 'pago-confirmado'?'atendimento confirmado':$c['status']);?></h5><?php if($c['status'] == "pago"):?><p> Clique no botão abaixo para confirmar que o paciente compareceu a consulta ou exame.</p> <div> <a class='btn btn-primary btn-voltar' href='#' onclick='confirma(<?= $c['id']?>)'>Confirmar Atendimento</a> </div><?php endif ?>",
                  "start":<?= json_encode($c['data'])?>,
                  "end":<?= json_encode($c['data'])?>,                  
               },
                <?php endforeach ?>

                //aguardando_pagamento
                //pago
                //cancelada
               
            ]
        });
    });
    function confirma(id){
        var r = confirm("Deseja confirmar o atendimento do cliente?");
        if (r == true) {
            document.getElementById("agenda").value = id;
            document.getElementById("formConfirmaExameConsulta").submit()
        }
    }
</script>
<?= form_open_multipart(base_url('Empresa/confirmar_atendimento'), ' id="formConfirmaExameConsulta"'); ?>
    <input type="hidden" id="agenda" name="agenda" >
</form>

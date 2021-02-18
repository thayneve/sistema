<div class="edit">
    <h3 class="titulo-pages">Dados da empresa</h3>
    <a class="btn btn-primary btn-voltar" href="javascript:history.go(-1)"><i class="fas fa-caret-left"></i>  Voltar</a>	
        <table class="tabela-filtro">
            <?php foreach($empresa as $key => $linha):?>
                <tr class="table">
                    <?php if($key == 'LOGO'):?>
                        <td class="bold"><?=$key?>:</td>
                        <?php if($linha != ""):?>
                            <td ><img src="<?= $imagensuploads.$linha ?>" alt="Logo da Empresa"></td>
                        <?php else:?>
                            <td>----</td>
                        <?php endif?>
                    <?php else:?>
                        <td class="bold"><?=$key?>:</td>
                        <td ><?=$linha?></td>
                    <?php endif?>
                </tr>
            <?php endforeach?>
        </table>
</div>

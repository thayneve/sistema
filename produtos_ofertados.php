<table class="tabela-filtro">
    <tr class="tbl">
        <th>PRODUTO</th>
        <th>RESTRIÇÃO SEXO</th>
        <th>RESTRIÇÃO IDADE</th>
        <th>OBSERVAÇÃO</th>
        <th>TIPO PRODUTO</th>
        <th>CLASSIFICAÇÃO PRODUTO</th>
    </tr>
    <h3><?=$nome_empresa?></h3>
    <?php foreach($produtos_ofertados as $produto_ofertado):?>
        <tr class="tbl">
            <td class="produto_descricao"><?= $produto_ofertado['produto_descricao']?></td>
            <td class="sexo"><?= $produto_ofertado['sexo']?></td>
            <td class="idade"><?= $produto_ofertado['idade']?></td>
            <td class="obs"><?= $produto_ofertado['obs']?></td>
            <td class="produto_tipo"><?= $produto_ofertado['produto_tipo']?></td>
            <td class="produto_classificacao"><?= $produto_ofertado['produto_classificacao']?></td>
        </tr>
    <?php endforeach?>
</table>

<script>
    const descricao = {
        'sexo': sexo => {
            return {
                'M': 'Homens',
                'F': 'Mulheres',
                'T': ''
            }[sexo || 'T']
        },

        'idade': idadeStr => {
            $idade_definida = /^[<>]\d{1,3}$/.test(idadeStr)
            if ($idade_definida) {
                const descricao = {
                    '>': 'Maior que ',
                    '<': 'Menor que ',
                }[idadeStr[0]]
                return idadeStr.replace(/[<>]/, descricao) + ' anos'
            } else {
                return ''
            }
        },

        'produto_classificacao': produtoClassificacao => {
            return {
                '0': 'Consulta',
                '1': 'Exame'
            }[produtoClassificacao]
        }
    }

    const definirTexto = (campo) => {
        const tds = document.querySelectorAll(`.${campo}`)
        tds.forEach(td => {
            td.innerText = descricao[campo](td.innerText)
        })
    }

    ['sexo', 'idade','produto_classificacao'].forEach(campo => {
        definirTexto(campo)
    })
</script>
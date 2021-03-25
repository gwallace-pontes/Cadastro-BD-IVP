<?php
error_reporting(0);

function condo_selecionado() {
    global $conn;

    $condo_atual = $_GET['condo'];

    if(isset($condo_atual)) {
        $statement = $conn->prepare("SELECT id, nome FROM condominios WHERE id = :id");
        $statement->bindParam(":id", $condo_atual);
        $statement->execute();
    
        $row = $statement->fetch();
    
        echo "<script>".
            //"$('#input-condo').autoComplete('set', {value: ".$row['id'].", text: \"". $row['nome'] ."\"});".
            "$('#input-condo').val('".$row['nome']."');".
            "$('#input-condo-value').val(".$row['id'].");".
            "</script>";
    }

    $bloco_atual = $_GET['bloco'];

    if(isset($bloco_atual)) {
        $statement = $conn->prepare("SELECT id, nome FROM bloco WHERE id = :id");
        $statement->bindParam(":id", $bloco_atual);
        $statement->execute();
    
        $row = $statement->fetch();
    
        echo "<script>".
            //"$('#input-bloco').autoComplete('set', {value: ".$row['id'].", text: \"". $row['nome'] ."\"});".
            "$('#input-bloco').val('".$row['nome']."');".
            "$('#input-bloco-value').val(".$row['id'].");".
            "</script>";
    }
}

function dados_condo() {
    global $conn;

    $condo_atual = $_GET['condo'];

    if(isset($condo_atual)) {
        $statement = $conn->prepare("SELECT
                                        condominios.id,
                                        cep.cep,
                                        cep.rua,
                                        cep.bairro,
                                        cep.cidade,
                                        condominios.numero
                                    FROM
                                        cep,
                                        condominios
                                    WHERE
                                        condominios.cep = cep.cep
                                    AND condominios.id = :id
                                    ");
        $statement->bindParam(":id", $condo_atual);
        $statement->execute();
    
        $row = $statement->fetch();
        return $row;
    }
}

function lista_blocos_condo($condo_id) {
    global $conn;

    if(isset($condo_id)) {
        $statement = $conn->prepare("SELECT id, nome FROM bloco WHERE idPredio = :id ORDER BY nome");
        $statement->bindParam(":id", $condo_id);
    } else {
        $statement = $conn->prepare("SELECT id, nome FROM bloco ORDER BY nome");
    }
    $statement->execute();
    
    $rows = $statement->fetchAll();
    
    return $rows;
}

function planos_condo() {
    global $conn;
    require("rbx.php");

    $condo_id = $_GET['condo'];
    $bloco_id = $_GET['bloco'];

    if(isset($condo_id) && isset($bloco_id)) {
        // Tecnologia
        $smt1 = $conn->prepare("SELECT
                                    estrutura.tecnologia
                                FROM
                                    bloco,
                                    estrutura
                                WHERE
                                    bloco.idPredio = :idPredio
                                and bloco.id = :idBloco
                                and estrutura.id = bloco.idEstrutura");
    
        $smt1->bindParam(":idPredio", $condo_id);
        $smt1->bindParam(":idBloco", $bloco_id);
        $smt1->execute();

        $tecnologia = $smt1->fetch(PDO::FETCH_ASSOC)['tecnologia'];
        
        // Tipo/Valor
        $smt = $rbx->prepare("SELECT 
                                    pp.Codigo, 
                                    pp.Descricao,
                                    sum(p.Valor) as Valor
                                FROM 
                                    PlanosPacotes pp,
                                    PlanosRegrasComerciais prc,
                                    Planos p,
                                    PlanosPacotesItens ppi
                                WHERE 
                                    pp.Codigo = prc.Codigo and
                                    pp.Situacao = 'A' and
                                    p.Codigo = ppi.Plano and
                                    pp.Codigo = ppi.Pacote and
                                    prc.Filtro like :idPredio
                                GROUP BY pp.Codigo, pp.Descricao
                                ORDER BY sum(p.Valor) desc");
        $smt->bindValue(":idPredio", '%'.$condo_id.'%');
        $smt->execute();

        $rows = $smt->fetchAll(PDO::FETCH_ASSOC);

        for($i = 0; $i < count($rows); $i++) {
            $rows[$i]['tecnologia'] = $tecnologia;
        }
        
        return $rows;
    }

}

function moradia() {
    global $conn;

    $bloco_id = $_GET['bloco'];

    if(isset($bloco_id)) {
        $smt = $conn->prepare("SELECT
                                    abrev, abrevUnidade, tipoUnidade, qtdAndares, unidporAndar, andarInicial
                                FROM
                                    bloco
                                WHERE
                                    id = :idBloco");

        $smt->bindParam(":idBloco", $bloco_id);
        $smt->execute();

        $info_bloco = $smt->fetch(PDO::FETCH_ASSOC);

        $retorno = array(
            tipo => "ap", // ou "etc"
            label => $info_bloco['tipoUnidade'],
            
        );

        if(strtoupper($info_bloco['tipoUnidade']) == 'APARTAMENTO') {
            $qtd_andares = intval($info_bloco['qtdAndares']);
            $unid_por_andar = intval($info_bloco['unidporAndar']);
            $andar_inicial = intval($info_bloco['andarInicial']);

            $qtd_aps_total = ($qtd_andares - $andar_inicial + 1) * $unid_por_andar;

            $aps = array();

            $aux = 0;
            $ap_base = ($andar_inicial * 100) + 1;

            $ap_atual = $ap_base;
            for($i = 0; $i < $qtd_aps_total; $i++) {
                if ($aux == $unid_por_andar){
                    $ap_base += 100;
                    $aux = 0;
                }

                $ap_atual = $ap_base + $aux;
                
                array_push($aps, $ap_atual);
                $aux++;
            }

            $retorno['tipo'] = "ap";
            $retorno['opcoes'] = $aps;

            if(strtoupper($info_bloco['abrev']) == 'UNICO') {
                $retorno['mensagem'] = $info_bloco['abrevUnidade'] . " ";
            } else {
                $retorno['mensagem'] = $info_bloco['abrev'] . " - " . $info_bloco['abrevUnidade'] . " ";
            }

        } else {
            $retorno['tipo'] = "etc";
            $retorno['mensagem'] = $info_bloco['abrev'] . " ";
        }
        return $retorno;
    }
}

?>
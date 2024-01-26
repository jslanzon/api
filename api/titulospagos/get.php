<?php

if($acao == '' && $param ==''){echo json_encode(["ERRO" => "Caminho não encontrado"]); exit;}
        
if($acao == 'lista' && $param ==''){
    $db = DB::connect();
    $rs = $db->prepare("SELECT 
    t.id,
    t.descr,
    t.total,
    t.id_banco,
    t.tipo,
    t.data,

    b.nome,
    b.saldo_inicial,
    b.limite,
    b.status

    
    FROM titulos AS t

    JOIN bancos as b 
    ON t.id_banco=b.id     
    
   
    WHERE t.data >= '2023-12-01' 
    
    
    ORDER BY t.data DESC");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);
    
    if($obj){
        echo json_encode($obj);
    }else{
        echo json_encode(["dados" => "Não existe dados para retornar"]);
    }
}

if($acao == 'lista' && $param !=''){
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM titulos WHERE id={$param}");
    $rs->execute();
    $obj = $rs->fetchObject();
    
    if($obj){
        echo json_encode($obj);
    }else{
        echo json_encode(["dados" => "Não existe parametros para retornar"]);
    }
}

# `SELECT * FROM titulos WHERE status="Pago" AND data > "2023-12-01"  AND data < "2023-12-19" ORDER BY data`
<?php

if($acao == '' && $param ==''){echo json_encode(["ERRO" => "Caminho não encontrado"]); exit;}
        
if($acao == 'lista' && $param ==''){
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM `titulos` WHERE `status` = 'Aberto' AND `acordado` >= '2024-01-01' AND `acordado` <= '2024-01-31' ORDER BY `acordado`");
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
    $rs = $db->prepare("SELECT * FROM titulos WHERE `status` = 'Aberto' AND `acordado` >= '2024-01-01' AND acordado <='{$param}'ORDER BY `acordado`");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);
    
    if($obj){
        echo json_encode($obj);
    }else{
        echo json_encode(["dados" => "Não existe parametros para retornar"]);
    }
}
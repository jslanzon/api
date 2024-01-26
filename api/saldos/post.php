<?php

if($acao == '' && $param ==''){echo json_encode(["ERRO" => "Caminho não encontrado"]); exit;}
        
if($acao == 'adiciona' && $param ==''){
    
    $sql  = "INSERT INTO bancos (";
    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "{$indice},";
        }else{
            $sql .= "{$indice}";
        }
        $contador ++;
    }
   
    $sql .= ") VALUES (";
    $contador = 1;
    foreach (array_values($_POST) as $valor) {
        if (count($_POST) > $contador) {
            $sql .= "'{$valor}',";
        }else{
            $sql .= "'{$valor}'";
        }
        $contador ++;
    }      
    $sql .= ")";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if($exec){
        echo json_encode(["dados" => 'Dados inseridos com sucesso :)']);
    }else{
        echo json_encode(["dados" => "Houve um erro ao inserir os dados :("]);
    }
    
}


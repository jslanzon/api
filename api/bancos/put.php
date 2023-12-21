<?php

if($acao == '' && $param ==''){echo json_encode(["ERRO" => "Caminho não encontrado"]); exit;}
if($acao == 'altera' && $param ==''){echo json_encode(["ERRO" => "É necessário informar o ID"]); exit;}
        
if($acao == 'altera' && $param !=''){

    array_shift($_POST);
    
    $sql  = "UPDATE bancos SET " ;
    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) > $contador) {
            $sql .= "{$indice} = '{$_POST[$indice]}', ";
        }else{
            $sql .= "{$indice} = '{$_POST[$indice]}' ";
        }
        $contador ++;
    }

    $sql .= "WHERE id={$param}";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if($exec){
        echo json_encode(["dados" => 'Dados atualizados com sucesso :)']);
    }else{
        echo json_encode(["dados" => "Houve um erro ao atualizar os dados :("]);
    }
        
}


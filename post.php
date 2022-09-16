<?php

function isset_posts(...$posts){
    foreach ($posts as $p){
        if (!isset($_POST[$p]))
            return false;
    }

    return true;
};

if (isset_posts("submit", "nome", "salario", "endereco")){
    $invalids = ["nome", "salario", "endereco"];

    if ($_POST["nome"] != "")
        unset($invalids[0]);
        
    if ($_POST["salario"] != "")
        unset($invalids[1]);
        
    if ($_POST["endereco"] != "")
        unset($invalids[2]);

    $result = (float)$_POST["salario"] / (float)1212;
    $data = [
        "invalids" => array_values($invalids),
        "result" => number_format((float)$result, 2, ',', '')
    ];

    echo json_encode($data);
    exit();
}
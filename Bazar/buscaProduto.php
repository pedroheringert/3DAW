<?php
session_start();

if(!isset($_SESSION["autenticado"]))
    {
        http_response_code(401);
        exit;
    }




$banco_em_memoria = [
    1 => [
        "descricao" => "Marreta Para Quebrar Concreto",
        "preco" => 123.45
    ],
    // imagine centenas de produtos aqui!
];

$codigo = filter_input( INPUT_GET, "codigo", FILTER_SANITIZE_NUMBER_INT);

$produto = $banco_em_memoria[ $codigo ];

if( $produto == null) {
    http_response_code(404); // NOT FOUND
} else {
    Header("Content-Type: application/json");
    echo json_encode($produto);
}
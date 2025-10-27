<?php
header('Content-Type: application/json');

$quantidade = filter_input(INPUT_GET, "quantidade", FILTER_SANITIZE_NUMBER_INT);
$limite = filter_input(INPUT_GET, "limite", FILTER_SANITIZE_NUMBER_INT);

if ($quantidade <= 0 || $limite <= 0 || $quantidade > $limite) {
    http_response_code(400);
    echo json_encode(['erro' => 'Valores inválidos. A quantidade deve ser positiva e menor ou igual ao limite.']);
    exit();
}

$numeros_possiveis = range(1, $limite);
shuffle($numeros_possiveis);
$numeros_sorteados = array_slice($numeros_possiveis, 0, $quantidade);
sort($numeros_sorteados);

$resposta = [
    'sucesso' => true,
    'numeros' => $numeros_sorteados
];

echo json_encode($resposta);
?>
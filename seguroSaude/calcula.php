<?php
header('Content-Type: application/json');

$faixa_etaria = filter_input(INPUT_POST, "faixa_etaria", FILTER_SANITIZE_NUMBER_INT);
$tem_doenca = filter_input(INPUT_POST, "doente", FILTER_VALIDATE_BOOLEAN);

$valor_base = 200;

switch ($faixa_etaria) {
    case 1:
        $valor_faixa = $valor_base;
        break;
    case 2:
        $valor_faixa = $valor_base * 1.5;
        break;
    case 3:
        $valor_faixa = $valor_base * pow(1.5, 2);
        break;
    case 4:
        $valor_faixa = $valor_base * pow(1.5, 3);
        break;
    case 5:
        $valor_faixa = $valor_base * pow(1.5, 4);
        break;
    case 6:
        $valor_faixa = $valor_base * pow(1.5, 5);
        break;
    default:
        http_response_code(400);
        echo json_encode(['erro' => 'Faixa etária inválida.']);
        exit();
}

$valor_final = $valor_faixa;

if ($tem_doenca) {
    $valor_final = $valor_faixa * 1.30;
}

$resposta = [
    'sucesso' => true,
    'valor_final' => number_format($valor_final, 2, ',', '.')
];

echo json_encode($resposta);
?>
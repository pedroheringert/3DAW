<?php
require_once("../comum.php");
require_once(BASE_DIR . "/somenteAutenticado.php");

use Mbelo\Bazar\Banco;

$id_categoria = filter_input(INPUT_POST, "id_categoria", FILTER_VALIDATE_INT);

if (empty($id_categoria) || $id_categoria === false) {
    http_response_code(400); 
    echo json_encode(["erro" => "ID da categoria inválido ou não fornecido."]);
    exit; 
}

try {
    $pdo = Banco::obterConexao();

    $ps = $pdo->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");

    $ps->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);

    $sucesso = $ps->execute();

    if ($sucesso) {
        $linhas_afetadas = $ps->rowCount();

        if ($linhas_afetadas > 0) {
            http_response_code(200); 
            echo json_encode([
                "sucesso" => true,
                "mensagem" => "Categoria deletada com sucesso.",
                "id_deletado" => $id_categoria
            ]);
        } else {
            http_response_code(404); 
            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Nenhuma categoria encontrada com o ID fornecido."
            ]);
        }
    } else {
        http_response_code(500); 
        echo json_encode(["erro" => "Ocorreu um erro no servidor ao tentar deletar."]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "erro" => "Erro de banco de dados: " . $e->getMessage()
    ]);
}
?>
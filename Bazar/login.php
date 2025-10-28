<?php

session_start();


$nome = filter_input(INPUT_POST,"nome");
$senha = filter_input(INPUT_POST,"senha"); 

if($nome == "mbelo" && $senha == "patasdegalinha")
    {
        $_SESSION["autenticado"] = $nome;

        header("Location: /Bazar/index.php");
    }
    else 
        {
            header("Location: login.html?erro=1");
        }
?>
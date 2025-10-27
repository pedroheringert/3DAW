<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP: Ping, Pong, Ploc</title>
    <style>
        body { 
            font-family: 'Courier New', Courier, monospace;
            line-height: 1.6;
            margin: 20px;
        }
        ol {
            padding-left: 40px;
        }
    </style>
</head>
<body>

    <ol>
        <?php
        
        for ($i = 1; $i <= 100; $i++) {
            
            echo "<li>";

           
            if ($i % 15 == 0) {
                echo "<u>ploc</u>";
            } 
           
            else if ($i % 3 == 0) {
                echo "<b>ping</b>";
            } 
           
            else if ($i % 5 == 0) {
                echo "<i>pong</i>";
            } 
            
            else {
                echo "ok";
            }
            
            
            echo "</li>\n";
        }
        ?>
    </ol>

</body>
</html>
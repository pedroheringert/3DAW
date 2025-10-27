<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <ul>


    <?php

    for($i=1;$i<101;$i++)
        {

            if(($i==1) || ($i%5)==0)
            echo "<li>" . $i . "</li>";
        }

    ?>

    </ul>


    

</body>
</html>
    <?php
            function NumeroParaTexto($i){

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
                
            }
            for ($i = 1; $i <= 100; $i++) {
                
                echo "<li>";

            
            NumeroParaTexto($i);
                
                
                echo "</li>\n";
            }
            ?>

<?php
    
    echo "<table border=1>";
        //variable que define el tamaño del tablero
        $x=11; 
        //dibuja las filas
        for($y=1; $y<=$x; $y++)
        {
            echo "<tr>";
            //dibuja columnas
            for($z=1; $z<=$x; $z++)
            {
                echo '<td>';
                //para que las filas que sean un número par comiencen con el negro
                if($y%2==0)
                {
                    if($z%2==0)
                        echo '<img src="./blanco.jpg" width="40" height="40">'; 
                    else
                        echo '<img src="./negro.jpg" width="40" height="40">';
                }  
                else
                //para que las filas que sean un número impar comiencen con el blanco
                {
                    if($z%2!=0)
                        echo '<img src="./blanco.jpg" width="40" height="40">'; 
                    else
                    echo '<img src="./negro.jpg" width="40" height="40">'; 
                }
                
                echo '</td>';
            }      
            echo "</tr>";
        }
    echo "</table>";
?>

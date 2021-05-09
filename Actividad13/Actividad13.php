<?php
    echo "<h1>Batalla Naval</h1>";

    $tam=10;
    $tamaño_tab=($tam+1)*($tam+1)-1;
    $vidas=8;
    $aun_no=1;
    $ganar=0;


    //Historial
    if(isset($_POST["historial"])){
      $historial=$_POST["historial"];
    }
    else{
      $historial=array();
    }

    //Si está jugando
    if(isset($_POST["posy"])  && isset($_POST["posx"]))
    {
       
        $dispx=$_POST["posx"];
        $dispy=$_POST["posy"];
        $pos=$_POST["pos"];
        $vidas=$_POST["vidas"];
        $pos2=$pos;
        //asignarle a las letras números
        $dispx=strtoupper($dispx);
        $cadena=$dispx.$dispy;
        $convertir=["0","A","B","C","D","E","F","G","H","I","J"];
        foreach($convertir as $llave => $valor)
        {
            if($dispx==$valor)
            {
                $dispx2=$llave;
            }
        }
        //coordenada del disparo
        $coor_disp=($dispx2+$dispy)+($dispy*$tam);
        if($pos[$coor_disp]=="$")
        {
            $vidas--;
            $pos2[$coor_disp]="X";
        }
        else
        {
            $pos[$coor_disp]="Y";
            $pos2[$coor_disp]="Y";
        }
        //arreglo con el HISTORIAL de disparos
        if($vidas>0)
        {
            $ganar=0;//Ver si ya ganó
            for($g=0; $g<=$tamaño_tab; $g++)
            {
                if($pos[$g]=="Y")
                    $ganar+=1;
            }
            if($ganar<7)
            {
                echo "<h2>Vidas:";
                for($i=1; $i<=$vidas; $i++)
                {
                    echo"<td><img src='./corazon.png' weight='20' height='20'></td>";
                }
                echo "</h2>";
                echo "<h3>Historial de disparos:</h3>";
                array_push($historial, $cadena);
                for($i=0; $i<count($historial); $i++)
                {
                    echo $historial[$i].",";
                }

                //dibujar la tabla
                echo "<table border='1'><tr>";
                for($i=0; $i<=$tamaño_tab; $i++)
                {

                    if($i%11==0)
                    {
                        echo"</tr><tr>";
                    }
                    if($pos2[$i]=="$" || $pos2[$i]=="#")
                        echo"<td><img src='./mar.png' weight='30' height='30'></td>";
                    elseif($pos2[$i]=="X")
                        echo"<td><img src='./equis.png' weight='30' height='30'></td>";
                    elseif($pos2[$i]=="Y")   
                        echo"<td><img src='./barco.jpg' weight='35' height='35'></td>";
                    else
                    {
                        echo"<td align='center'>".$pos2[$i]."</td>";
                    }

                }
                echo "</table>";
            }
            else
            {
                echo "<h2>Felicidades, has ganado!!!</h2>
                <form action='./Actividad13.php' method='POST'>
                <input type='submit' name='Volver' value='Volver'>
                </form>";
            }
        }
        else
        {
            echo "<h2>Has perdido todas tus vidas, sigue intentando...</h2>
            <form action='./Actividad13.php' method='POST'>
            <input type='submit' name='Volver' value='Volver'>
            </form>";

        }
    }


    else//si no ha mandado nada
    {
        echo "<h2>Vidas:";
        for($i=1; $i<=$vidas; $i++)
        {
            echo"<td><img src='./corazon.png' weight='20' height='20'></td>";
        }
        echo "</h2>";
        $x=1;
        $letras=ord('A');
        $tamaño_tab=($tam+1)*($tam+1)-1;

        //llenar de caracteres $
        $pos[0]=" ";
        for($i=1; $i<=$tamaño_tab; $i++)
        {
            $pos[$i]="$";
            if($i>=1 && $i<=$tam)//pone letras
            {
                $pos[$i]=chr($letras);
                $letras++;
            }
            if($i%($tam+1)==0 && $i!=1)//pone número
            {
                $pos[$i]=$x;
                $x++;
            }
        }
        
        //BARCOS ALEATORIOS-----------------------------------

        $num_rand= rand($tam+2, $tamaño_tab);
        $otro=rand(1,2);// para que se ponga horizontal o vertical aleatoriamente
        $barco4=$num_rand;
        $recordar=array();//posiciones del barco 4
        //Barcos aleatorios HORIZONTAL(4)
        if($otro==1)
        {
            if($num_rand%($tam+1)==0 || $num_rand+1%($tam+1)==0)
                $barco4+=2;
            if($barco4%($tam+1)<=($tam-4))//rand%11<=6
            {
                for($i=0; $i<=3; $i++)//pone # en las localidades
                {
                    $pos[$barco4+$i]="#";
                    array_push($recordar,$barco4+$i);
                }
            }
            else
            {
                for($i=3; $i>=0; $i--)//pone # en las localidades
                {
                    $pos[$barco4-$i]="#";
                    array_push($recordar,$barco4-$i);
                }
            }
        }
        //Barcos aleatorios VERTICAL(4)
        if($otro==2)
        {
            for($i=0; $i<=3; $i++)
            {
                if($barco4%($tam+1)==0)
                {
                    $barco4+=1;
                }
                array_push($recordar,$barco4);
                $pos[$barco4]="#";
                if($num_rand<88)//numero<98
                    $barco4+=($tam+1);
                else
                    $barco4-=($tam+1);
                    
            }
        }
        
        $num_rand2= rand($tam+2, $tamaño_tab);
        //var_dump($recordar);
        //Ver que no se sobrepongan
        foreach($recordar as $llave => $valor)
        {
            for($i=0; $i<4; $i++)
            {
                if($num_rand2+$i==$valor || $num_rand2-$i==$valor || $num_rand2+(($tam+1)*$i)==$valor || $num_rand2-(($tam+1)*$i)==$valor)
                {
                    if($num_rand2<$tamaño_tab && $num_rand2>$tam+6)
                        $num_rand2-=5;
                    else
                        $num_rand2+=5;
                }
            }
        }

        $otro2=rand(1,2);
        $barco3=$num_rand2;
        //Barcos aleatorios HORIZONTAL(3)
        if($otro2==1)
        {
            if($num_rand2%($tam+1)==0 || $num_rand2+1%($tam+1)==0)
                $barco3+=2;
            if($barco3%($tam+1)<=($tam-3))//rand%11<=6
            {
                for($i=0; $i<=2; $i++)//pone # en las localidades
                {
                    $pos[$barco3+$i]="#";
                }
            }
            else
            {
                for($i=2; $i>=0; $i--)//pone # en las localidades
                {
                    $pos[$barco3-$i]="#";
                }
            }
        }
        //Barcos aleatorios VERTICAL(3)
        if($otro2==2)
        {
            for($i=0; $i<=2; $i++)
            {
                if($barco3%($tam+1)==0)
                {
                    $barco3+=1;
                }
                $pos[$barco3]="#";
                if($num_rand2<88)//numero<98
                    $barco3+=($tam+1);
                else
                    $barco3-=($tam+1);
                    
            }
        }
        //dibujar la tabla
        echo "<table border='1'><tr>";
        for($i=0; $i<=$tamaño_tab; $i++)
        {

            if($i%11==0)
                echo"</tr><tr>";
            if($pos[$i]=="$" || $pos[$i]=="#")
                echo"<td><img src='./mar.png' weight='30' height='30'></td>";
            else
                echo"<td align='center'>".$pos[$i]."</td>";

        }
        echo "</table>";
    }

    if($vidas>0 && $ganar<7)
    {
        echo "<form action='./Actividad13.php' method='POST'>";
        echo "Posición X(Letra)".'<input type="text" name="posx" size="1" maxlength="1" pattern="[A-Ja-j]{1}" required>';
        echo "Posición Y(Número)".'<input type="number" name="posy" min=1 max=10 required>';
        echo '<button type="submit" name="Disparar">Disparar</button>';
        for ($i=0; $i < sizeof($historial); $i++){
          echo "<input type='hidden' name='historial[]' value='".$historial[$i]."'>";
        }
        for ($a=0; $a < sizeof($pos); $a++){
            echo "<input type='hidden' name='pos[]' value='".$pos[$a]."'>";
          }
          echo "<input type='hidden' name='vidas' value='".$vidas."'>";
        echo"</form>";
    }



?>

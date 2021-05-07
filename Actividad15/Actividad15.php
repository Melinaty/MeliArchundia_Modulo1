<?php
        function subir ()//Para que ponga el botón de subir obra
        {
            echo "<form action='./Migaleria.html' method='POST'>
                <button type='submit'>Subir obra a mi galería</button>
                </form>";
        }
        if(isset($_FILES["archivo"]))//Si si se mando el formulario
        {
            //checa si si se mandó el año y el autor, si no poner sin autor.
            $autor=(isset($_POST["autor"]) && $_POST["autor"]!="") ? $_POST["autor"]:"Sin autor";
            $año=(isset($_POST["año"]) && $_POST["año"]!="") ? $_POST["año"]:"Sin año";
            $obra=$_POST["obra"];

            $arch=$_FILES['archivo']['tmp_name'];
            $name=$_FILES['archivo']['name'];
            $ext=pathinfo($name,PATHINFO_EXTENSION);
            //Checa si la extensión es jpg, jpeg, png
            if($ext=="jpg" || $ext=="jpeg" || $ext=="png")
            {
               rename($arch, './statics/'.$obra."$".$autor."$".$año."$." .pathinfo($name,PATHINFO_EXTENSION));
               echo "<h1>TU IMAGEN SE CARGÓ CORRECTAMENTE EN LA GALERÍA</h1>
                <form action='./Actividad15.php' method='POST'>
                <button type='submit'>Ver galería</button>
                </form>"; 
            }
            else//dice que no se subió porque mandaron un archivo incorrecto
            {
                echo "<h1>NO SE PUDO CARGAR EL ARCHIVO PORQUE NO TIENE EXTENSIÓN PNG, JPG O JPEG.</h1>"; 
                subir();
            }
            
        }
        else
        {
            $ruta="./statics";//guarda la ruta a donde se envían las imágenes
            $carpeta= opendir($ruta);
            $archivos = array();
            $hay_archivos= true;
            $i=0;
            while($hay_archivos)//va a hacerlo mientra existan archivos dentro de la carpeta
            {
                $archivo2 = readdir($carpeta);//lee lo que hay en la carpeta
                if($archivo2 !== false)
                {
                    $extension= pathinfo($archivo2, PATHINFO_EXTENSION);
                    if($archivo2 !="." && $archivo2 !=".." && ($extension=="jpg" || $extension=="jpeg" || $extension=="png"))
                    {
                        $i++;
                        array_push($archivos, $archivo2);   
                    }
                }
                    
                else
                {
                    $hay_archivos=false;
                }
            }
            if($i!=0)//Si por lo menos hay un archivo 
            {
                echo "<h1>IMAGENES EN LA GALERÍA DE ARTE</h1>";
                echo "<table border='1'align='center' style='width:auto'>";
                echo "<tr>";
                foreach($archivos as $llave => $value)
                {
                    if($llave%2==0)
                    {
                        echo "<tr>";
                    }
                    echo "<td><img src='./statics/".$value."'width='300' height='300' alt='Soy una imagen'>";
                    $value2=strtoupper($value);
                    $nombre_obra=explode("$",$value2);
                    //lista con la información
                    echo "<ul>
                        <li><strong>Nombre de la pintura:</strong>".$nombre_obra[0]."</li>
                        <li><strong>Nombre del pintor:</strong>".$nombre_obra[1]."</li>
                        <li><strong>Año en que se realizo:</strong>".$nombre_obra[2]."</li>
                    </li></td>";
                    if($llave%2==1)
                    {
                        echo "</tr>";
                    }
                }
                echo "</table>";
            }
            else//si no hay archivos
            {
                echo "<h1>TU GALERÍA DE ARTE NO TIENE NINGUNA IMAGEN</h1>";
            }
                subir();
            closedir($carpeta);
        }
       
?>
<?php

    //saca la diferencia horaria y la suma o resta con las horas que le mandemos según sea el caso
    function convertir ($llaves_horarios,$hora)
    {
        
        date_default_timezone_set($llaves_horarios);
        $hora_ext=date("H");
        $dia_ext=date("j");
        date_default_timezone_set("America/Mexico_City");
        $hora_mex=date("H");
        $dia_mex=date("j");
        //checa si es el mismo día aqui y allá 
        if($dia_mex==$dia_ext)
        {
            $diferencia=$hora_ext-$hora_mex;
        }
        else
        {
            $diferencia=(24-$hora_mex)+$hora_ext;
        }

        $mktime= mktime($hora+$diferencia);//te da los seg
        $horafinal=localtime($mktime, true);
            return $horafinal["tm_hour"];

    
    }
    //arreglo que dependiendo de la ciudad te da la zona horaria.
    $horarios=["America/New_York"=>"Nueva York", "America/Sao_Paulo" => "Sao Paulo", "Europe/Madrid"=>"Madrid", "Europe/Paris"=> "Paris", "Europe/Rome" => "Roma",
    "Europe/Athens" => "Atenas", "Asia/Shanghai" =>"Beijin", "Asia/Tokyo" =>"Tokio"];

    //revisa que es lo que se mandó
    $hidden=$_POST["Revisar"];
    
    if($hidden=="1")//si mandaron el primer formulario
    {
        $zona=(isset($_POST["zona"]) && $_POST["zona"]!="") ? $_POST["zona"]:"No especifico";

        //convertimos la hora en forma de cadena que nos manda el usuario en un arreglo
        $hora=$_POST["hora"];
        $hora=explode(":",$hora);

        echo "<table border='1'>
        <thead>
            <tr>
                <th colspan='2'><h2>Reloj mundial</h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ciudad de México</td>
                <td>" .$hora[0]." hrs ".$hora[1]." min</td>
            </tr>";
        //recorre el arreglo que nos devuelve el checkout
        foreach($zona as $llave => $ciudad_check)
        {
            echo "<tr>";
            echo "<td>".$ciudad_check."</td>";
            
            //recorre el arreglo con las zonas horarias y las ciudades
            foreach($horarios as $llaves_horarios => $ciudad_hor)
            {   
                //si el valor del arreglo de checkout es igual al valor del arreglo con las zonas horarias enviara la llave del arreglo de horarios
                //y la hora a la función convertir
                if($ciudad_hor == $ciudad_check)
                {
                    echo "<td>".Convertir($llaves_horarios,$hora[0])." hrs ". $hora[1]. " mins </td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody>
        </table>";
    }
    else//Recibe 2 para el segundo formulario
    {
        //arreglo con la relación entre las variables y lo que manda el checkout
        $val_tiempo=["dias"=>"Dias", "mins" => "Minutos", "hrs"=>"Horas", "es"=> "¿Es fin de semana?"];

        $calcula=(isset($_POST["calcula"]) && $_POST["calcula"]!="") ? $_POST["calcula"]:"No especifico";

        date_default_timezone_set("America/Mexico_City");

        $fecha=$_POST["fecha"];
        $fecha2=explode("-",$fecha);
        
        //recibe el día y el mes del cumpleaños de la persona
        $mktime=mktime(0, 0, 0, $fecha2[1], $fecha2[2], date("Y"));
        $dia_cumple=getdate($mktime);//fecha con el cumpleaños pero este año
        $dia_actual=getdate();//fecha actual

        //checa si el día de su cumpleaños es mayor que el día de hoy
        if($dia_cumple["yday"] > $dia_actual["yday"])
        {
            $dias = $dia_cumple["yday"] - $dia_actual["yday"];

            //para ver si es fin de semana
            if($dia_cumple["wday"]==0 || $dia_cumple["wday"]==6)
                $es="si";
            else
                $es="no";
        }
        else
        {
            //ver si es fin de semana pero el próximo año
            $mktime=mktime(0, 0, 0, $fecha2[1], $fecha2[2], date("Y")+1);
            $siguiente=getdate($mktime);
            if($siguiente["wday"]==0 || $siguiente["wday"]==6)
                $es="si";
            else
                $es="no";

            //saber cuantos días faltan para su cumpleaños tomando en cuenta que será el próximo año
            if(date("Y")%4==0)
                $dias=(366-$dia_actual["yday"])+$dia_cumple["yday"];
            else
                $dias=(365-$dia_actual["yday"])+$dia_cumple["yday"];


        }

        $hrs=(($dias-1)*24)+(24-$dia_actual["hours"]);//valor de horas
        $mins=(($hrs-1)*60)+(60-$dia_actual["minutes"]);//valor de minutos

        echo "<table border='1'>
            <thead>
                <tr>
                    <th><h2>Cumpleaños</h2></th>
                    <th><h2>".$fecha2[2]."-".$fecha2[1]."-".$fecha2[0]."</h2></th>
                </tr>
            </thead>
            <tbody>";
                //recorre el arreglo que manda el checkout
                foreach($calcula as $llave => $pide)
                {
                    //recorre el arreglo de $val_tiempo
                    foreach($val_tiempo as $llaves_tiempo => $valores)
                    {   
                        //si el valor es igual a lo que estamos pidiendo
                        if($pide == $valores)
                        {
                            echo "<tr>";
                            echo "<td>".$pide." </td>";
                            //$$llaves_tiempo te da el valor de la variable con ese nombre ej.$(mins) y el segundo $llaves_tiempo solo va a imprimir
                            //el valor como una cadena "mins" para que al final quede como ej.'10 mins'
                            echo "<td>".$$llaves_tiempo." ".$llaves_tiempo."</td>";
                            echo "</tr>";
                        }
                    }
                }
        echo "</tbody>
        </table>";
        

    }

        
?>
       
 
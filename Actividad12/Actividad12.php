<?php
$clave=[" "=>"/",
"."=>".-.-.-",
"1"=>".----",
"2"=>"..---",
"3"=>"...--",
"4"=>"....-",
"5"=>".....",
"6"=>"-....",
"7"=>"--...",
"8"=>"---..",
"9"=>"----.",
"0"=>"-----", 
"!"=>"--..--", 
","=>"-.-.--",
"?"=>"..--..",
"\""=>".-..-.",
"a" => ".-",
"b"=>"-...",
"c"=>"-.-.",
"d"=>"-..",
"e"=>".",
"f"=>"..-.",
"g"=>"--.",
"h"=>"....",
"i"=>"..",
"j"=>".---",
"k"=>"-.-",
"l"=>".-..",
"m"=>"--",
"n"=>"-.",
"o"=>"---",
"p"=>".--.",
"q"=>"--.-",
"r"=>".-.",
"s"=>"...",
"t"=>"-",
"u"=>"..-",
"v"=>"...-",
"w"=>".--",
"x"=>"-..-",
"y"=>"-.--",
"z"=>"--.."];
$mensaje= $_POST["desc"];
$traduce= $_POST["traducir"];


//Cambia al idioma al que quieres traducir.
switch($traduce)
{
    case "Español a Morse":
        $mensaje1=strtolower($mensaje);
        echo $mensaje1;
        if(stripos($mensaje1, "a")||stripos($mensaje1, "b")||stripos($mensaje1, "c")||stripos($mensaje1, "d")||stripos($mensaje1, "e")||stripos($mensaje1, "f")||stripos($mensaje1, "g")||stripos($mensaje1, "h")
        ||stripos($mensaje1, "i")||stripos($mensaje1, "j")||stripos($mensaje1, "k")||stripos($mensaje1, "l")||stripos($mensaje1, "m")||stripos($mensaje1, "n")||stripos($mensaje1, "o")||stripos($mensaje1, "p")
        ||stripos($mensaje1, "q")||stripos($mensaje1, "r")||stripos($mensaje1, "s")||stripos($mensaje1, "t")||stripos($mensaje1, "u")||stripos($mensaje1, "v")||stripos($mensaje1, "w")
        ||stripos($mensaje1, "x")||stripos($mensaje1, "y")||stripos($mensaje1, "z")||stripos($mensaje1, "1")||stripos($mensaje1, "2")||stripos($mensaje1, "3")||stripos($mensaje1, "4")
        ||stripos($mensaje1, "5")||stripos($mensaje1, "6")||stripos($mensaje1, "7")||stripos($mensaje1, "8")||stripos($mensaje1, "9")||stripos($mensaje1, "0")||stripos($mensaje1, "?")
        ||stripos($mensaje1, "\"")||stripos($mensaje1, "!")||stripos($mensaje1, ","))
        {
            // Te dice cual es tu mensaje en mayusculas
            echo "<h1>Su mensaje a traducir es:</h1>";
            echo strtoupper($mensaje).'<br>';
            //asigna el mensaje a una variable para poder reescribirla
            $traduccion=$mensaje;
            //recorre el arreglo
            foreach($clave as $letra => $morse)
            {
                //reemplaza la letra por el valor a morse
                $traduccion=str_ireplace($letra, $morse ." ", $traduccion);  
    
            }  
            $traduccion=str_ireplace("/", "&nbsp", $traduccion);  
            echo "<h1>Tu mensaje es </h1><br>";
            echo $traduccion;
            echo "<br><br>";
        }  
        else
        {
            echo"No se pudo traducir su texto porque introdujo carateres inválidos o está intentando traducir del Morse al español";
        }
        echo "<br><br>";
        echo "<input type='button' onclick='history.back()' name='volver' value='Regresar'>";  
        break;

    case "Morse a Español":
        if(stripos($mensaje,".-") || stripos($mensaje, "-...") || stripos($mensaje, "-.-.") || stripos($mensaje, "-..")||stripos($mensaje, ".")||stripos($mensaje, "..-.")||stripos($mensaje, "--.")||stripos($mensaje, "....")
        ||stripos($mensaje, "..")||stripos($mensaje, ".---")||stripos($mensaje, "-.-")||stripos($mensaje, ".-..")||stripos($mensaje, "--")||stripos($mensaje, "-.")||stripos($mensaje, "---")
        ||stripos($mensaje, ".--.")||stripos($mensaje, "--.-")||stripos($mensaje, ".-.")||stripos($mensaje, "...")||stripos($mensaje, "-")||stripos($mensaje, "..-")||stripos($mensaje, "...-")
        ||stripos($mensaje, ".--")||stripos($mensaje, "-..-")||stripos($mensaje, "-.--")||stripos($mensaje, "--..")||stripos($mensaje, ".----")||stripos($mensaje, "..---")
        ||stripos($mensaje, "...--")||stripos($mensaje, "....-")||stripos($mensaje, "-----")||stripos($mensaje, "-....")||stripos($mensaje, "--...")||stripos($mensaje, "---..")
        ||stripos($mensaje, "----.")||stripos($mensaje, "-----")||stripos($mensaje, "--..--")||stripos($mensaje, ".-.-.-")||stripos($mensaje, "..--..")||stripos($mensaje, "-.-.--")||stripos($mensaje, ".-..-."))
        {
            echo "<h1>Su mensaje a traducir es:</h1>";
            echo $mensaje."<br>";
            $traduccion=$mensaje;
            //pone un slash entre cada palabra
            $traduccion=str_replace("   ", " / ", $traduccion);
            //hace un arreglo con la cadena que contiene el mensaje
            $nuevomensaje=explode(" ", $traduccion);
            //recorre el arreglo de clave
            foreach($clave as $letra => $morse)
            {
                
                for($i=0; $i<count($nuevomensaje); $i++)
                {
                    //recorre el arreglo y si la localidad es igual a un caracter en morse pondrá el valor de su llave
                    if($nuevomensaje[$i]==$morse)
                    {
                        $nuevomensaje[$i]=$letra;
                    }    
                }
            }
            //convierte el arreglo en una cadena
            $nuevomensaje=implode($nuevomensaje);
            //pasa la cadena a mayúsculas.
            echo "<h1>Su traducción es:</h1>". strtoupper($nuevomensaje);

        }
        else
        {
            echo"No se pudo traducir su texto porque introdujo caracteres inválidos o está intentando traducir del Español al Morse";
        }
        echo "<br><br>";
        echo "<input type='button' onclick='history.back()' name='volver' value='Regresar'>";  
        break;
}    

?>
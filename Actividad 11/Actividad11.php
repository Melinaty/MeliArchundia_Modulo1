<?php
    //Validar que se seleccionó una respuesta
    $pregunta1=(isset($_POST["Taco"]) && $_POST["Taco"]!="") ? $_POST["Taco"]:"No especifico";
    $pregunta2=(isset($_POST["Taco1"]) && $_POST["Taco1"]!="") ? $_POST["Taco1"]:"No especifico";
    $pregunta3=(isset($_POST["Taco2"]) && $_POST["Taco2"]!="") ? $_POST["Taco2"]:"No especifico";
    $pregunta4=(isset($_POST["Taco3"]) && $_POST["Taco3"]!="") ? $_POST["Taco3"]:"No especifico";
    $pregunta5=(isset($_POST["Taco4"]) && $_POST["Taco4"]!="") ? $_POST["Taco4"]:"No especifico";
    $pregunta6=(isset($_POST["Taco5"]) && $_POST["Taco5"]!="") ? $_POST["Taco5"]:"No especifico";
    $pregunta7=(isset($_POST["Taco6"]) && $_POST["Taco6"]!="") ? $_POST["Taco6"]:"No especifico";
    $pregunta8=(isset($_POST["Taco7"]) && $_POST["Taco7"]!="") ? $_POST["Taco7"]:"No especifico";
    $pregunta9=(isset($_POST["Taco8"]) && $_POST["Taco8"]!="") ? $_POST["Taco8"]:"No especifico";
    $pregunta10=(isset($_POST["Taco9"]) && $_POST["Taco9"]!="") ? $_POST["Taco9"]:"No especifico";

    $respuestas= [ $pregunta1, $pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10];
    //ordena el arreglo alfabéticamente
    sort($respuestas);
    for($i=0; $i<9; $i++)
    {
        var_dump($respuestas[$i]);

    }
    //convierte el arreglo en una cadena
    $res_cad= implode("", $respuestas);
    //La primera vez que se menciona y la última 
    $iA=strpos($res_cad, "A");
    $fA=strrpos($res_cad, "A");
    //Nos da una cadena con la letra que le pedimos y lo convierte en un arreglo
    $cadA=substr($res_cad, $iA, $fA-$iA+1);
    
    //Repite lo anterior pero con las opciones B, C y D
    $iB=strpos($res_cad, "B");
    $fB=strrpos($res_cad, "B");
    $cadB=substr($res_cad, $iB, $fB-$iB+1);

    $iC=strpos($res_cad, "C");
    $fC=strrpos($res_cad, "C");
    $cadC=substr($res_cad, $iC, $fC-$iC+1);

    $iD=strpos($res_cad, "D");
    $fD=strrpos($res_cad, "D");
    $cadD=substr($res_cad, $iD, $fD-$iD+1);
    
    //nos da la longitud de la cadena solo funciona cuando al menos una opción es seleccionada más de una vez ;()
    $lon["as"]=strlen($cadA);
    $lon["bs"]=strlen($cadB);
    $lon["cs"]=strlen($cadC);
    $lon["ds"]=strlen($cadD);
    

    //comparar entre la longitud de cada cadena para saber que tipo de taco eres
    if($lon["as"]>$lon["bs"] && $lon["as"]>$lon["cs"] && $lon["as"]>$lon["ds"])
        echo "<h1>Eres un taco de Pastor<h1>";
        
    elseif($lon["bs"]>$lon["as"] && $lon["bs"]>$lon["cs"] && $lon["bs"]>$lon["ds"])
        echo "<h1>Eres un taco de Suadero<h1>";
        
    elseif($lon["cs"]>$lon["as"] && $lon["cs"]>$lon["bs"] && $lon["cs"]>$lon["ds"])
        echo "<h1>Eres un taco de Barbacoa<h1>";

    elseif($lon["ds"]>$lon["as"] && $lon["ds"]>$lon["bs"] && $lon["ds"]>$lon["cs"])
        echo "<h1>Eres un taco Lagunero<h1>"; 
        
    elseif($lon["as"]>$lon["cs"] && $lon["as"]>$lon["ds"] && $lon["as"]=$lon["bs"])
        echo "<h1>Eres un taco Campechano<h1>";

    elseif($lon["bs"]>$lon["as"] && $lon["bs"]>$lon["ds"] && $lon["bs"]=$lon["cs"])
        echo "<h1>Eres un taco de Carnitas<h1>";

    elseif($lon["cs"]>$lon["as"] && $lon["cs"]>$lon["bs"] && $lon["cs"]=$lon["ds"])
        echo "<h1>Eres un taco Bell<h1>";

    elseif($lon["as"]>$lon["bs"] && $lon["as"]>$lon["cs"] && $lon["as"]=$lon["ds"])
        echo "<h1>Eres un taco Light<h1>";

    elseif($lon["as"]>$lon["bs"] && $lon["as"]>$lon["ds"] && $lon["as"]=$lon["cs"])
        echo "<h1>Eres un taco Placero<h1>";
    
    elseif($lon["bs"]>$lon["as"] && $lon["bs"]>$lon["cs"] && $lon["bs"]=$lon["ds"])
        echo "<h1>Eres un taco de Mixiote<h1>";
    else
        echo "<h1>Eres un taco de sal<h1>"

?>
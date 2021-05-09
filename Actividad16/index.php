<?php

    session_name("Mel");
    session_start();

    if(isset($_POST["Nombre"]) || isset($_SESSION["Nombre"])) //si existe una sesión o ya enviaron el formulario
    {
        if(isset($_POST["Nombre"])){
          $_SESSION["Nombre"]=$_POST["Nombre"];
          $_SESSION["Apellido"]=$_POST["Apellido"];
          $_SESSION["Correo"]=$_POST["Correo"];
          $_SESSION["Fecha"]=$_POST["Fecha"];
          $_SESSION["Grupo"]=$_POST["Grupo"];

        }
       echo "<table border='1'>
            <thead>
                <tr>
                    <td colspan='2' align=center>Datos</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                     <td>Nombre:</td>
                     <td>".$_SESSION["Nombre"]."</td>
                </tr>
                <tr>
                     <td>Apellido:</td>
                     <td>".$_SESSION["Apellido"]."</td>
                </tr>
                <tr>
                     <td>Fecha de nacimiento:</td>
                     <td>".$_SESSION["Fecha"]."</td>
                </tr>
                <tr>
                     <td>Grupo:</td>
                     <td>".$_SESSION["Grupo"]."</td>
                </tr>
                <tr>
                    <td>Correo electrónico:</td>
                    <td>".$_SESSION["Correo"]."</td>
                </tr>
            </tbody>
       </table>
       <form action='./cerrar.php' method='POST'>
         <button type='submit' name='Cerrar' value='c'>Cerrar sesión</button>
       </form>";
    }
    else// si no hay te manda al form
    {
        header("location:./form.php");
    }
?>

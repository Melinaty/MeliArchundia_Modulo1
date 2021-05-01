<?php
echo "<table border='1' cellpadding='10'>
    <thead>
        <tr>
            <th colspan='4'><h1><strong>Solicitud de ingreso a la universidad<strong><h1></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align='center'>" .$_POST['ApellidoPaterno'] ."</td>
            <td align='center'>" .$_POST["ApellidoMaterno"] ."</td>
            <td align='center' colspan='2'>" .$_POST["Nombre"] ."</td>
        </tr>   
        <tr>
            <td align='center'><strong><u>Apellido Paterno</u></strong></td>
            <td align='center'><strong><u>Apellido Materno</u></strong></td>
            <td align='center' colspan='2'><strong><u>Nombre</u></strong></td>
        </tr>
        <tr>
            <td align='center'><strong><u>Sexo</u></strong></td>
            <td align='center'>" .$_POST['Sexo'] ."</td>
            <td align='center'><strong><u>Edad:</u></strong></td>
            <td align='center'>" .$_POST['Edad']."</td>
        </tr>
        <tr>
            <td align='center' colspan='2'>" .$_POST['Email']. "</td>
            <td align='center'>" .$_POST['Telefono'] ."</td>
            <td align='center'>" .$_POST['Celular'] ."</td>
        </tr>
        <tr>
            <td align='center' colspan='2'><strong><u>Correo electrónico</u></strong></td>
            <td align='center'><strong><u>Teléfono</u></strong></td>
            <td align='center'><strong><u>Celular</u></strong></td>
        </tr>
        <tr>
            <td align='center'><strong><u>Escuela de procedencia</u></strong></td>
            <td align='center'>" .$_POST['Escuela'] ."</td>
            <td align='center'><strong><u>Promedio</u></strong></td>
            <td align='center'>" .$_POST['Promedio'] ."</td>
        </tr>
        <tr>
            <td align='center' colspan='2'><strong><u>Primera opción</u></strong></td>
            <td align='center'colspan='2'>" .$_POST['Primeraopcion'] ."</td>
        </tr>
        <tr>
            <td align='center' colspan='2'><strong><u>Segunda opción</u></strong></td>
            <td align='center'colspan='2'>" .$_POST['Segundaopcion'] ."</td>
        </tr>
        
    </tbody>

    </table>";

?>
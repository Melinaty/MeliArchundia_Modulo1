<?php
    session_name("Mel");
    session_start();

    if(isset($_SESSION["Nombre"]))
    {
        header("location:./index.php");
    }
    else
    {
        echo "<form action='./index.php' method='POST'>
        <fieldset style='width: 700px;'>
            <legend>Inicio de sesión</legend>
            <label>Nombre:
                <input type='text' name='Nombre' required>
            </label>
            <br><br>
            <label>Apellido:
                <input type='text' name='Apellido' required>
            </label>
            <br><br>
            <label>Grupo:
                <input type='number' name='Grupo' required>
            </label>
            <br><br>
            <label>Fecha de nacimiento:
                <input type='date' name='Fecha' required>
            </label>
            <br><br>
            <label>Correo electrónico:
                <input type='email' name='Correo' required>
            </label>
            <br><br>
            <label>Contraseña:
                <input type='password' name='Contraseña' required>
            </label>
            <br><br>
            <button type='submit' name='Iniciar'>Inicar sesión</button>
        </fieldset>
    </form>";
    }

?>

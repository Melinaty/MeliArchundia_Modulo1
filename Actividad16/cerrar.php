<?php
  session_name("Mel");
  session_start();
  if(isset($_POST["Cerrar"]))
  {
    session_unset();
    session_destroy();
    header("location:./form.php");

  }
?>

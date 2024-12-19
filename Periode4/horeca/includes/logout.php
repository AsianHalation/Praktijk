<?php
    session_start(); //sessie start! belangrijk bij elke pagina

    //session beëindigen en een header terugsturen naar de homepage
    session_destroy();
    header('Location: ../website/index.php');
    exit(); //exit om te zorgen dat de script eindigt
?>
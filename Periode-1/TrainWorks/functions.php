<?php

if(isset($_POST['count'])){
    //pakt data uit formulier
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $leeftijd = $_POST['leeftijd'];
    $dagen = $_POST['dagen'];

    $result = ($num1 - $num2) * $dagen;
}
?>
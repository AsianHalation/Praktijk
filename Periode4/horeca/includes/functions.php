<?php

//functie om login te valideren
function logincheck($username, $password, $conn) {
    // Prepare en execute de SQL query om de inlognaam van de user tabel in de database op te halen
    $stmt = $conn->prepare("SELECT * FROM student WHERE inlognaam = :inlognaam AND wachtwoord = :password");
    $stmt->bindParam(':inlognaam', $username); //verbind variabele met de data die is gegeven
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    //statement om informatie op te slaan voor de sessie
    if ($stmt->rowCount() > 0) {
        $_SESSION["loggedin"] = true; //sessie variabele check log in naar true zetten
        $_SESSION["inlognaam"] = $username; //inlognaam opslaan in de sessie waarmee er is ingelogd
        return true;
    }
    return false;
}
?>
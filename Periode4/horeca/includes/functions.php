<?php

//functie om login te valideren
function logincheck($username, $password, $conn) {
    // Prepare en execute de SQL query om de inlognaam van de user tabel in de database op te halen
    $stmt = $conn->prepare("SELECT * FROM student WHERE inlognaam = :inlognaam AND wachtwoord = :password");
    $stmt->bindParam(':inlognaam', $username); //verbind variabele met de data in de database;
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

function insertDiner($conn, $titel, $omschrijving, $formatted_date, $starttijd, $eindtijd, $locatie) {
    // Create the INSERT query without sanitizing inputs
    $insert = "INSERT INTO diner (titel, omschrijving, datum, starttijd, eindtijd, locatie) 
            VALUES ('$titel', '$omschrijving', '$formatted_date', '$starttijd', '$eindtijd', '$locatie')";

    // Execute the query and return the result
    if ($conn->query($insert) === TRUE) {
        alert("New record created successfully.");
    } else {
        return "Error: " . $insert . "<br>" . $conn->error;
    }
}

function printResult($conn, $selectID) {
    $query = "SELECT * FROM diner WHERE dinerID = :dinerID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':dinerID', $selectID, PDO::PARAM_INT); // Use PDO::PARAM_INT for integers
    $stmt->execute();
    return $stmt;
}
?>
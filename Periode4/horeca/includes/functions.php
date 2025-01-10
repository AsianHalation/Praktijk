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


function insertDiner($conn, $titel, $omschrijving, $starttijd, $eindtijd, $locatie) {
    // Create the INSERT query without sanitizing inputs
    $insert = "INSERT INTO diner (titel, omschrijving, starttijd, eindtijd, locatie) 
            VALUES ('$titel', '$omschrijving', '$starttijd', '$eindtijd', '$locatie')";

    // Execute the query and return the result
    if ($conn->query($insert) === TRUE) {
        alert("New record created successfully.");
    } else {
        return "Error: " . $insert . "<br>" . $conn->error;
    }
}

if(isset($_POST["name"]) && isset($_POST["grade"]) && isset($_POST["marks"])){
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $marks = $_POST['marks'];
    $sql = "UPDATE results SET `name`= '$name', `class`= '$grade', `marks`= $marks  WHERE id= ".$_GET["id"];
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

function updateDiner($conn, $titel, $omschrijving, $starttijd, $eindtijd, $locatie) {
    $update = "UPDATE diner SET `titel`= '$titel', `omschrijving`= '$omschrijving', `startijd`= '$starttijd', `eindtijd`= '$eindtijd', `locatie`= '$locatie' WHERE dinerID= ". $_GET["dinerID"];

    if ($conn->query($update) === TRUE) {
        alert("Je hebt lekker gefixed");
    } else {
        echo "je hebt het lekket getweaked";
    }
}
?>
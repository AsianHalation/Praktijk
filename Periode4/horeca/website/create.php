<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    //zet hier de query om een nieuwe entry toe te voegen aan de database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nieuw_entry"])) {
        $titel = $_POST["titel"];
        $omschrijving = $_POST["omschrijving"];
        $omgekeerde_datum = $_POST['datum']; // Assuming 'datum' comes from your form
        $starttijd = $_POST["begintijd"]; // Change form field name to match 'startmoment'
        $eindtijd = $_POST["eindtijd"];  // Change form field name to match 'eindmoment'
        $locatie = $_POST["locatie"];
        
        $formatted_date = date('Y-m-d', strtotime($omgekeerde_datum)); // Format it as YYYY-MM-DD
    
        // Call the function to insert the data
        $result = insertDiner($conn, $titel, $omschrijving, $formatted_date, $starttijd, $eindtijd, $locatie);

    // If insertion is successful, display an alert
    if ($result) { // Assuming insertDiner() returns a truthy value on success
        echo "<script>alert('aangemaakt');</script>";
    } else {
        echo "<script>alert('sorry');</script>";
    }
    }
?>

<style>
    <?php
        include "../css/create.css"
    ?>
</style>

    <div class="main">
        <div class="container">
            <?php     if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == true) { ?>
            <form method="POST">  
                <label for="titel">Titel</label>
                <input type="text" name="titel">

                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving">

                <label for="datum">Datum</label>
                <input type="date" name="datum">

                <label for="begintijd">Begintijd</label>
                <input type="time" name="begintijd">

                <label for="eindtijd">Eindtijd</label>
                <input type="time" name="eindtijd">

                <label for="locatie">Locatie</label>
                <input type="text" name="locatie">

                <input type="submit" name="nieuw_entry" value="opslaan">
            </form>
            <?php } else {
                header("Location: ../website/index.php");
                } ?>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
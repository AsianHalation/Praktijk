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
        $starttijd = $_POST["begintijd"]; // Change form field name to match 'startmoment'
        $eindtijd = $_POST["eindtijd"];  // Change form field name to match 'eindmoment'
        $locatie = $_POST["locatie"];
    
        // Call the function to insert the data
        echo insertDiner($conn, $titel, $omschrijving, $starttijd, $eindtijd, $locatie);
    }

    if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == false) {
        header("Location: ../website/index.php");
    }
?>

<style>
    <?php
        include "../css/inlog.css"
    ?>
</style>

    <div class="main">
        <div class="container">
            <form method="POST">  
                <label for="titel">Titel</label>
                <input type="text" name="titel">

                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving">

                <label for="begintijd">Begintijd</label>
                <input type="time" name="begintijd">

                <label for="eindtijd">Eindtijd</label>
                <input type="time" name="eindtijd">

                <label for="locatie">Locatie</label>
                <input type="text" name="locatie">

                <input type="submit" name="nieuw_entry" value="opslaan">
            </form>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
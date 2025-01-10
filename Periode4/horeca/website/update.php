<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";
    //via GET methode de ID oppakken van de entry in de tabel
    require_once "../includes/db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_entry"])) {
        $titel = $_POST["titel"];
        $omschrijving = $_POST["omschrijving"];
        $starttijd = $_POST["begintijd"];
        $eindtijd = $_POST["eindtijd"];
        $locatie = $_POST["locatie"];
    
    }
?>

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

                <input type="submit" name="update_entry" value="opslaan">
            </form>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
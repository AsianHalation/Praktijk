<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";
    //via GET methode de ID oppakken van de entry in de tabel
    if (!isset($_GET["dinerID"])) {
        echo "<script>alert('Diner ID is missing');</script>";
        exit;
    }


    $result = printResult($conn, $_GET["dinerID"]);
    $row = $result->fetch();


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_entry"])) {
        $titel = $_POST["titel"];
        $omschrijving = $_POST["omschrijving"];
        $starttijd = $_POST["starttijd"];
        $eindtijd = $_POST["eindtijd"];
        $locatie = $_POST["locatie"];
        $dinerID = $_GET["dinerID"];

        $raw_date = $_POST['datum']; // Assuming 'datum' comes from your form
        $formatted_date = date('Y-m-d', strtotime($raw_date)); // Format it as YYYY-MM-DD

        $diner = updateDiner($conn, $titel, $omschrijving, $formatted_date, $starttijd, $eindtijd, $locatie);
        
        if ($diner) {
            echo "<script>alert('Interpolis glashelder');</script>";
        } else {
            echo "<script>alert('Bloons');</script>";
        }        
    }
?>
<style>
    <?php
        include "../css/inlog.css"
    ?>
</style>

    <div class="main">
        <div class="container">
        <form method="POST" action="update.php?dinerID=<?= $dinerID; ?>">  
                <label for="titel">Titel</label>
                <input type="text" name="titel" value="<?php echo $row["titel"] ?>">

                <label for="omschrijving">Omschrijving</label>
                <input type="text" name="omschrijving" value="<?php echo $row["omschrijving"] ?>">

                <label for="datum">Datum</label>
                <input type="date" name="datum" value="<?php echo $row["datum"] ?>">

                <label for="starttijd">Starttijd</label>
                <input type="time" name="starttijd" value="<?php echo $row["starttijd"] ?>">

                <label for="eindtijd">Eindtijd</label>
                <input type="time" name="eindtijd" value="<?php echo $row["eindtijd"] ?>">

                <label for="locatie">Locatie</label>
                <input type="text" name="locatie" value="<?php echo $row["locatie"] ?>">

                <input type="submit" name="update_entry" value="opslaan">
            </form>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
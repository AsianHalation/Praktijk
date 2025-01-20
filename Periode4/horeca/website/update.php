<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";
    //via GET methode de ID oppakken van de entry in de tabel

    if (isset($_GET["dinerID"])) {
        $result = printResult($conn, $_GET["dinerID"]);
        $row = $result->fetch(PDO::FETCH_ASSOC); // Fetch as an associative array
        if ($row) {
            // Process the row
        } else {
            echo "No diner found with the given ID.";
        }
    } else {
        echo "geen ID instantie";
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_entry"])) {
        //variabele aanmaken bij data uit de form
        $titel = $_POST["titel"];
        $omschrijving = $_POST["omschrijving"];
        $starttijd = $_POST["starttijd"];
        $eindtijd = $_POST["eindtijd"];
        $locatie = $_POST["locatie"];
    
        if (!isset($_GET["dinerID"]) || !is_numeric($_GET["dinerID"])) {
            die("Invalid diner ID");
        }
        $dinerID = (int) $_GET["dinerID"];
    
        $omgekeerde_datum = $_POST['datum'];
        if (!strtotime($omgekeerde_datum)) {
            die("Invalid date format");
        }
        $formatted_date = date('Y-m-d', strtotime($omgekeerde_datum));
    
        $sql = "UPDATE diner 
                SET titel = :titel,
                    omschrijving = :omschrijving,
                    datum = :datum, 
                    starttijd = :starttijd, 
                    eindtijd = :eindtijd, 
                    locatie = :locatie
                WHERE dinerID = :dinerID";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titel', $titel);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->bindParam(':datum', $formatted_date);
        $stmt->bindParam(':starttijd', $starttijd);
        $stmt->bindParam(':eindtijd', $eindtijd);
        $stmt->bindParam(':locatie', $locatie);
        $stmt->bindParam(':dinerID', $dinerID, PDO::PARAM_INT);
    
        $diner = $stmt->execute();
    
        if ($diner) {
            echo "<script>alert('Bewerking geslaagd'); window.location.href='../website/print.php';</script>";
        } else {
            echo "<script>alert('Foutmelding 404');</script>";
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
            <?php if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == true) { ?>
                <form method="POST">
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
            <?php } else {
                header("Location: ../website/index.php");
                }
                ?>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
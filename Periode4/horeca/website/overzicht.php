<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    if (isset($_GET["dinerID"])) {
        $result = printResult($conn, $_GET["dinerID"]);
        $row = $result->fetch(PDO::FETCH_ASSOC); //pak data uit een array
        if ($row) {
            //error maken voor debug
        } else {
            echo "geen ID gevonden";
        }
    } else {
        echo "geen ID instantie";
    }
?>

    <style>
        <?php include "../css/overzicht.css"; ?>
    </style>

    <div class="main">
        <div class="container">
            <div class="totale_content">
                <div class="content">
                    <h2>Wat gaan we kokkerellen</h2>
                    <p><?php echo $row['omschrijving']?></p>
                </div>

                <div class="content">
                    <h2>Wanneer is het?</h2>
                    <p>
                        <?php 
                        $originalDate = $row['datum']; 
                        echo DateTime::createFromFormat('Y-m-d', $originalDate)->format('d-m-Y'); 
                        ?>
                    </p>
                </div>

                <div class="content">
                    <h2>Tijdsslot</h2>
                    <div class="tijd">
                        <p>van <?php echo $row['starttijd']?> tot <?php echo $row['eindtijd']?></p>
                    </div>
                </div>

                <div class="content">
                    <h2>Waar is het?</h2>
                    <p><?php echo $row['locatie']?></p>
                </div>
            <div>

            <div class="foto">

            </div>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
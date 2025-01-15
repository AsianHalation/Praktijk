<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    if (isset($_GET["dinerID"])) {
        $result = printResult($conn, $_GET["dinerID"]);
        $row = $result->fetch(PDO::FETCH_ASSOC); // Fetch as an associative array
        if ($row) {
            // Process the row
        } else {
            echo "No diner found with the given ID.";
        }
    } else {
        echo "dinerID is not set.";
    }
?>

    <style>
        <?php include "../css/overzicht.css"; ?>
    </style>

    <div class="main">
        <div class="container">
            <div class="content">
                <h2>Wat gaan we kokkerellen</h2>
                <p><?php echo $row['omschrijving']?></p>
            </div>

            <div class="content">
                <h2>Wanneer is het?</h2>
                <p><?php echo $row['datum']?></p>
            </div>

            <div class="content">
                <h2>Tijdsslot</h2>
                <div class="tijd">
                    <p>van</p>
                </div>
            </div>

            <div class="content">
                <h2>Waar is het?</h2>
            </div>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
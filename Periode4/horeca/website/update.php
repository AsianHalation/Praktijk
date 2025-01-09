<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $updatequery = "update";
    }
    //via GET methode de ID oppakken van de entry in de tabel
?>

    <div class="main">
        <div class="container">
            <form method="GET">
                
            </form>
        </div>
    </div>

<?php
    include "../includes/footer.php";
?>
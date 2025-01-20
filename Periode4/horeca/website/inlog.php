<?php
    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    //Form check als de form is ingevuld
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["inlognaam"];
    $password = $_POST["wachtwoord"];

    // Valideer login
    if (logincheck($username, $password, $conn)) {
        //als er succesvol is ingelogd dan verwijst het naar de homepagina
        header("Locaton: ../website/index.php");
    } else {
        $jesse = "Jesse is aangekomen";
    }
}

if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == true) {
    header("Location: ../website/index.php");
    //conditie als er is ingelogd dat de user niet naar de inlogpagina terecht kan
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
                <label for="inlognaam">Gebruikersnaam</label>
                <input type="text" name="inlognaam">

                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord">

                <input type="submit" name="login" value="log in">
            </form>
            <?php
                    if (!empty($jesse)) {
                        echo "<p style='color: red;'>$jesse</p>";
                    }
            ?>
    </div>
</div>

<?php
    include "../includes/footer.php";
?>
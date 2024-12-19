<?php
    session_start();
    include "../includes/db.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    if 
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

                <input type="submit" name="login" value="tweaking">
            </form>
    </div>
</div>

<?php
    include "../includes/footer.php";
?>
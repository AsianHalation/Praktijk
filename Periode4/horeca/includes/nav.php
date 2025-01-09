<main>
    <div class="navigation">
        <nav>
            <h2>Jesse</h2>
            <?php
                //hier print andere links als er is ingelogd, overzicht om te wijzigen en uitloggen etc.
                if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == true) {
                    echo "<a href='../website/index.php'>Home</a>";
                    echo "<a href='../website/print.php'>Planning</a>";
                    echo "<a href='../website/create.php'>Planning aanmaken</a>";
                    echo "<a href='../includes/logout.php'>Afmelden</a>";
                } else {
                    echo "<a href='../website/index.php'>Home</a>";
                    echo "<a href='../website/inlog.php'>Log In</a>";
                }
            ?>
        </nav>
    </div>
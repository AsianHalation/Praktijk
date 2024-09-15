<?php
        include "functions.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Training Center</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="img/logo.png"></img>
            </div>
            <nav>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="rekenmachine.php">Rekenmachine</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <form method="POST" action="rekenmachine.php">
            <legend>Bereken hier je eetpatroon</legend>

            <label for="leeftijd">Wat is uw leeftijd?</label>
            <input type="number" name="leeftijd">

            <label for="num1">Dagelijkse inname in Kcal</label>
            <input type="number" class="num" name="num1">

            <label for="dagen">Voor hoeveel dagen wil je bereken?</label>
            <input type="number" name="dagen">

            <label for="num2">Dagelijkse verbranding in Kcal</label>
            <input type="text" class="num" name="num2">

            <input type="submit" name=count value="bereken!">

        </form>
            
            <?php
                if (isset($_POST['count'])) {
                    echo   "<p>{$result} is uw totale inname over {$dagen} dagen.</p>
                            <br>";
                    if ($result < (2000 * $dagen)) {
                        echo "<p>Jij bent gezond bezig</p>";
                    } else {
                        echo "<p>Jij bent eet meer dan het dan het gemiddelde</p>";
                    }
                }
            ?>
    </main>
</body>
</html>
<?php
    if (isset($_POST['count'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1-$num2;
}

        include "nav.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Training Center</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
 


    <main>
        <form method="POST">
            <legend>Hoe ongezond ben jij?</legend>

            <label for="leeftijd">Wat is uw leeftijd?</label>
            <input type="text" name="leeftijd">

            <label for="num1">Dagelijkse inname</label>
            <input type="text" class="num" name="num1">

            <label for="num2">Dagelijkse verbranding</label>
            <input type="text" class="num" name="num2">

            <input type="submit" name=count value="bereken!">

            </form>
            
            <?php
                if (isset($_POST['count'])) {
                    echo $result . "<p>Dagelijkse inname</p>";
                    if ($result < 2000) {
                        echo "<img src='chad.jpg'>";
                    } else {
                        echo "<img src='wojak.jpg'>";
                    }
                }
            ?>
    </main>
</body>
</html>
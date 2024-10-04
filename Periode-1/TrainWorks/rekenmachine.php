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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="rekenmachine.php">Rekenmachine</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <form method="post" action="rekenmachine.php">
            <input type="text" name="num1" placeholder="Enter number 1" required>
            <select name="operator">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="text" name="num2" placeholder="Enter number 2" required>
            <br>
            <input type="submit" name="count" value="Calculate">
        </form>

        <?php
            echo "<h2>Result: $result</h2>";
        ?>
    </main>
</html>
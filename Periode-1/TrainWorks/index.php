

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Training Center</title>
    <link rel="stylesheet" href="sport.css">
</head>
<body>
    <?php
        if (isset($_POST['count'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $_POST['result'];
                $result = $num1-$num2;
        }
    ?>

    <div class="navbar">
        <a img src=".."></a>
        <a href="https://trainstation073.nl/">homepage</a>
        <a href="xx">rekenmachine</a>
    <div>



    <main>
        <form method="POST">
            <legend>Hoe ongezond ben jij?</legend>

            <label for="leeftijd">Wat is uw leeftijd?</label>
            <input type="text" name="leeftijd">

            <label for="num1">Dagelijkse inname</label>
            <input type="text" class="num" name="num1">

            <label for="num2">Dagelijkse verbranding</label>
            <input type="text" class="num" name="num2">

            <input type="submit" name= value="bereken!">
        </form>
    </main>
</body>
</html>
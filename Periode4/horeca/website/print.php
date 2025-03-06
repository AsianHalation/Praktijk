<?php

    session_start();
    include "../includes/db.php";
    include "../includes/functions.php";
    include "../includes/header.php";
    include "../includes/nav.php";
    include "../includes/zoek.js";

    //links in zetten in elke entry zodat het wordt gelinkt naar de bijhorende pagina'
    //zet hier de query voor elke functionaliteit = Create, Read, Update, Delete
?>

<style>
    <?php include "../css/print.css" ?>
</style>

<div class="main">
    <div class="container">
            <?php
                //conditie als er is ingelogd + juiste username
                if (isset($_SESSION["inlognaam"]) && $_SESSION["loggedin"] == true) {
                    echo "<h2>Beste , {$_SESSION['inlognaam']}!</h2>";
                
                    $query = "SELECT * FROM diner WHERE dinerID <> 'locatie' ";
                    $result = $conn->query($query);
                    
                    ?>
                        <input type="text" id="zoekbalk" placeholder="Search..." onkeyup="filterTable()">
                    <?php

                    echo "<table id='dinerTable'>";
                        echo "<thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titel</th>
                                    <th>omschrijving</th>
                                    <th>Datum</th>
                                    <th>Starttijd</th>
                                    <th>Eindtijd</th>
                                    <th>Locatie</th>
                                    <th>Actie</th>
                                </tr>
                            </thead>";
                    
                        echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row["dinerID"] . "</td>";
                                echo "<td>" . $row["titel"] . "</td>";
                                echo "<td>" . $row["omschrijving"] . "</td>";
                                echo "<td>" . $row["datum"] . "</td>";
                                echo "<td>" . $row["starttijd"] . "</td>";
                                echo "<td>" . $row["eindtijd"] . "</td>";
                                echo "<td>" . $row["locatie"] . "</td>";
                                echo '<td>
                                    <a class="btn_update" href="../website/update.php?dinerID=' . $row['dinerID'] . '">Edit</a>
                                    <a class="btn_delete" href="../includes/delete.php?dinerID=' . $row['dinerID'] . '">Delete</a>
                                </td>';
                                echo "</tr>";
                            }
                        echo "</tbody>";
                    echo "</table>";

                    } else {
                        // Als er niet is ingelogd stuur het terug naar homepagina
                        header("Location: ../website/index.php");
                    }
            ?>
    </div>
</div>

<?php
    include "../includes/footer.php";
?>

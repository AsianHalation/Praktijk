<?php
    session_start();
    include "../includes/db.php";
    include "../includes/header.php";
    include "../includes/nav.php";

    $query = "SELECT * FROM diner WHERE dinerID <> 'titel'";
    $result = $conn->query($query);
?>

<style>
    <?php
        include "../css/homepage.css";
    ?>
</style>

<div class="main">
            
<!--Plan voor een foreach table met elke container een titel van de planning
als je erop klikt verwijst het naar een nieuwe pagina in de main container met alle inhoud -->
    <div class="container">
        <h2>Planning</h2> <!-- Add a title header -->
        <table>
            <tbody>
                <?php
                while ($row = $result->fetch()) {
                    echo '<tr onclick="window.location.href=\'../website/overzicht.php?dinerID=' . $row['dinerID'] . '\'">';
                    echo '<td>' . $row["titel"] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include "../includes/footer.php";
?>
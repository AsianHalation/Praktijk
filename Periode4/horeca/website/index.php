<?php
    session_start();
    include "../includes/db.php";
    include "../includes/header.php";
    include "../includes/nav.php";
?>

<style>
    <?php
        include "../css/homepage.css";
    ?>
</style>

<div class="main">
    <div class="container">
            
<!--Plan voor een foreach table met elke container een titel van de planning
als je erop klikt verwijst het naar een nieuwe pagina in de main container met alle inhoud -->
<?php
    $query = "SELECT * FROM diner WHERE dinerID <> 'titel'";
    $result = $conn->query($query);
    
    echo "<table>";
            echo "<tbody>";
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo '<td><a href="../website/overzicht.php?dinerID=' . $row['dinerID'] . '">' . $row["titel"] . '</a></td>';
                    echo "</tr>";
                }
            echo "</tbody>";
    echo "</table>";
?>

    </div>
</div>

<?php
    include "../includes/footer.php";
?>
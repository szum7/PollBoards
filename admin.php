<?php
header("Content-Type: text/html; charset=utf-8");
require_once 'class/functions.php';
require_once 'db.php';
session_start();
/*if(isset($_SESSION["user"]) && ($_SESSION["user"]->getUid() == 1 || $_SESSION["user"]->getUid() == 2)){
    
}else{
    header("Location:index.php");
}*/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>ADMIN</title>
        <style>
            body
            {
                background-color:black;
                font-family:"Lucida Console"; 
                font-size:9.5pt;
                color:green; 
                font-weight:bold;
            }
        </style>
    </head>
    <body>
        <?php
        $dbname = "pb_www";

        $tables = Array();
        $fields = Array();

        /* TABLES */
        $query = "SHOW TABLES FROM " . $dbname . ";";
        $result = mysqli_query($connection_id, $query) or die("Rossz lekérdezés " . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($tables, $row["Tables_in_" . $dbname]);
            }
        }

        /* FIELDS */
        for ($i = 0; $i < count($tables); $i++) {
            $query = "
                SHOW columns
                FROM " . $tables[$i] . ";";
            $result = mysqli_query($connection_id, $query) or die("Rossz lekérdezés " . $query);
            if (mysqli_num_rows($result) > 0) {
                $fields[$tables[$i]] = Array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($fields[$tables[$i]], $row["Field"]);
                }
            }
        }

        /* SOUT */
        for ($i = 0; $i < count($tables); $i++) {
            $query = "
                SELECT *
                FROM " . $tables[$i] . ";";
            $result = mysqli_query($connection_id, $query) or die("Rossz lekérdezés " . $query);
            if (mysqli_num_rows($result) > 0) {

                echo "<table border='1'>";
                echo "<tr>";
                echo "<td colspan='" . count($fields[$tables[$i]]) . "'><b>" . $tables[$i] . "</b></td>";
                echo "</tr>";
                echo "<tr>";
                for ($j = 0; $j < count($fields[$tables[$i]]); $j++) {
                    echo "<td>" . $fields[$tables[$i]][$j] . "</td>";
                }
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    for ($j = 0; $j < count($fields[$tables[$i]]); $j++) {
                        echo "<td>" . $row[$fields[$tables[$i]][$j]] . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </body>
</html>

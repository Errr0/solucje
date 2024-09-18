<?php
    $conn = mysqli_connect("localhost", "root", "", "serwisy");
    if(isset($_GET['szukaj'])){
        $hasConditions = false;
        $sql = "SELECT `id`, `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja` FROM `solucje`";
        if(isset($_GET['rodzaj']) && $_GET['rodzaj'] != "0"){
            $sql .= " WHERE `rodzaj`='".$_GET['rodzaj']."'";
            $hasConditions = true;
        }
        if(isset($_GET['model']) && $_GET['model']!="0"){
            if($hasConditions){
                $sql .= " AND";
            } else {
                $sql .= " WHERE";
            }
            $sql .= " `model`='".$_GET['model']."'";
            $hasConditions = true;
        }
        if(isset($_GET['kod']) && $_GET['kod']!="0"){
            if($hasConditions){
                $sql .= " AND";
            } else {
                $sql .= " WHERE";
            }
            $sql .= " `kod_bledu`='".$_GET['kod']."'";
        }
    } else{
        $sql = "SELECT `id`, `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja` FROM `solucje` WHERE 1";
    }
    //echo "$sql";
    $result = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");

    $sql = "SELECT DISTINCT `rodzaj` FROM `solucje` WHERE 1";
    $resultRodzaje = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");
    $sql = "SELECT DISTINCT `model` FROM `solucje` WHERE 1";
    $resultModele = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");
    $sql = "SELECT DISTINCT `kod_bledu` FROM `solucje` WHERE 1";
    $resultKody = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Solucje</title>
    <style>
        td{
            text-align: center;
            width:10%;
        }
        img{
            width:100%;
        }
    </style>
</head>
<body>
<form>
            <?php 
////////////////////////////////////////////////////////////////////////////////////////
                echo " Rodzaj:";
                echo "<select name = \"rodzaj\">";
                echo "<option value=\"0\"> </option>";
                while($row = mysqli_fetch_array($resultRodzaje)){
                    $nazwa = $row['rodzaj'];
                    echo "<option value=\"$nazwa\">$nazwa</option>";
                } 
                echo "</select>";
////////////////////////////////////////////////////////////////////////////////////////
                echo " Model:";
                echo "<select name = \"model\">";
                echo "<option value=\"0\"> </option>";
                $id = 0;
                while($row = mysqli_fetch_array($resultModele)){
                    $nazwa = $row['model'];
                    echo "<option value=\"$nazwa\">$nazwa</option>";
                } 
                echo "</select>";
////////////////////////////////////////////////////////////////////////////////////////
                echo " Kod Błędu:";
                echo "<select name = \"kod\">";
                echo "<option value=\"0\"> </option>";
                while($row = mysqli_fetch_array($resultKody)){
                    $nazwa = $row['kod_bledu'];
                    echo "<option value=\"$nazwa\">$nazwa</option>";
                } 
                echo "</select>";
////////////////////////////////////////////////////////////////////////////////////////
            ?>
        
    <button name = "szukaj">Szukaj</button><br/> 
</form>
<form action = "add.php" >
    <button name = "dodaj">Dodaj nową solucje</button><br/>  
</form>



<table border = 1>
<tr>
    <th>Edytuj</th>
    <th>Rodzaj</th>
    <th>Model</th>
    <th>Kod Błędu</th>
    <th>Opis</th>
    <th>solucja</th>
    <th>Zdjęcia</th>
</tr>
<?php
    while($row = mysqli_fetch_array($result)) {
        $rodzaj = $row['rodzaj'];
        $model = $row['model'];
        $kod = $row['kod_bledu'];
        $opis = $row['opis'];
        $solucja = $row['solucja'];
    echo "<tr>";
    echo "<td>  <form action = \"edit.php\" >  <button name = \"edytuj\", value = \"".$row['id']."\">Edytuj</button>  </form>  </td>";
    echo "<td>$rodzaj</td>";
    echo "<td>$model</td>";
    echo "<td>$kod</td>";
    echo "<td>$opis</td>";
    echo "<td>$solucja</td>";
    //echo "<td><img src = \"$zdjecia\"></td>";
    echo "</tr>";
}
?>
</body>
</html>
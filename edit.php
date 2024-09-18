<?php
$conn = mysqli_connect("localhost", "root", "", "serwisy");

if(isset($_GET['edytuj'])){
    $id = $_GET['edytuj'];
    $sql = "SELECT `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja` FROM `solucje` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $rodzaj = $_GET['rodzaj'];
    $model = $_GET['model'];
    $kod_bledu = $_GET['kod_bledu'];
    $opis = $_GET['opis'];
    $solucja = $_GET['solucja'];
    $sql = "UPDATE `solucje` SET `rodzaj` = '$rodzaj', `model` = '$model', `kod_bledu` ='$kod_bledu', `opis` = \"$opis\", `solucja` =  \"$solucja\" WHERE `id` = $id";
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header('location: index.php');
    }  
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    if(isset($_GET['rly'])){
        $sql = "DELETE FROM `solucje` WHERE `id` = $id";
        if(mysqli_query($conn, $sql)){
            header('location: index.php');
        }  
    } else{
        echo "Zaznacz checkboxa jeśli na pewno chcesz usunąć rekord";
        $sql = "SELECT `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja` FROM `solucje` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql) or die("Błąd połączenia z bazą");
    }
}
if(isset($_GET['anuluj'])){
    header('location: index.php');
}  
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj</title>
</head>
<body>
<form>
    <?php
        while($row = mysqli_fetch_array($result)) {
            $rodzaj = $row['rodzaj'];
            $model = $row['model'];
            $kod = $row['kod_bledu'];
            $opis = $row['opis'];
            $solucja = $row['solucja'];
            echo "<input type = \"text\" name = \"rodzaj\" placeholder=\"Rodzaj\" value = \"$rodzaj\">";
            echo "<input type = \"text\" name = \"model\" placeholder=\"Model\" value = \"$model\">";
            echo "<input type = \"text\" name = \"kod_bledu\" placeholder=\"Kod Błędu\" value = \"$kod\">";
            echo "<input type = \"text\" name = \"opis\" placeholder=\"Opis\" value = \"$opis\">";
            echo "<input type = \"text\" name = \"solucja\" placeholder=\"Solucja\" value = \"$solucja\">";
            echo "<button name = \"edit\" value = \"$id\" >Dodaj</button><br/>";
            echo "<button name = \"anuluj\">Anuluj</button><br/>";
            echo "<label> Na pewno? <input type = \"checkbox\" name=\"rly\" value = \"true\" > </label>";
            echo "<button name = \"delete\" value = \"$id\" >Usuń</button><br/>";
        }
    ?>
</form>
</body>
</html>
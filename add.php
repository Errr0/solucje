<?php
$conn = mysqli_connect("localhost", "root", "", "serwisy");

if(isset($_GET['add'])){
    $rodzaj = $_GET['rodzaj'];
    $model = $_GET['model'];
    $kod_bledu = $_GET['kod_bledu'];
    $opis = $_GET['opis'];
    $solucja = $_GET['solucja'];
    $sql = "INSERT INTO `solucje` (`id`, `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja`) VALUES (NULL, '$rodzaj', '$model', '$kod_bledu', \"$opis\", \"$solucja\")";
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header('location: index.php');
    }  
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj</title>
</head>
<body>
<form>
    <input type = "text" name = "rodzaj" placeholder="Rodzaj">
    <input type = "text" name = "model" placeholder="Model">
    <input type = "text" name = "kod_bledu" placeholder="Kod Błędu">
    <input type = "text" name = "opis" placeholder="Opis">
    <input type = "text" name = "solucja" placeholder="Solucja">
    <button name = "add">Dodaj</button><br/> 
</form>
</body>
</html>
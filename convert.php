<?php
include "konekcija.php";
    $sql = "SELECT * FROM `kurs` WHERE `id`='500'";
    $eur;
    $vrijednost;
    $result = $konekcija->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $eur = $row['eur'];
            $vrijednost = $row['vrijednost'];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="sidebar">
        <div class="upper">
            <div class="hamburger">
                <img src="./images/menu.png" class="img">
            </div>
            <a class="menu" href="dashboardUser.php">
                <img src="./images/123.png">
                <div class="text">Dashboard</div>
            </a>
            <a class="menu" href="convert.php">
                <img src="./images/123.png">
                <div class="text">Convert money</div>
            </a>
            <a class="menu" href="exhange.php?kurs=eur">
                <img src="./images/123.png">
                <div class="text">Manage Exchange Rates</div>
            </a>
        </div>
        <a class="logout" href="login.php">
            <img src="./images/logout.png" alt="">
            <span>
                Logout
            </span>
        </a>
    </div>
    <div class="header">
        <h1>DOBRO DOSAO DA ZAMIJENIS VALUTE </h1>
    </div>

    <div class="content">
        TRENUTNI KURS <?php echo $eur?> JE <?php echo $vrijednost?>
        <input type="text" id="money">
    </div>
</body>
</html>
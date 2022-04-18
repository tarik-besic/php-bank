<?php
include "konekcija.php";
    $sql = "SELECT * FROM `users` WHERE `id`='500'";
    $id;
    $ime;
    $email;
    $money;
    $result = $konekcija->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $ime = $row['ime'];
            $email = $row['email'];
            $money = $row['novac'];
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user/dashboard.css">
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
        <h1>DOBRO DOSAO <?php echo $name;?> </h1>
    </div>

    <div class="container">
        <div class="card">
            Trenutno imas <?php echo $money?> KM;
            <!-- slikica neka -->
        </div>
    </div>
</body>
</html>
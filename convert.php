<?php
include "konekcija.php";
$sql = "SELECT * FROM `kurs`";
$eur;
$vrijednost;
$result = $konekcija->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eur = $row['eur'];
        $vrijednost = $row['vrijednost'];
    }
}

$sql2 = "SELECT * FROM `users` WHERE `id`='40'";
$id;
$ime;
$email;
$money;
$result2 = $konekcija->query($sql2);
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $id = $row['id'];
        $ime = $row['ime'];
        $email = $row['email'];
        $money = $row['novac'];
    }
}

if (isset($_POST['val'])) {

    
    $userval=$_POST['val'];

    if($userval*$vrijednost > $money)
    echo "ne moze";
    else
    echo "MOZE";
    
    if ($result) {
        echo true;
        // header('Refresh: 3; URL=http://localhost/wp1/proj/view.php');
    } else {
        echo false;
    }
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
        <h1>DOBRO DOSAO DA ZMIJENIS VALUTE </h1>
    </div>

    <div class="drugiContainer">
        <h1 >Trenutno imas <?php echo $money ?> KM;</h1>
        <h2>
            TRENUTNI KURS €EUR u KM je : <?php echo $vrijednost ?>
        </h2>

        <div class="forma">
            Unesi koliko zelis kupiti eura
            <input type="text" id="kupit">
            <div class="btn">Kupi</div>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(".hamburger").click(() => {
        const sidebar = $(".sidebar");
        if (sidebar.hasClass("opened")) {
            sidebar.removeClass("opened");
        } else
            sidebar.addClass("opened");

    })
    $(".btn").click(() => {
        const val=$("#kupit").val();

        $.ajax({
            url: "",
            method: "post",
            data: {
                val
            },
            success: (data) => {
                if (data) {
                    console.log("da",data)
                    
                } else
                    console.log("ne",data)

            }
        })

    })
</script>

</html>
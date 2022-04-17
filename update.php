<?php

include "konekcija.php";

//ako updejtamo radimo ovo
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $ime = $_POST['name'];
    $email = $_POST['email'];
    $money = $_POST['money'];
    $sql = "UPDATE `users` SET `ime` = '$ime', `email` = '$email', `novac` = '$money' WHERE `users`.`id` = $id;";
    $result = $konekcija->query($sql);
    if ($result) {
        echo true;
        // header('Refresh: 3; URL=http://localhost/wp1/proj/view.php');
    } else {
        echo false;
    }
}
//a ako selektamo ID KORISNIKA UZIMAMO OVO
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$id'";
    $result = $konekcija->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $ime = $row['ime'];
            $email = $row['email'];
            $money = $row['novac'];
        }
?>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin/update.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="upper">
            <div class="hamburger">
                <img src="./images/menu.png" class="img">
            </div>
            <a class="menu" href="dashboard.php">
                <img src="./images/123.png">
                <div class="text">Dashboard</div>
            </a>
            <a class="menu" href="">
                <img src="./images/123.png">
                <div class="text">Transactions</div>
            </a>
            <a class="menu" href="exhange.php">
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
        <div class="text">
            <h1>Izmjena korisnika</h1>
        </div>
    </div>
    <div class="content">
        <input type="hidden" id="id" value="<?php echo $id; ?>">
        <div class="ime">
            <span class="tekst">
                Ime
            </span>
            <input type="text" id="ime" value="<?php echo $ime; ?>">
        </div>
        <div class="email">
            <span class="tekst">
                Email:
            </span>
            <input type="text" id="email" value="<?php echo $email; ?>">
        </div>
        <div class="money">
            <span class="tekst">
                Novac:
            </span>
            <input type="text" id="money" value="<?php echo $money; ?>">
        </div>
        <button id="submit">Izmjeni</button>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $("#submit").click(() => {
        const data = {
            id: $("#id").val(),
            name: $("#ime").val(),
            email: $("#email").val(),
            money: $("#money").val(),
        }
        console.log(data);
        if (data.id == "" || data.name == "" || data.email == "" || data.money == "") {
            alert("molim te unesi sve podatke");
            return;
        }

        $.ajax({
            url: "update.php",
            method: "post",
            data: data,
            success: (data) => {
                console.log(data);
                if (data) {
                    alert("Uspjesno ste izmjenili korisnika")
                    window.location = "dashboard.php"
                } else
                    alert("Problem prilikom izmjene korisnika")

            }
        })
        // $.ajax({
        //     url: "update.php",
        //     method: "post",
        //     data: data,
        //     success: (data) => {
        //         console.log(data,"RADi");
        //     }
        // })
    })
</script>
<script>
    $(".hamburger").click(() => {
        const sidebar = $(".sidebar");
        if (sidebar.hasClass("opened")) {
            sidebar.removeClass("opened");
        } else
            sidebar.addClass("opened");

    })
</script>

</html>
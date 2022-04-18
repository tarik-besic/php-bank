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


    $userval = $_POST['val'];
    $newmoney = (float) $userval * (float) $vrijednost;
    // echo $newmoney. "-". $money;
    if ($newmoney < $money) {

        $usermoney = (float)$money - (float)$newmoney;

        $sql3 = "UPDATE `users` SET `novac` = '$usermoney' WHERE `users`.`id` = 40;";

        $sql4 = "INSERT INTO `transactions` (`id`, `username`, `currency`, `value`, `bought`) VALUES (NULL, '$ime', '$eur', '$vrijednost', '$userval');";

        $result4 = $konekcija->query($sql4);

        $result3 = $konekcija->query($sql3);
        //    echo "GHHLAVNO". $result3;
    };
}

if (isset($_POST['trans'])) {

    $userval = $_POST['val'];

        $sql4 = "INSERT INTO `transactions` (`id`, `username`, `currency`, `value`, `bought`) VALUES (NULL, '$ime', '$eur', '$vrijednost', '$userval');";

        $result4 = $konekcija->query($sql4);
        echo $result4;
       
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
            <a class="menu" href="transactionsUser.php">
                <img src="./images/123.png">
                <div class="text">View your transactions</div>
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

    <div class="drugiContainer">
    <input type="hidden" id="moneyHas" value="<?php echo $money; ?>">
        <h1>Trenutno imas <?php echo $money ?> KM;</h1>
        <h2>
            <input type="hidden" id="vrijednost" value="<?php echo $vrijednost; ?>">
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
        const val = $("#kupit").val();
        const vrijednost = $("#vrijednost").val();
        const moneyy = $("#moneyHas").val();
        console.log(val,vrijednost);
        if(val*vrijednost> moneyy || !Number(val))
        {
            alert("Nemate dovoljno sredstava da izvrsite transkaciju")
            return;
        }

        $.ajax({
            url: "convert.php",
            method: "post",
            data: {
                val
            },
            success: (data) => {
             alert(`Uspjesno ste kupili ${val} Eura`)
             window.location="convert.php";
            }
        })

    })
</script>

</html>
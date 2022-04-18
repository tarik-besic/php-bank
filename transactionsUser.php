<?php
include "konekcija.php";
$sql = "SELECT * FROM `transactions` WHERE transactions.username='tarik besic';";
$result = $konekcija->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user/transactions.css">
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
        <h1>Lista Tvojih Transakcija </h1>
    </div>
    <div class="content">
        <div class="content">
            <div class="table-container">
                <div class="row">
                    <h1>lista korisnika</h1>

                </div>
                <div class="table">
                    <div class="row header">
                        <div class="cell header">id</div>
                        <div class="cell header">ime</div>
                        <div class="cell header">valuta</div>
                        <div class="cell header">kurs</div>
                        <div class="cell header">kolicina</div>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="row">
                                <div class="cell "><?php echo $row['id']; ?> </div>
                                <div class="cell "><?php echo $row['username']; ?> </div>
                                <div class="cell "><?php echo $row['currency']; ?> </div>
                                <div class="cell "><?php echo $row['value']; ?> </div>
                                <div class="cell "><?php echo $row['bought']; ?> </div>
                            </div>
                    <?php       }
                    }
                    ?>
                </div>
            </div>
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
</script>

</html>
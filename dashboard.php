<!DOCTYPE html>
<html lang="en">
<?php
include "konekcija.php";
$sql = "SELECT * FROM users";
$result = $konekcija->query($sql);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin/dashboard.css">
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
            <a class="menu">
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
        <h1>BANKING SYSTEM</h1>
    </div>
    <div class="content">
        <div class="table-container">
            <h1>lista korisnika</h1>
            <div class="table">
                <div class="row header">
                    <div class="cell header">id</div>
                    <div class="cell header">ime</div>
                    <div class="cell header">email</div>
                    <div class="cell header">novac</div>
                    <div class="cell header">brisanje</div>
                    <div class="cell header">uređivanje</div>
                </div>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="row">
                            <div class="cell "><?php echo $row['id']; ?> </div>
                            <div class="cell "><?php echo $row['ime']; ?> </div>
                            <div class="cell "><?php echo $row['email']; ?> </div>
                            <div class="cell "><?php echo $row['novac']; ?> </div>
                            <div class="cell ">
                                <a class="action" href="update.php?id=<?php echo $row['id']; ?>"> Izmjeni </a>
                            </div>
                            <div class="cell ">
                                <button class="action" onclick="klik(<?php echo $row['id']; ?>)">Brisanje</button>
                            </div>

                        </div>
                <?php       }
                }
                ?>
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
    const klik = (id) => {

        $.ajax({
            url: "delete.php",
            method: "post",
            data: {
                id
            },
            success: (data) => {
                console.log(data);
                if (data) {
                    alert("Uspjesno ste obrisali korisnika")
                    window.location = "dashboard.php"
                } else
                    alert("Problem prilikom brisanja korisnika")

            }
        })

    }
</script>

</html>
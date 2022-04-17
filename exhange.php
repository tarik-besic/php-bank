<!DOCTYPE html>
<html lang="en">
<?php
include "konekcija.php";
if (isset($_POST['data'])) {
    $data = $_POST['data'];

    $sql = "UPDATE `kurs` SET `vrijednost` = '$data' WHERE `kurs`.`eur` = eur;";
    $result = $konekcija->query($sql);
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin/exhange.css">
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
            <a class="menu" href="">
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
            <h1>KURSNA LISTA</h1>
        </div>
    </div>

    <div class="content">
        <div class="euro">

            1 EUR
            <h4>je</h4>
            <span>
                <?php
                $eur;
                include "konekcija.php";
                if (isset($_GET['kurs'])) {
                    $sql = "SELECT * FROM `kurs` WHERE `eur`='eur'";
                    $result = $konekcija->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                           $eur=$row['vrijednost'];
                        }
                      } else {
                        echo "0 results";
                      }
                    
                }
                
                ?>
                BAM
                <input type="text" id="money" value="<?php echo $eur; ?>">
            </span>
            <div id="add">Sacuvaj</div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $("#add").click(() => {
        const data = $("#money").val();
        $.ajax({
            url: "exhange.php",
            method: "post",
            data: {
                data
            },
            success: (data) => {
                console.log(data);
                if (data) {
                    console.log(data)
                    alert("Uspjesno ste izmjenili kursnu listu")
                } else
                    alert("Problem prilikom izmjene kursne liste")

            }
        })
    })
</script>

</html>
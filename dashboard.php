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
        <div class="hamburger">
            <img src="./images/menu.png" class="img">
        </div>

        <div class="menu">
            <img src="./images/123.png">
            <div class="text">Manage Users</div>
        </div>
        <div class="menu">
            <img src="./images/123.png">
            <div class="text">Manage Users</div>
        </div>
        <div class="menu">
            <img src="./images/123.png">
            <div class="text">Manage Users</div>
        </div>
    </div>
    <div class="header">
        <h1>BANKING SYSTEM</h1>
    </div>
    <div class="content">
        <div class="table-container">
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
                                <a class="action" href="delete.php?id=<?php echo $row['id']; ?>">Brisanje</a>
                            </div>

                        </div>
                <?php       }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
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
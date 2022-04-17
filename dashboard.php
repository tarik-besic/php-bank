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
            <div class="row">
                <h1>lista korisnika</h1>
                <div class="add">
                    <div class="modalcontainer">
                        <details>
                            <summary>
                                <div class="mbutton">
                                    Dodaj korisnika
                                    <!-- <img src="./images/add.png"> -->
                                </div>
                                <div class="details-modal-overlay"></div>
                            </summary>
                            <div class="details-modal">
                                <div class="details-modal-close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
                                    </svg>
                                </div>
                                <div class="details-modal-title">
                                    <h1>Add a new user</h1>
                                </div>
                                <div class="details-modal-content">
                                    <div class="content">
                                        <div class="ime">
                                            <span class="tekst">
                                                Ime
                                            </span>
                                            <input type="text" id="ime">
                                        </div>
                                        <div class="email">
                                            <span class="tekst">
                                                Email:
                                            </span>
                                            <input type="text" id="email">
                                        </div>
                                        <div class="money">
                                            <span class="tekst">
                                                Pare:
                                            </span>
                                            <input type="text" id="money">
                                        </div>
                                        <button id="add">Dodaj</button>
                                    </div>

                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
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
    $(".add").click(() => {
        $(".modal").hasClass("")
    })
    $("#add").click(() => {
        const data = {
            ime: $("#ime").val(),
            email: $("#email").val(),
            novac: $("#money").val()
        }
        $.ajax({
            url: "add.php",
            method: "post",
            data: data,
            success: (data) => {
                console.log(data);
                if (data) {
                    alert("Uspjesno ste dodali korisnika")
                    window.location = "dashboard.php"
                } else
                    alert("Problem prilikom dodavanja korisnika")

            }
        })
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